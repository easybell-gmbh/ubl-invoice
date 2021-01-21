<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class PaymentMandate implements XmlSerializable
{
    private $id;
    private $payerFinancialAccount;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return PaymentMandate
     */
    public function setId(string $id): PaymentMandate
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return PayerFinancialAccount
     */
    public function getPayerFinancialAccount(): PayerFinancialAccount
    {
        return $this->payerFinancialAccount;
    }

    /**
     * @param PayerFinancialAccount $payerFinancialAccount
     * @return Party
     */
    public function setPayerFinancialAccount(PayerFinancialAccount $payerFinancialAccount): PaymentMandate
    {
        $this->payerFinancialAccount = $payerFinancialAccount;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            Schema::CBC . 'ID' => $this->id
        ]);

        $writer->write([
            Schema::CAC . 'PayerFinancialAccount' => $this->payerFinancialAccount
        ]);
    }
}
