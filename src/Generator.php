<?php

namespace NumNum\UBL;

use Sabre\Xml\Service;

class Generator
{
    public static $currencyID;

    public static function invoice(Invoice $invoice, $currencyId = 'EUR', $invoiceType)
    {
        self::$currencyID = $currencyId;

        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2' => '',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2' => 'cbc',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2' => 'cac'
        ];

        if ($invoiceType === 'CreditNote')
            $xmlService->namespaceMap = [
                'urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2' => '',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2' => 'cbc',
                'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2' => 'cac'
            ];
        }

        return $xmlService->write($invoiceType, [
            $invoice
        ]);
    }
}
