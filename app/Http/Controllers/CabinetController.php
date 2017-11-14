<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ATehnix\VkClient\Client;
use Auth;

class CabinetController extends Controller
{
    private $vk_client;

    public function __construct(){

        $this->middleware(function ($request, $next) {
            $this->vk_client = new Client;
            $this->vk_client->setDefaultToken(Auth::user()->token);

            return $next($request);
        });
    }

    public function index()
    {

        $list = [];

        try{
            $cabinets = $this->vk_client->request('ads.getAccounts');
            $list = @$cabinets['response'];
        } catch( \ATehnix\VkClient\Exceptions\AccessDeniedVkException  $e) {
            return view('common.error', ['error' => 'Нет доступа к списку кабиентов пользователя']);
        }

        return view('cabinet.index', ['cabinets' => $list]);
    }

    public function cabinet($cabinet_id, $cabinet_name)
    {
        $list = [];

        try{
            $result = $this->vk_client->request('ads.getCampaigns',['account_id' => $cabinet_id]);
            $list = @$result['response'];

        } catch( \ATehnix\VkClient\Exceptions\AccessDeniedVkException  $e) {
            return view('common.error', ['error' => 'Нет доступа к кабинету пользователя']);
        }

        return view('cabinet.cabinet', [
            'campaigns'    => $list,
            'cabinet_id'   => $cabinet_id,
            'cabinet_name' => urldecode($cabinet_name)
        ]);
    }

    public function campaign($cabinet_id, $cabinet_name, $campaign_id, $campaign_name)
    {

        $list = [];
        
        try{
            $result = $this->vk_client->request('ads.getAds',['account_id' => $cabinet_id, 'campaign_ids' => json_encode([$campaign_id])]);
            $list = @$result['response'];

        } catch( \ATehnix\VkClient\Exceptions\AccessDeniedVkException  $e) {
            return view('common.error', ['error' => 'Нет доступа к кабинету пользователя']);
        }

        return view('cabinet.campaign', [
            'campaign_id'   => $campaign_id,
            'campaign_name' => $campaign_name,
            'cabinet_id'    => $cabinet_id,
            'cabinet_name'  => urldecode($cabinet_name),
            'ads'           => $list
        ]);
    }

}
