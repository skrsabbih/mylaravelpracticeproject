<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    // payment gateway
    public function initiate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
        ]);

        // transaction id unique
        $transactionId = uniqid();

        // order create
        $order = Order::create([
            'user_id' => $request->user()->id,
            'tran_id' => $transactionId,
            'amount' => $request->amount,
            'currency' => 'BDT',
            'status' => 'pending',
        ]);

        // ssl commerz url api
        $url = config('services.sslcommerz.sandbox') ? 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php' : 'https://securepay.sslcommerz.com/gwprocess/v4/api.php';

        // ssl commerz initiate payment mendatory data
        $response = Http::asForm()->post($url, [
            'store_id' => config('services.sslcommerz.store_id'),
            'store_passwd' => config('services.sslcommerz.store_password'),
            'total_amount' => $request->amount,
            'currency' => 'BDT',
            'tran_id' => $order->tran_id,
            'success_url' => route('payment.success'),
            'fail_url' => route('payment.fail'),
            'cancel_url' => route('payment.cancel'),

            'cus_name'      => $request->user()->name,
            'cus_email'     => $request->user()->email,
            'cus_phone'     => '01700000000',

            'product_name'  => 'Test Product',
            'product_category' => 'Test',
            'product_profile'  => 'general',
        ]);

        if (!isset($response['GatewayPageURL'])) {
            return response()->json([
                'message' => 'Payment gateway error',
            ], 500);
        }

        return response()->json([
            'url' => $response['GatewayPageURL'],
            'message' => 'Payment gateway initiate successfully'
        ]);
    }

    public function success(Request $request)
    {
        $tranId = $request->tran_id;
        $order = Order::where('tran_id', $tranId)->first();

        if (!$order) {
            return response()->json([
                'message' => 'Order not found',
            ], 404);
        }

        $order->update([
            'status' => 'success'
        ]);

        return response()->json([
            'message' => 'Payment successfully',
            'order' => $order
        ]);
    }
}
