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

    const PAYMENT_TYPE_BANK_TRANSFER = 'bank transfer';
    const PAYMENT_TYPE_CREDIT_CARD = 'credit card';
    const PAYMENT_TYPE_CORPORATE = 'corporate';
    const PAYMENT_TYPE_DEBIT = 'debit';
    const PAYMENT_TYPE_CHECK = 'check';
    const PAYMENT_TYPE_PAYPAL_CREDIT = 'paypal credit';
    const PAYMENT_TYPE_PAYPAL_DEBIT = 'paypal debit';

    /** TeleCheck only */
    const PAYMENT_TYPE_CLAIM = 'claim';
    const PAYMENT_TYPE_CREDIT = 'credit';
    const PAYMENT_TYPE_VOID = 'void';


    const EVENT_TYPE_CHARGEBACK = 'chargeback';
    const EVENT_TYPE_CORRECTION = 'correction';
    const EVENT_TYPE_FAILED = 'failed';
    const EVENT_TYPE_OTHER = 'other';
    const EVENT_TYPE_PAYMENT = 'payment';
    const EVENT_TYPE_REFUND = 'refund';
    const EVENT_TYPE_REVERSAL = 'reversal';
    const EVENT_TYPE_SETTLED = 'settled';
    const EVENT_TYPE_SETTLED_UNMATCHED = 'settled unmatched';
    const EVENT_TYPE_PAYMENT_ABNORMAL = 'payment abnormal';
    const EVENT_TYPE_PAYMENT_DECLINED = 'payment declined';
    const EVENT_TYPE_PAYMENT_FAILED = 'payment failed';
    const EVENT_TYPE_PAYMENT_FUNDED = 'payment funded';
    const EVENT_TYPE_PAYMENT_INITIATED = 'payment initiated';
    const EVENT_TYPE_PAYMENT_LOST = 'payment lost';
    const EVENT_TYPE_PAYMENT_PENDING_PROC = 'payment pending proc';
    const EVENT_TYPE_PAYMENT_SETTLED = 'payment settled';
    const EVENT_TYPE_REFUND_ABNORMAL = 'refund abnormal';
    const EVENT_TYPE_REFUND_DECLINED = 'refund declined';
    const EVENT_TYPE_REFUND_FAILED = 'refund failed';
    const EVENT_TYPE_REFUND_FUNDED = 'refund funded';
    const EVENT_TYPE_REFUND_PENDING_CYB = 'refund pending cyb';
    const EVENT_TYPE_REFUND_PENDING_PROC = 'refund pending proc';
    const EVENT_TYPE_REFUND_SETTLED = 'refund settled';
    const EVENT_TYPE_UNKNOWN = 'unknown';
    const EVENT_TYPE_DECLINED = 'declined';
    const EVENT_TYPE_ERROR = 'error';
    const EVENT_TYPE_FINAL_NSF = 'final nsf';
    const EVENT_TYPE_FIRST_NSF = 'first nsf';
    const EVENT_TYPE_NSF = 'nsf';
    const EVENT_TYPE_SECOND_NSF = 'second nsf';
    const EVENT_TYPE_STOP_PAYMENT = 'stop payment';
    const EVENT_TYPE_VOID = 'void';
    const EVENT_TYPE_COMPLETED = 'completed';
    const EVENT_TYPE_BATCHED   = 'batched';
    const EVENT_TYPE_CANCELED_REVERSAL = 'canceled_reversal';
    const EVENT_TYPE_DENIED = 'denied';
    const EVENT_TYPE_MIPS = 'mips';
    const EVENT_TYPE_PENDING = 'pending';
    const EVENT_TYPE_REFUNDED = 'refunded';
    const EVENT_TYPE_REVERSED = 'reversed';

    private static $creditCardBankTransferDirectDebitEventTypes = array(
        self::EVENT_TYPE_CHARGEBACK           => 'The customer did not authorize the transaction. For details about the chargeback, see the processor_message value in the report.',
        self::EVENT_TYPE_CORRECTION           => 'The payment or refund was corrected, or the bank was unable to credit the customer\'s account; the value is either positive or negative.',
        self::EVENT_TYPE_FAILED               => 'The account was invalid or disabled. For details about the failure, see the processor_message value in the report.',
        self::EVENT_TYPE_OTHER                => 'The processor reported an unanticipated event.',
        self::EVENT_TYPE_PAYMENT              => 'The payment was received by the processor’s bank; the value is always positive.',
        self::EVENT_TYPE_REFUND               => 'The payment was returned; the value is always negative. For details about the refund, see the processor_message value in the report.',
        self::EVENT_TYPE_REVERSAL             => 'A payment was reversed. For details about the reversal, see the processor_message value in the report.',
        self::EVENT_TYPE_SETTLED              => 'The transaction has been settled: the payment has been received, or the refund has been given to the customer.',
        self::EVENT_TYPE_SETTLED_UNMATCHED    => 'A bank transfer payment has been received but cannot be matched to the original request.',
    );

    private static $payEaseChinaProcessingEventTypes = array(
        self::EVENT_TYPE_CHARGEBACK           => 'The original payment transaction is being disputed by the cardholder or the cardholder’s bank.',
        self::EVENT_TYPE_PAYMENT_ABNORMAL     => 'The payment has been held up for regulatory or legal reasons.',
        self::EVENT_TYPE_PAYMENT_DECLINED     => 'The processor has refused the payment request.',
        self::EVENT_TYPE_PAYMENT_FAILED       => 'The payment request failed. The reason is not specified.',
        self::EVENT_TYPE_PAYMENT_INITIATED    => 'The payment request was received from the merchant.',
        self::EVENT_TYPE_PAYMENT_LOST         => 'The processor does not acknowledge receiving the payment request.',
        self::EVENT_TYPE_PAYMENT_PENDING_PROC => 'The payment has not been completed. It is awaiting settlement by the processor.',
        self::EVENT_TYPE_PAYMENT_SETTLED      => 'The payment has been confirmed by the processor and is expected to be funded.',
        self::EVENT_TYPE_REFUND_ABNORMAL      => 'The refund has been held up for regulatory or legal reasons.',
        self::EVENT_TYPE_REFUND_DECLINED      => 'The processor has refused the refund request.',
        self::EVENT_TYPE_REFUND_FAILED        => 'The refund request failed. The reason is not specified.',
        self::EVENT_TYPE_REFUND_FUNDED        => 'TThe processor has submitted a transfer to the merchant\'s bank account as a result of a settled refund.',
        self::EVENT_TYPE_REFUND_PENDING_CYB   => 'The refund has not been completed. It is awaiting transmission by CyberSource.',
        self::EVENT_TYPE_REFUND_PENDING_PROC  => 'The refund has not been completed. It is awaiting settlement by the processor.',
        self::EVENT_TYPE_REFUND_SETTLED       => 'The refund has been confirmed by the processor and is expected to be funded.',
        self::EVENT_TYPE_UNKNOWN              => 'The processor does not acknowledge receiving the request.',
    );

    private static $checkEventTypes = array(
        self::EVENT_TYPE_PAYMENT              => 'Payment has been received. The value is always positive.',
        self::EVENT_TYPE_REFUND               => 'A refund (credit) occurred. The value is always negative.',
        self::EVENT_TYPE_COMPLETED            => 'TThe transaction was completed:',

        /** Failed Check Event Types */
        self::EVENT_TYPE_CORRECTION           => 'A positive or negative correction occurred to a payment or refund.',
        self::EVENT_TYPE_DECLINED             => 'The account was invalid or disabled. For details about the decline, see the processor_message value in the report.',
        self::EVENT_TYPE_ERROR                => 'An error occurred. For details about the error, see the processor_message value in the report.',
        self::EVENT_TYPE_FAILED               => 'The account was invalid or disabled. For details about the failure, see the processor_message value in the report.',
        self::EVENT_TYPE_FINAL_NSF            => 'The final instance of insufficient funds occurred.',
        self::EVENT_TYPE_FIRST_NSF            => 'The bank will attempt to re-deposit the funds.',
        self::EVENT_TYPE_NSF                  => 'The bank returned the check because of insufficient funds.',
        self::EVENT_TYPE_OTHER                => 'The processor reported an unanticipated event.',
        self::EVENT_TYPE_SECOND_NSF           => 'The bank will attempt to re-deposit the funds for the second time.',
        self::EVENT_TYPE_STOP_PAYMENT         => 'The customer stopped the payment.',
        self::EVENT_TYPE_VOID                 => 'The check was successfully voided.',
    );

    private static $payPalEventTypes = array(
        self::EVENT_TYPE_BATCHED              => 'The PayPal transaction was completed, but the funds have not been transferred to your account.',
        self::EVENT_TYPE_CANCELED_REVERSAL    => 'You requested that the reversal requested by the customer be cancelled.',
        self::EVENT_TYPE_COMPLETED            => 'The PayPal transaction (standard or pre-approved payment was completed, and the funds have been transferred to your account.',
        self::EVENT_TYPE_DENIED               => 'You denied the request. The reason is not specified.',
        self::EVENT_TYPE_FAILED               => 'The request failed. The reason is not specified.',
        self::EVENT_TYPE_MIPS                 => 'A billing agreement was created or modified.',
        self::EVENT_TYPE_PENDING              => 'The PayPal transaction is not completed. The value will eventually change to Completed, Failed, or Denied.',
        self::EVENT_TYPE_REFUNDED             => 'You initiated a refund of the PayPal payment.',
        self::EVENT_TYPE_REVERSED             => 'A payment was reversed due to a chargeback or other type of reversal.',
    );




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
        $this->paymentType = strtolower($paymentType);
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
        $this->eventType = strtolower($eventType);
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
