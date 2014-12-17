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

        $bankAccountPayee = new BankAccount();
        $bankAccountPayee->setAccountNumber("0512-351217");
        $bankAccountPayee->setRoutingNumber("4271-04991");
        $bankAccountPayee->setBankName("Mikey National Bank");
        $bankAccountPayee->setBankAccountType(BankAccount::ACCOUNT_TYPE_CHECKING);
        $bankAccountPayee->setBillingFirstName("Mikey");
        $bankAccountPayee->setBillingLastName("DABLname");
        $bankAccountPayee->setName("Mikey DABLname");
        $bankAccountPayee->setBillingAddress1("15505 Pennsylvania Ave.");
        $bankAccountPayee->setBillingCity("Washington DC");
        $bankAccountPayee->setBillingName("FED-Payor");
        $bankAccountPayee->setBillingPostcode("20003");
        $bankAccountPayee->setBillingState("DC, NE");
        $bankAccountPayee->setCompany("DAB2LLC");


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


        $purchaseOptions = array(
            'amount' => '12.00',
            'card' => $creditCard,
            'merchantReferenceCode' => uniqid()
        );

        /** @var \Omnipay\Cybersource\Message\PurchaseRequest $request */
        $request = $this->gateway->purchase(array_merge($defaultOptions, $purchaseOptions));
        $response = $request->send();

        $this->assertEquals(true, $response->isSuccessful());
    }
}
