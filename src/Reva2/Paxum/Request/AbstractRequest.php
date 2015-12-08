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
 * Base class for various request to Paxum API
 *
 * @package Reva2\Paxum\Request
 * @author Sergey Revenko <reva2@orbita1.ru>
 */
abstract class AbstractRequest
{
    /**
     * API method
     *
     * @var string
     */
    protected $method;

    /**
     * Returns API method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Returns key for request
     *
     * @param string $sharedSecret
     * @return string
     */
    public function getKey($sharedSecret) {
        return md5($sharedSecret . implode('', $this->getKeyParts()));
    }

    /**
     * Convert object to array
     *
     * @return array
     */
    public function toArray() {
        return array(
            'method' => $this->method
        );
    }

    /**
     * Returns request payload
     *
     * @return array
     */
    public function getRequestPayload() {
        return $this->removeEmptyOptionalFields($this->toArray());
    }

    /**
     * Returns list of fields required in this type of request
     *
     * @return array
     */
    protected function getRequiredField() {
        return array();
    }

    /**
     * Remove options fields that have empty value from specified data
     *
     * @param array $data
     * @return array
     */
    private function removeEmptyOptionalFields(array $data)
    {
        $requiredFields = $this->getRequiredField();

        foreach($data as $field => $value) {
            if ((null === $value) && (!in_array($field, $requiredFields))) {
                unset($data[$field]);
            }
        }

        return $data;
    }

    /**
     * Returns request key parts
     *
     * @return string[]
     */
    abstract protected function getKeyParts();
}
