<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class PartyIdentification implements XmlSerializable
{
    private $id;
    private $schemeID = 'SEPA';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return PartyIdentification
     */
    public function setId(string $id): PartyIdentification
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSchemeID(): ?string
    {
        return $this->schemeID;
    }

    /**
     * @param string $schemeID
     * @return PartyIdentification
     */
    public function setSchemeID(?string $schemeID): PartyIdentification
    {
        $this->schemeID = $schemeID;
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
            'name' => Schema::CBC . 'ID',
            'value' => $this->id,
            'attributes' => [
                'schemeID' => $this->schemeID
            ]
        ]);
    }
}
