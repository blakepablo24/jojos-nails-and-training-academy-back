<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GiftVouchers;
use App\Mail\ApprovedVoucher;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class GiftVoucherController extends Controller
{
    public function getAllGiftVouchers(){

        $pendingGiftVouchers = GiftVouchers::where('pending', true)->get();
        $unRedeemedGiftVouchers = GiftVouchers::where('pending', false)->where('redeemed', false)->get();
        $redeemedGiftVouchers = GiftVouchers::where('pending', false)->where('redeemed', true)->get();


        return response()->json([
            'pending' => ['vouchers' => $pendingGiftVouchers, 'title' => 'pending'],
            'unredeemed' => ['vouchers' => $unRedeemedGiftVouchers, 'title' => 'unredeemed'],
            'redeemed' => ['vouchers' => $redeemedGiftVouchers, 'title' => 'redeemed']
        ]);
    }

    public function deletePendingGiftVoucher($id) {
        $pendingGiftVoucher = GiftVouchers::find($id);
        $pendingGiftVoucher->delete();
    }

    public function approvePendingGiftVoucher($id) {
        $pendingGiftVoucher = GiftVouchers::find($id);
        $pendingGiftVoucher->pending = false;
        $pendingGiftVoucher->expiry_date = date('d-m-Y', strtotime('+1 year'));
        // $pendingGiftVoucher->save();

        $pdf = PDF::loadView('approved-voucher-to-pdf', $pendingGiftVoucher)->setPaper('a4', 'landscape');
        Storage::put('public/vouchers/'.$pendingGiftVoucher->name." - ".$pendingGiftVoucher->id.'.pdf', $pdf->output());

        // Mail::to($pendingGiftVoucher['email'])->send(new ApprovedVoucher($pendingGiftVoucher));
    }
}
