<?php

namespace App\Models;
use ATehnix\VkClient\Client;


class VkApi extends Client
{

    public function get($method, $params = []){

        if( empty($this->token)) {
            $this->setDefaultToken(\Auth::user()->token);
        }

        try{
            $result = $this->request($method,$params);
            $list = @$result['response'];

        } catch( \ATehnix\VkClient\Exceptions\VkException $e) {

            return self::error('Произошла ошибка: '.$e->getMessage());
        } catch( \ATehnix\VkClient\Exceptions\UnknownErrorVkException  $e) {
            return self::error('Произошла неизвестная ошибка попробуйте позже');
        } catch( \ATehnix\VkClient\Exceptions\TooMuchSimilarVkException  $e) {
            return self::error('Ошибка доступа');
        } catch( \ATehnix\VkClient\Exceptions\TooManyRequestsVkException  $e) {
            return self::error('Превышен лимит количества запросов. Попробуйте повторить позже');
        } catch( \ATehnix\VkClient\Exceptions\PermissionDeniedVkException  $e) {
            return self::error('Ошибка доступа');
        } catch( \ATehnix\VkClient\Exceptions\InternalErrorVkException  $e) {
            return self::error('Внутренняя ошибка вконтакте');
        } catch( \ATehnix\VkClient\Exceptions\InvalidGrantVkException  $e) {
            return self::error('Ошибка доступа');
        } catch( \ATehnix\VkClient\Exceptions\AuthorizationFailedVkException  $e) {
            return \Redirect::to('logout');
        } catch( \ATehnix\VkClient\Exceptions\CaptchaRequiredVkException  $e) {
            return self::error('Требуется ввести капчу');
        } catch( \ATehnix\VkClient\Exceptions\AccessDeniedVkException  $e) {
            return self::error('Ошибка доступа');
        }


        return $list;
    }



    private static function error($error){

        if( \Request::ajax()){
            return response()->json(['ok' => 0, 'error' => $error]);
        } else {
            print view('common.error', ['error' => $error]); exit();
        }

    }
}
