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
        $this->validate('amount', 'card');
        $this->getCard()->validate();

        //Since we use soap we dont really use this. Just validate here.

        return array();
    }
    public function sendData($data)
    {
        // we want to perform an authorization
        $cc_auth_service = new \stdClass();
        $cc_auth_service->run = 'true';		// note that it's textual true so it doesn't get cast as an int
        $this->request->ccAuthService = $cc_auth_service;

        // and actually charge them
        $cc_capture_service = new \stdClass();
        $cc_capture_service->run = 'true';
        $this->request->ccCaptureService = $cc_capture_service;

        if(!is_null($this->getCard())) {
            // add billing info to the request
            $this->request->billTo = $this->createBillingAddress();

            // add credit card info to the request
            $this->request->card = $this->createCard();
        }

        $this->request->purchaseTotals->grandTotalAmount = $this->getAmount();


        return parent::sendData($data);
    }
}
