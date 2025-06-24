<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use phpseclib3\Crypt\DES;

class NabilService
{
    public $gatewayUrl;

    public $merchant;

    public $decryptKey;

    public $certFile;

    public $keyFile;

    public $password;

    public function __construct()
    {
        $config = config('custom.nabil');
        $this->gatewayUrl = $config['url'];
        $this->merchant = $config['merchant_id'];
        $this->decryptKey = $config['decryption_key'];
        $this->certFile = storage_path($config['certificate_path']);
        $this->keyFile = storage_path($config['key_path']);
        $this->password = $config['nabil_password'];
    }

    public function createOrder($amount, $currency, $description, $paymentResponseUrl)
    {
        // TODO: using NPR Rs.1 for testing, change later
        $amount = '100';
        // $amount = $amount * 100;
        $currency = '524';

        $approveUrl = $cancelUrl = $declineUrl = $paymentResponseUrl;

        $request = $this->buildCreateOrderRequest($amount, $currency, $description, $approveUrl, $cancelUrl, $declineUrl);
        $this->logCreateOrderRequest($request);

        $response = $this->sendRequest($request);
        $this->logCreateOrderResponse($response);

        $data = simplexml_load_string($response);

        $data = json_encode($data);
        $data = json_decode($data);

        $status = $data->Response->Status ?? null;
        if ($status == '00') {
            $orderId = $data->Response->Order->OrderID;
            $orderIdFilter = substr($orderId, 13);
            $orderIdDecrypted = $this->decrypt($orderIdFilter);

            $sessionId = $data->Response->Order->SessionID;
            $sessionIdFilter = substr($sessionId, 13);
            $sessionIdDecrypted = $this->decrypt($sessionIdFilter);
            $this->logCreateOrderResponse('order_id: '.$orderIdDecrypted.'session_id: '.$sessionIdDecrypted);

            $url = $data->Response->Order->URL;
            // TODO: save into database for future reference

            return [
                'url' => $url,
                'order_id' => $orderId,
                'session_id' => $sessionId,
                'order_id_decrypted' => $orderIdDecrypted,
                'session_id_decrypted' => $sessionIdDecrypted,
            ];
        } else {
            throw new \Exception('Payment creation failed!');
        }
    }

    protected function buildCreateOrderRequest($amount, $currency, $description, $approveUrl, $cancelUrl, $declineUrl)
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                    <Request>
                        <Operation>CreateOrder</Operation>
                        <Language>EN</Language>
                        <Order>
                            <OrderType>Purchase</OrderType>
                            <Merchant>'.$this->merchant.'</Merchant>
                            <Amount>'.$amount.'</Amount>
                            <Currency>'.$currency.'</Currency>
                            <Description>'.$description.'</Description>
                            <ApproveURL>'.$approveUrl.'</ApproveURL>
                            <CancelURL>'.$cancelUrl.'</CancelURL>
                            <DeclineURL>'.$declineUrl.'</DeclineURL>
                            <Fee>0</Fee>
                        </Order>
                    </Request>
                </TKKPG>';
    }

    protected function sendRequest($request)
    {
        $curl = curl_init();
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_URL => $this->gatewayUrl,
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => ['Content-Type: text/xml'],
            CURLOPT_TIMEOUT => 300,
            CURLOPT_SSLCERT => $this->certFile,
            CURLOPT_SSLKEY => $this->keyFile,
            CURLOPT_SSLKEYPASSWD => $this->password,
        ];

        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);

        if (! $response) {
            throw new \Exception('Curl Error: '.curl_error($curl));
        }

        curl_close($curl);

        return $response;
    }

    public function getOrderStatus($orderId, $sessionId)
    {
        $request = $this->buildGetOrderStatusRequest($orderId, $sessionId);
        $this->logGetOrderStatusRequest($request);
        $response = $this->sendRequest($request);

        $this->logGetOrderStatusResponse($response);
        $data = simplexml_load_string($response);
        $data = json_encode($data);
        $data = json_decode($data);

        return $data;
    }

    protected function buildGetOrderStatusRequest($orderId, $sessionId)
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                    <Request>
                        <Operation>GetOrderStatus</Operation>
                        <Language>EN</Language>
                        <Order>
                            <Merchant>'.$this->merchant.'</Merchant>
                            <OrderID>'.$orderId.'</OrderID>
                        </Order>
                        <SessionID>'.$sessionId.'</SessionID>
                    </Request>
                </TKKPG>';
    }

    public function decrypt(string $cypherText): string
    {
        try {
            // Validate input format
            if (! ctype_xdigit($cypherText)) {
                throw new \InvalidArgumentException('Invalid ciphertext format: must be hexadecimal.');
            }

            // Initialize DES encryption with ECB mode
            $des = new DES('ecb');

            // Convert the decryption key from hex to binary and set it
            $des->setKey(hex2bin($this->decryptKey));

            // Disable padding
            $des->disablePadding();

            // Decrypt the ciphertext
            $decrypted = $des->decrypt(hex2bin($cypherText));
            if ($decrypted === false) {
                throw new \RuntimeException('Decryption failed.');
            }

            return trim($decrypted);
        } catch (\Exception $e) {
            throw new \RuntimeException('An error occurred during decryption.'.$e->getMessage());
        }
    }

    protected function logCreateOrderRequest($request)
    {
        Log::channel('nabil_log')->info("Create Order Request: \n{$request}");
    }

    protected function logCreateOrderResponse($response)
    {
        Log::channel('nabil_log')->info("Create Order Response: \n{$response}");
    }

    public function logPaymentResponse($response)
    {
        Log::channel('nabil_log')->info('Payment Response: '.print_r($response, true));
    }

    protected function logGetOrderStatusRequest($request)
    {
        Log::channel('nabil_log')->info("Get Order Status Request: \n{$request}");
    }

    protected function logGetOrderStatusResponse($response)
    {
        Log::channel('nabil_log')->info("Get Order Status Response: \n{$response}");
    }
}
