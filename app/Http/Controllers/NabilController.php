<?php

namespace App\Http\Controllers;

use App\Services\NabilService;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class NabilController extends Controller
{
    protected $nabilService;

    public function __construct(NabilService $nabilService)
    {
        $this->nabilService = $nabilService;
    }

    public function index()
    {
        $config = config('custom.campaign');
        $ratePerPerson = $config['rate_per_person'];
        $breakfastRate = $config['breakfast_rate_per_person'];

        return view('nabil-pay.index', compact('ratePerPerson', 'breakfastRate'));
    }

    public function paymentResponse(Request $request)
    {
        $this->nabilService->logPaymentResponse($request->all());
        $xml = simplexml_load_string($request->get('xmlmsg', null));
        $orderIdEncrypted = $xml->OrderIDEncrypted;
        $orderId = $request->orderId;
        $sessionId = $request->sessionId;

        if (! $orderId || ! $sessionId) {
            return response()->json(['error' => 'Missing ORDERID or SESSIONID'], 400);
        }

        try {
            $response = $this->nabilService->getOrderStatus($orderId, $sessionId);
            $statusCode = $response?->Response?->Status;
            $orderStatus = strtoupper($response?->Response?->Order?->OrderStatus ?: '');

            if ($statusCode !== '00') {
                return response()->json(['error' => 'Failed to retrieve order status.'], 500);
            }

            $registration = RegistrationService::_getRegistrationFromOrder($orderIdEncrypted);
            $registration->update(['payment_status' => $orderStatus]);

            // TODO: possibly need to redirect to success/error page

            $response = [
                'orderId' => $orderId,
                'status' => $orderStatus,
                'registration_number' => $registration->registration_number,
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createOrder(Request $request)
    {
        $description = $request->description;

        $amount = $request->amount;
        $currency = $request->currency;

        $paymentResponseUrl = route('payment.nabil.response');

        try {
            $payment = $this->nabilService->createOrder($amount, $currency, $description, $paymentResponseUrl);

            return view(
                'redirect',
                [
                    'url' => $payment['url'],
                    'order_id' => $payment['order_id'],
                    'session_id' => $payment['session_id'],
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getOrderStatus(Request $request)
    {
        $orderId = $request->order_id;
        $sessionId = $request->session_id;

        try {
            $response = $this->nabilService->getOrderStatus($orderId, $sessionId);

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
