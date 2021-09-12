<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherRequest;
use App\Mail\VoucherMail;
use App\Models\Vouchers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VoucherController extends Controller
{

    public function index()
    {
        $vouchers = Vouchers::all();
        return response()->json($vouchers);
    }

    public function store(VoucherRequest $request)
    {

        $voucherUser = null;

        $findUser = Vouchers::where(['name' => $request->name, 'email'  => $request->email])->first();

        if ($findUser) {
            $findUser->voucher = $findUser->voucher + 1;
            $findUser->token = strtoupper(Str::random(15));
            $findUser->save();
            $voucherUser = $findUser;
        } else {
            $voucherUser = Vouchers::create([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'whatsapp'              => $request->whatsapp,
                'token'                 => strtoupper(Str::random(15)),
                'date_of_birth'         => $request->date_of_birth,
                'how_did_you_find_us'   => $request->how_did_you_find_us,
            ]);
        }
        Mail::send(new VoucherMail($voucherUser));
        return response()->json($voucherUser);
    }
}
