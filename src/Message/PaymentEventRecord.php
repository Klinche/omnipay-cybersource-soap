<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 12/22/14
 * Time: 1:10 PM
 */

namespace Omnipay\Cybersource\Message;


class PaymentEventRecord
{

    /** @var null|string  */
    private $requestId = null;

    /** @var null|string  */
    private $merchantId = null;

    /** @var null|string  */
    private $merchantRefNumber = null;

    /** @var null|string  */
    private $paymentType = null;

    /** @var null|string  */
    private $eventType = null;

    /** @var null|string  */
    private $eventDate = null;

    /** @var null|string  */
    private $transRefNumber = null;

    /** @var null|string  */
    private $merchantCurrencyCode = null;

    /** @var float */
    private $merchantAmount = null;

    /** @var null|string  */
    private $consumerCurrencyCode = null;

    /** @var float */
    private $consumerAmount = null;

    /** @var null|string  */
    private $feeCurrencyCode = null;

    /** @var float */
    private $feeAmount = null;

    /** @var null|string  */
    private $processorMessage = null;

    /**
     * @return null|string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param null|string $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @return null|string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param null|string $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return null|string
     */
    public function getMerchantRefNumber()
    {
        return $this->merchantRefNumber;
    }

    /**
     * @param null|string $merchantRefNumber
     */
    public function setMerchantRefNumber($merchantRefNumber)
    {
        $this->merchantRefNumber = $merchantRefNumber;
    }

    /**
     * @return null|string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param null|string $paymentType
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return null|string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param null|string $eventType
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return null|string
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * @param null|string $eventDate
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

    /**
     * @return null|string
     */
    public function getTransRefNumber()
    {
        return $this->transRefNumber;
    }

    /**
     * @param null|string $transRefNumber
     */
    public function setTransRefNumber($transRefNumber)
    {
        $this->transRefNumber = $transRefNumber;
    }

    /**
     * @return null|string
     */
    public function getMerchantCurrencyCode()
    {
        return $this->merchantCurrencyCode;
    }

    /**
     * @param null|string $merchantCurrencyCode
     */
    public function setMerchantCurrencyCode($merchantCurrencyCode)
    {
        $this->merchantCurrencyCode = $merchantCurrencyCode;
    }

    /**
     * @return float
     */
    public function getMerchantAmount()
    {
        return $this->merchantAmount;
    }

    /**
     * @param float $merchantAmount
     */
    public function setMerchantAmount($merchantAmount)
    {
        $this->merchantAmount = $merchantAmount;
    }

    /**
     * @return null|string
     */
    public function getConsumerCurrencyCode()
    {
        return $this->consumerCurrencyCode;
    }

    /**
     * @param null|string $consumerCurrencyCode
     */
    public function setConsumerCurrencyCode($consumerCurrencyCode)
    {
        $this->consumerCurrencyCode = $consumerCurrencyCode;
    }

    /**
     * @return float
     */
    public function getConsumerAmount()
    {
        return $this->consumerAmount;
    }

    /**
     * @param float $consumerAmount
     */
    public function setConsumerAmount($consumerAmount)
    {
        $this->consumerAmount = $consumerAmount;
    }

    /**
     * @return null|string
     */
    public function getFeeCurrencyCode()
    {
        return $this->feeCurrencyCode;
    }

    /**
     * @param null|string $feeCurrencyCode
     */
    public function setFeeCurrencyCode($feeCurrencyCode)
    {
        $this->feeCurrencyCode = $feeCurrencyCode;
    }

    /**
     * @return float
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * @param float $feeAmount
     */
    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;
    }

    /**
     * @return null|string
     */
    public function getProcessorMessage()
    {
        return $this->processorMessage;
    }

    /**
     * @param null|string $processorMessage
     */
    public function setProcessorMessage($processorMessage)
    {
        $this->processorMessage = $processorMessage;
    }
}
