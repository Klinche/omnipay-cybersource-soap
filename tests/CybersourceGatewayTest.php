<?php

namespace Omnipay\Cybersource;

use Omnipay\Common\CreditCard;
use Omnipay\Tests\GatewayTestCase;

class CybersourceGatewayTest extends GatewayTestCase
{

    public $gateway = null;

    public function setUp()
    {
        parent::setUp();

        $bankAccount = new BankAccount();
        $bankAccount->setAccountNumber("12345678");
        $bankAccount->setRoutingNumber("112200439");
        $bankAccount->setBankName("Mikey National Bank");
        $bankAccount->setBankAccountType(BankAccount::ACCOUNT_TYPE_CHECKING);
        $bankAccount->setBillingFirstName("Mikey");
        $bankAccount->setBillingLastName("DABLname");
        $bankAccount->setName("Mikey DABLname");
        $bankAccount->setBillingAddress1("15505 Pennsylvania Ave.");
        $bankAccount->setBillingCity("Washington DC");
        $bankAccount->setBillingName("FED-Payor");
        $bankAccount->setBillingPostcode("20003");
        $bankAccount->setBillingState("CA");
        $bankAccount->setBillingCountry('USA');
        $bankAccount->setBillingPhone('5555555555');
        $bankAccount->setCompany("DAB2LLC");
        $bankAccount->setEmail('test@me.com');


        $creditCard = new CreditCard();
        $creditCard->setNumber('4111111111111111');
        $creditCard->setCvv("432");
        $creditCard->setExpiryMonth('12');
        $creditCard->setExpiryYear('2025');
        $creditCard->setEmail('test@me.com');
        $creditCard->setName("Mikey DABLname");
        $creditCard->setBillingAddress1("15505 Pennsylvania Ave.");
        $creditCard->setBillingCity("Washington DC");
        $creditCard->setBillingFirstName("FED-Payor");
        $creditCard->setBillingLastName("DABLname");
        $creditCard->setBillingPostcode("20003");
        $creditCard->setBillingState("DC");
        $creditCard->setBillingCountry("USA");


        $this->gateway = new CybersourceGateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->setTestMode(true);

        $defaultOptions = array(
            'merchantId' => '',
            'username' => '',
            'transactionKey' => ''
        );

        if ($defaultOptions['merchantId'] != '' && $defaultOptions['username'] != '' && $defaultOptions['transactionKey'] != '' && $defaultOptions['password'] != '') {
            $purchaseOptions = array(
                'amount' => '12.00',
                'card' => $creditCard,
                'merchantReferenceCode' => uniqid()
            );

            /** @var \Omnipay\Cybersource\Message\PurchaseRequest $request */
            $request = $this->gateway->purchase(array_merge($defaultOptions, $purchaseOptions));

            /** @var \Omnipay\Cybersource\Message\CybersourceResponse $response */
            $response = $request->send();

            $this->assertEquals(true, $response->isSuccessful());

            $purchaseOptions = array(
                'amount' => '12.00',
                'bankAccount' => $bankAccount,
                'merchantReferenceCode' => uniqid()
            );

            /** @var \Omnipay\Cybersource\Message\PurchaseRequest $request */
            $request = $this->gateway->purchase(array_merge($defaultOptions, $purchaseOptions));
            $response = $request->send();

            $this->assertEquals(true, $response->isSuccessful());


            $reportOptions = array(
                'reportDate' => new \DateTime('12/17/2014'),
            );

            /** @var \Omnipay\Cybersource\Message\TransactionDetailReportRequest $request */
            $request = $this->gateway->transactionDetailReport(array_merge($defaultOptions, $reportOptions));

            /** @var \Omnipay\Cybersource\Message\TransactionDetailReportResponse $response */
            $response = $request->send();


            $this->assertEquals(true, $response->isSuccessful());
        }
    }
}
