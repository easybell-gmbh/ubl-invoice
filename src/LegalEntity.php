<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class LegalEntity implements XmlSerializable
{
    private $registrationName;
    private $companyId;
    private $companyLegalForm;
    private $companyIdAttributes;

    /**
     * @return string
     */
    public function getRegistrationName(): ?string
    {
        return $this->registrationName;
    }

    /**
     * @param string $registrationName
     * @return LegalEntity
     */
    public function setRegistrationName(?string $registrationName): LegalEntity
    {
        $this->registrationName = $registrationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @return string
     */
    public function getCompanyLegalForm(): ?string
    {
        return $this->companyLegalForm;
    }

    /**
     * @param string $companyLegalForm
     * @return LegalEntity
     */
    public function setCompanyLegalForm(?string $companyLegalForm): LegalEntity
    {
        $this->companyLegalForm = $companyLegalForm;
        return $this;
    }

    /**
     * @param string $companyId
     * @return LegalEntity
     */
    public function setCompanyId(?string $companyId, $attributes = null): LegalEntity
    {
        $this->companyId = $companyId;
        if (isset($attributes)) {
            $this->companyIdAttributes = $attributes;
        }
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $writer->write([
            Schema::CBC . 'RegistrationName' => $this->registrationName,
        ]);

        if ($this->companyLegalForm !== null) {
            $writer->write([
                Schema::CBC . 'CompanyLegalForm' => $this->companyLegalForm,
            ]);
        }

        if ($this->companyId !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'CompanyID',
                    'value' => $this->companyId,
                    'attributes' => $this->companyIdAttributes,
                ],
            ]);
        }
    }
}
