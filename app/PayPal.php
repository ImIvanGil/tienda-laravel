<?php 

namespace App;

use URL;
use Config;

use PayPal\Core\PayPalHttpClient;
use PayPal\v1\Payments\PaymentCreateRequest;
use PayPal\v1\Payments\PaymentExecuteRequest;
use PayPal\Core\SandboxEnvironment; //ProductionEnvironment

class PayPal {

    public $client, $environment;

    public function __construct() {
        $clientId = Config::get('services.paypal.clientId');
        $secret = Config::get('service.paypal.secret');

        $this->environment = new SandboxEnvironment($clientId, $secret);

        $this->client = new PayPalHttpClient($this->environment);
    }

    //Solicitud de cobro
    public function buildPaymentRequest($amount) {
        $request = new PaymentCreateRequest();

        $body = [
            'intent' => 'sale',
            'transactions' => [
                [
                    'amount' => [
                        'total' => $amount,
                        'currency' => 'USD'
                    ]
                ]
            ],
            'payer' => [
                'payment_method' => 'paypal'
            ],
            'redirect_urls' => [
                'cancel_url' => URL::route('shopping_cart.show'),
                'return_url' => URL::route('payments.execute')
            ]
        ];

        $request->body = $body;

        return $request;
    }

    public function charge($amount) {
        return $this->client->execute($this->buildPaymentRequest($amount));
    }

    //Ejecucion de cobro

    public function execute($paymentID, $payerId) {
        $paymentExecute = new PaymentExecuteRequest($paymentID);
        $paymentExecute->body = [
            'payer_id' => $payerId
        ];

        return $this->client->execute($paymentExecute);
    }
}