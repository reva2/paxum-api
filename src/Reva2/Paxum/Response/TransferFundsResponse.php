<?php
/*
 * This file is part of the paxum-api.
 *
 * (c) Sergey Revenko <dedsemen@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reva2\Paxum\Response;

/**
 * Response from transfer funds end-point
 *
 * @package Reva2\Paxum\Response
 * @author Sergey Revenko <reva2@orbita1.ru>
 */
class TransferFundsResponse extends AbstractResponse
{

    /**
     * Transaction ID
     *
     * @var string
     */
    protected $transactionId;

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data)
    {
        parent::fromArray($data);

        $this->setTransactionId($data['transactionId']);

        return $this;
    }
}
