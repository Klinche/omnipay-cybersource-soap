<?php
namespace Omnipay\Cybersource\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 12/21/14
 * Time: 10:38 PM
 */

class PaymentEventsReportResponse extends AbstractResponse
{
    /** @var null|\Exception  */
    protected $error = null;

    /** @var PaymentEventsReportRequest */
    protected $request = null;

    private $paymentEvents = array();

    public function __construct($request, $error = null)
    {
        $this->request = $request;
        $this->error = $error;
        $this->parseResponseData();
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return is_null($this->error);
    }


    private function parseResponseData()
    {
        if (!$this->isSuccessful()) {
            return;
        }

        if (is_null($this->request->reportData)) {
            return;
        }

        foreach ($this->request->reportData as $data) {
            $paymentEvent = new PaymentEventRecord();
            $paymentEvent->setRequestId($data['request_id']);
            $paymentEvent->setMerchantId($data['merchant_id']);
            $paymentEvent->setMerchantRefNumber($data['merchant_ref_number']);
            $paymentEvent->setPaymentType($data['payment_type']);
            $paymentEvent->setEventType($data['event_type']);
            $paymentEvent->setEventDate($data['event_date']);
            $paymentEvent->setTransRefNumber($data['trans_ref_no']);
            $paymentEvent->setMerchantCurrencyCode($data['merchant_currency_code']);
            $paymentEvent->setMerchantAmount($data['merchant_amount']);
            $paymentEvent->setConsumerCurrencyCode($data['consumer_currency_code']);
            $paymentEvent->setConsumerAmount($data['consumer_amount']);
            $paymentEvent->setFeeCurrencyCode($data['fee_currency_code']);
            $paymentEvent->setFeeAmount($data['fee_amount']);
            $paymentEvent->setProcessorMessage($data['processor_message']);
            $paymentEvents[] = $paymentEvent;
        }
    }

    /**
     * @return array
     */
    public function getPaymentEvents()
    {
        return $this->paymentEvents;
    }

    /**
     * @param array $paymentEvents
     */
    public function setPaymentEvents($paymentEvents)
    {
        $this->paymentEvents = $paymentEvents;
    }
}
