<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ATehnix\VkClient\Client;
use App\Models\Ad;
use Auth;
use Vk;

class CabinetController extends Controller
{

    public function index()
    {
        $list = Vk::get('ads.getAccounts');
        return view('cabinet.index', ['cabinets' => $list]);
    }

    public function cabinet($cabinet_id, $cabinet_name)
    {
        $list = Vk::get('ads.getCampaigns',['account_id' => $cabinet_id]);

        return view('cabinet.cabinet', [
            'campaigns'    => $list,
            'cabinet_id'   => $cabinet_id,
            'cabinet_name' => urldecode($cabinet_name)
        ]);
    }

    public function campaign($cabinet_id, $cabinet_name, $campaign_id, $campaign_name)
    {

        $list     = [];
        $comments = [];

        $list = Vk::get('ads.getAds',['account_id' => $cabinet_id, 'campaign_ids' => json_encode([$campaign_id])]);
        $_ids = [];
        foreach ($list as $_ad) {
            $_ids[] = $_ad['id'];
        }
        if( !empty($_ids)){
            $comments = Ad::whereIn('vk_id', $_ids)->get()->pluck('comment','vk_id')->all();
        }

        return view('cabinet.campaign', [
            'campaign_id'   => $campaign_id,
            'campaign_name' => $campaign_name,
            'cabinet_id'    => $cabinet_id,
            'cabinet_name'  => urldecode($cabinet_name),
            'ads'           => $list,
            'comments'      => $comments,
        ]);
    }

    public function delete(Request $request){

        $res = Vk::get('ads.deleteAds',['account_id' => $request->get('account_id'), 'ids' => json_encode([$request->get('ad_id')])]);

        return response()->json(['ok' => 1]);

    }


    public function comment(Request $request){

        $request->validate([
            'comment' => 'required|max:100',
            'vk_id'   => 'required',
        ]);

        $ad = Ad::firstOrNew(['vk_id' => $request->get('vk_id')]);
        $ad->comment = $request->get('comment');
        $ad->save();

        return response()->json(['ok' => 1]);
    }

}
