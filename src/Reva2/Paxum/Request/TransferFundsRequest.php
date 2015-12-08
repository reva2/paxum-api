<?php
/*
 * This file is part of the paxum-api.
 *
 * (c) Sergey Revenko <dedsemen@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reva2\Paxum\Request;

/**
 * Request to transfer funds end-point.
 *
 * Transfer funds end-point is used to transfer funds from one account to
 * another. For now only checking to checking transfers are allowed.
 *
 * @package Reva2\Paxum\Request
 * @author Sergey Revenko <reva2@orbita1.ru>
 */
class TransferFundsRequest extends AbstractRequest
{

    /**
     * The email associated with the account from which the amount is deducted
     *
     * @var string
     */
    protected $fromEmail;

    /**
     * The email associated with the account where the amount is transferred to
     *
     * @var string
     */
    protected $toEmail;

    /**
     * The amount to be transferred
     *
     * @var float
     */
    protected $amount;

    /**
     * Currency code
     *
     * @var string
     */
    protected $currency;

    /**
     * If first name is sent within the request, the transfer will be processed only
     * if first name on file matches the provided first name
     *
     * @var string
     */
    protected $firstName;

    /**
     * If last name is sent within the request, the transfer will be processed only
     * if last name on file matches the provided last name
     *
     * @var string
     */
    protected $lastName;

    /**
     * If business name is sent within the request, the transfer will be processed only
     * if business name on file matches the provided business name.
     * Applies only if money is sent to business accounts.
     *
     * @var string
     */
    protected $businessName;

    /**
     * Reference for your internal accounting
     *
     * @var string
     */
    protected $reference;

    /**
     * The transaction note
     *
     * @var string
     */
    protected $note;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->method = 'transferFunds';
    }

    /**
     * @return string
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * @param string $fromEmail
     * @return $this
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getToEmail()
    {
        return $this->toEmail;
    }

    /**
     * @param string $toEmail
     * @return $this
     */
    public function setToEmail($toEmail)
    {
        $this->toEmail = $toEmail;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * @param string $businessName
     * @return $this
     */
    public function setBusinessName($businessName = null)
    {
        $this->businessName = $businessName;

        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return $this
     */
    public function setReference($reference = null)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return $this
     */
    public function setNote($note = null)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['fromEmail'] = $this->fromEmail;
        $data['toEmail'] = $this->toEmail;
        $data['amount'] = $this->amount;
        $data['currency'] = $this->currency;
        $data['firstName'] = $this->firstName;
        $data['lastName'] = $this->lastName;
        $data['businessName'] = $this->businessName;
        $data['reference'] = $this->reference;
        $data['note'] = $this->note;

        return $data;
    }

    /**
     * @inheritDoc
     */
    protected function getKeyParts()
    {
        return array(
            $this->toEmail,
            $this->amount,
            $this->currency,
            $this->note,
            $this->firstName,
            $this->lastName,
            $this->businessName,
            $this->reference
        );
    }
}
