<?php

namespace Omnipay\Cybersource\Message;

use DOMDocument;
use SimpleXMLElement;

/**
 * Cybersource Purchase Request
 */
class ReportRequest extends AbstractRequest
{
    const LIVE_ENDPOINT = 'ebc.cybersource.com/ebc/DownloadReport/';
    const TEST_ENDPOINT = 'ebctest.cybersource.com/ebctest/DownloadReport/';

    protected $reportType = '';

    protected $reportData = null;

    public function getReportDate()
    {
        return $this->getParameter('reportDate');
    }

    public function setReportDate($value)
    {
        return $this->setParameter('reportDate', $value);
    }

    public function getData()
    {
        return array();
    }

    public function sendData($data)
    {
        $url = 'https://'.$this->getUsername().':'.$this->getPassword().'@'.$this->getEndpoint().$this->getReportDate()->format('Y/m/').$this->getMerchantId().'/'.$this->reportType.'.csv';

        $handle = null;

        try {
            $handle = fopen($url, "r");
        } catch(\Exception $error) {
            return $error;
        }

        $flag = true;
        $rowCounter = 0;
        $assocData = array();
        $headerRecord = null;
        while (($rowData = fgetcsv($handle, 0, ",")) !== FALSE) {
            if($flag) {
                $flag = false;
                continue;
            }
            if( 0 === $rowCounter) {
                $headerRecord = $rowData;
            } else {
                foreach( $rowData as $key => $value) {
                    $assocData[ $rowCounter - 1][ $headerRecord[ $key] ] = $value;
                }
            }
            $rowCounter++;
        }
        fclose($handle);

        $this->reportData = $assocData;
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? self::TEST_ENDPOINT : self::LIVE_ENDPOINT;
    }
}
