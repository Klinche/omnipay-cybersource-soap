<?php

namespace Omnipay\Cybersource;

use Omnipay\Common\AbstractGateway;

/**
 * Cybersource - Soap Gateway
 */
class CybersourceGateway extends AbstractGateway
{

    /* Default Abstract Gateway methods that need to be overridden */
    public function getName()
    {
        return 'Cybersource - Soap';
    }

    public function getDefaultParameters()
    {

        return array(
            'merchantId' => 'myMerchantId',
            'transactionKey' => 'myTransactionKey',
            'username' => 'myUsername',
        );
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->setParameter('merchantId', $merchantId);
    }

    /**
     * return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->setParameter('username', $username);
    }

    /**
     * return string
     */
    public function getUsername()
    {
        return $this->getParameter('username');
    }

    /**
     * @param string $transactionKey
     */
    public function setTransactionKey($transactionKey)
    {
        $this->setParameter('transactionKey', $transactionKey);
    }

    /**
     * return string
     */
    public function getTransactionKey()
    {
        return $this->getParameter('transactionKey');
    }


    /**
     * @param array $parameters
     * @return \Omnipay\Cybersource\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cybersource\Message\PurchaseRequest', $parameters);
    }


}
