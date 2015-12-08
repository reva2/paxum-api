<?php
/*
 * This file is part of the paxum-api.
 *
 * (c) Sergey Revenko <dedsemen@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reva2\Paxum;

use Guzzle\Http\Client;
use Reva2\Paxum\Request\AbstractRequest;
use Reva2\Paxum\Response\ResponseCode;

/**
 * Paxum API client
 *
 * @package Reva2\Paxum
 * @author Sergey Revenko <reva2@orbita1.ru>
 */
class ApiClient
{
    /**
     * Paxum API URL
     *
     * @var string
     */
    protected $apiURL = 'https://www.paxum.com/payment/api/paymentAPI.php';

    /**
     * Shared secret key for API
     *
     * @var string
     */
    protected $sharedSecret;

    /**
     * Sandbox mode flag
     *
     * @var bool
     */
    protected $sandbox = false;

    /**
     * Response code you wold like to receive in response from API
     *
     * @var string
     */
    protected $sandboxResponseCode = ResponseCode::SUCCESS;

    /**
     * @return string
     */
    public function getSharedSecret()
    {
        return $this->sharedSecret;
    }

    /**
     * @param string $sharedSecret
     * @return $this
     */
    public function setSharedSecret($sharedSecret)
    {
        $this->sharedSecret = $sharedSecret;

        return $this;
    }

    public function sendRequest(AbstractRequest $request) {
        try {
            $client = new Client();

            $data = $request->getRequestPayload();
            $data['key'] = $request->getKey($this->sharedSecret);

            if (true === $this->sandbox) {
                $data['sandbox'] = 'ON';
                $data['return'] = $this->sandboxResponseCode;
            }

            $response = $client->post($this->apiURL, null, $data)->send();

        } catch (\Exception $e) {

        }
    }
}
