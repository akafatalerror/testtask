<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class VkApiFacade extends Facade {

    protected static function getFacadeAccessor() { return 'vk_service'; }

}
