<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Payments;
use App\Models\User;
use App\Models\Withdraws;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function cek(Request $request)
    {
        $cek = User::where('name', $request->name)->where('password', $request->password)->get();

        return response()->json([
            $cek
        ]);
    }
    public function tarik_tunai(Request $request)
    {
        $cek = User::where('name', $request->name)->where('password', $request->password)->first();
        $bank = Bank::where('rekening', $cek->rekening)->first();

        if ($cek && $bank) {
            if ($bank->money <= $request->total) {
                return response()->json([
                    'message' => 'Your Money Is Kurang'
                ]);
            } else {
                $with = Withdraws::create([
                    'rekening' => $cek->rekening,
                    'total' => $request->total
                ]);

                $bank->update([
                    'rekening' => $cek->rekening,
                    'money' => $bank->money - $request->total
                ]);

                return response()->json([
                    'message' => 'Success Withdraw',
                    'data' => $with,
                    'sisa_uang' => $bank->money - $request->total
                ]);
            }
        } else {
            return response()->json([
                'message' => "Invalid Credentials"
            ]);
        }
    }

    public function cek_saldo(Request $request)
    {
        $cek = User::where('name', $request->name)->where('password', $request->password)->first();
        $bank = Bank::where('rekening', $cek->rekening)->first();

        if ($cek && $bank) {
            return response()->json([
                'data' => $bank,
            ]);
        } else {
            return response()->json([
                'message' => "Invalid Credentials"
            ]);
        }
    }

    public function pembayaran(Request $request)
    {
        $cek = User::where('name', $request->name)->where('password', $request->password)->first();
        $bank = Bank::where('rekening', $cek->rekening)->first();

        if ($cek && $bank) {
            $pay = Payments::create([
                'rekening' => $cek->rekening,
                'type' => $request->type,
                'no_payment' => $request->no_payment,
                'total' => $request->harga
            ]);

            return response()->json([
                'message' => "Success Payment",
                'data' => $pay,
            ]);
        } else {
            return response()->json([
                'message' => "Invalid Credentials"
            ]);
        }
    }
}
