<?php

namespace Omnipay\Cybersource\Message;

use DOMDocument;
use SimpleXMLElement;

/**
 * Cybersource Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        if(!is_null($this->getCard())) {
            $this->validate('amount', 'card');
            $this->getCard()->validate();
        } else if(!is_null($this->getBankAccount())) {
            $this->validate('amount', 'bankAccount');
        } else {
            $this->validate('amount', 'bankAccount', 'card');
        }

        //Since we use soap we dont really use this. Just validate here.

        return array();
    }
    public function sendData($data)
    {


        if(!is_null($this->getCard())) {
            // we want to perform an authorization
            $cc_auth_service = new \stdClass();
            $cc_auth_service->run = 'true';		// note that it's textual true so it doesn't get cast as an int
            $this->request->ccAuthService = $cc_auth_service;

            // and actually charge them
            $cc_capture_service = new \stdClass();
            $cc_capture_service->run = 'true';
            $this->request->ccCaptureService = $cc_capture_service;

            // add billing info to the request
            $this->request->billTo = $this->createBillingAddress();

            // add credit card info to the request
            $this->request->card = $this->createCard();
        } else if(!is_null($this->getBankAccount())) {
            // and actually charge them
            $ecDebitService = new \stdClass();
            $ecDebitService->run = 'true';
            $this->request->ecDebitService = $ecDebitService;

            // add billing info to the request
            $this->request->billTo = $this->createBillingAddress();

            // add bank account info to the request
            $this->request->check = $this->createBankAccount();
        }

        $this->request->purchaseTotals->grandTotalAmount = $this->getAmount();


        return parent::sendData($data);
    }
}
