<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Vouchers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $vouchers = Vouchers::all()->sortByDesc("updated_at");

        if (!$vouchers) {
            return response()->json($vouchers);
        }


        $facebook = $vouchers->where('how_did_you_find_us', 'facebook')->count();
        $google = $vouchers->where('how_did_you_find_us', 'google')->count();
        $instagram = $vouchers->where('how_did_you_find_us', 'instagram')->count();
        $site = $vouchers->where('how_did_you_find_us', 'site')->count();
        $outros = $vouchers->where('how_did_you_find_us', 'outros')->count();

        $dataVouchers = [
            'vouchers'  => array_values($vouchers->toArray()),
            'total'     => str_pad($vouchers->count(), 2, '0', STR_PAD_LEFT),
            'facebook'  => str_pad($facebook, 2, '0', STR_PAD_LEFT),
            'google'    => str_pad($google, 2, '0', STR_PAD_LEFT),
            'instagram' => str_pad($instagram, 2, '0', STR_PAD_LEFT),
            'site'      => str_pad($site, 2, '0', STR_PAD_LEFT),
            'others'    => str_pad($outros, 2, '0', STR_PAD_LEFT),
        ];

        return response()->json($dataVouchers);
    }
}
