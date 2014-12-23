<?php

namespace Omnipay\Cybersource\Message;

use DOMDocument;
use SimpleXMLElement;

/**
 * Cybersource Payment Events Report Request
 */
class PaymentEventsReportRequest extends ReportRequest
{
    protected $reportType = 'PaymentEventsReport';


    public function sendData($data)
    {
        $returnData = parent::sendData($data);

        if ($returnData instanceof \Exception) {
            return new PaymentEventsReportResponse($this, $returnData);
        } else {
            return new PaymentEventsReportResponse($this);
        }

    }
}
