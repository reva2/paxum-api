<?php
/*
 * This file is part of the by paxum-api.
 *
 * (c) OrbitScripts LLC <support@orbitscripts.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reva2\Paxum\Response;

/**
 * Base class for API responses
 *
 * @package Reva2\Paxum\Response
 * @author Sergey Revenko <reva2@orbita1.ru>
 */
class AbstractResponse
{
    /**
     * API method that was called
     *
     * @var string
     */
    protected $method;

    /**
     * Response code
     *
     * @var string
     */
    protected $code;

    /**
     * Human readable response description
     *
     * @var string
     */
    protected $description;

    /**
     * Fee for the current transaction
     *
     * @var float
     */
    protected $fee = 0.0;

    /**
     * Constructor
     *
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        if (null !== $data) {
            $this->fromArray($data);
        }
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     * @return $this
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Sets object properties from data array
     *
     * @param array $data
     * @return $this
     */
    public function fromArray(array $data) {
        $this
            ->setMethod($data['method'])
            ->setCode($data['code'])
            ->setDescription($data['description'])
            ->setFee($data['fee']);

        return $this;
    }
}
