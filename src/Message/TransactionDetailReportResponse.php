<?php
namespace Omnipay\Cybersource\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 12/21/14
 * Time: 10:38 PM
 */

class TransactionDetailReportResponse extends AbstractResponse
{
    /** @var null|\Exception  */
    protected $error = null;

    /** @var TransactionDetailReportRequest */
    protected $request = null;

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

        if(is_null($this->request->reportData)) {
            return;
        }

        foreach ($this->request->reportData as $data) {

        }
    }
}
