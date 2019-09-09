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

use Reva2\Paxum\Response\RefundResponse;

/**
 * Request to refund transaction end-point.
 *
 * Refund transaction end-point is used to refund a previously processed transaction.
 *
 * @package Reva2\Paxum\Request
 * @author Vladimir Yudin <vladimir.udin@orbitsoft.com>
 */
class RefundRequest extends AbstractRequest
{

    /**
     * The email associated with the account from which the amount is deducted
     *
     * @var string
     */
    protected $fromEmail;

    /**
     * The ID of the transaction to be refunded
     *
     * @var string
     */
    protected $transId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->method = 'refundTransaction';
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
    public function getTransId()
    {
        return $this->transId;
    }

    /**
     * @param string $transId
     */
    public function setTransId($transId)
    {
        $this->transId = $transId;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['fromEmail'] = $this->fromEmail;
        $data['transId'] = $this->transId;

        return $data;
    }

    /**
     * @inheritDoc
     */
    protected function getKeyParts()
    {
        return array(
            $this->transId
        );
    }

    /**
     * @inheritDoc
     */
    protected function createResponse(array $data)
    {
        return new RefundResponse($data);
    }

}