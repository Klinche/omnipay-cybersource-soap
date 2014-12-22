<?php

namespace Omnipay\Cybersource\Message;

use DOMDocument;
use SimpleXMLElement;

/**
 * Cybersource Purchase Request
 */
class TransactionDetailReportRequest extends ReportRequest
{
    protected $reportType = 'TransactionDetailReport';


    public function sendData($data)
    {
        $returnData = parent::sendData($data);

        if ($returnData instanceof \Exception) {
            return new TransactionDetailReportResponse($this, $returnData);
        } else {
            return new TransactionDetailReportResponse($this);
        }

    }
}
