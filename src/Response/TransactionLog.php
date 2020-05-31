<?php
/**
 * This file is a part of "bert86014/ethereum-rpc" package.
 * https://github.com/bert86014/ethereum-rpc
 *
 * Copyright (c) 2020 Furqan A. Siddiqui <hello@bert86014.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or visit following link:
 * https://github.com/bert86014/ethereum-rpc/blob/master/LICENSE
 */

declare(strict_types=1);

namespace EthereumRPC\Response;

use EthereumRPC\Exception\ResponseObjectException;

/**
 * Class Transaction
 * @package EthereumRPC\Response
 */
class TransactionLog
{
    /** @var string */
    public $address;
    /** @var null|array */
    public $topics;
    /** @var string */
    public $data;
    /** @var null|string */
    public $blockNumber;
    /** @var null|string */
    public $blockHash;
    /** @var null|string */
    public $transactionHash;
    /** @var null|string */
    public $transactionIndex;
    /** @var null|string */
    public $logIndex;
    /** @var boolean */
    public $removed;

    /**
     * Transaction Log constructor.
     * @param array $obj
     * @throws ResponseObjectException
     */
    public function __construct(array $obj)
    {
        // Primary param
        $this->address = strval($obj["address"] ?? null);
        if (!is_string($this->address) || !preg_match('/^0x[a-f0-9]{40}$/i', $this->address)) {
            throw $this->unexpectedParamValue("address", "address");
        }
        $this->data = strval($obj["data"] ?? null);
        if (!is_string($this->data) ) {
            throw $this->unexpectedParamValue("data", "null|string");
        }
        
        $this->transactionHash = strval($obj["transactionHash"] ?? null);
        $this->transactionIndex = strval($obj["transactionIndex"] ?? null);
        $this->blockHash = strval($obj["blockHash"] ?? null);
        $this->blockNumber = strval($obj["blockNumber"] ?? null);
        $this->logIndex = strval($obj["logIndex"] ?? null);
        $this->topics = isset($obj["topics"]) && is_array($obj["topics"]) ? $obj["topics"] : null;
        $this->removed = isset($obj["removed"]) ? $obj["removed"] : true;
  
    }

   

    /**
     * @param string $param
     * @param null|string $expected
     * @param null|string $got
     * @return ResponseObjectException
     */
    private function unexpectedParamValue(string $param, ?string $expected = null, ?string $got = null): ResponseObjectException
    {
        $message = sprintf('Bad/unexpected value for param "%s"', $param);
        if ($expected) {
            $message .= sprintf(', expected "%s"', $expected);
        }

        if ($got) {
            $message .= sprintf(', got "%s"', $got);
        }


        return $this->exception($message);
    }

    /**
     * @param string $message
     * @return ResponseObjectException
     */
    private function exception(string $message): ResponseObjectException
    {
        $txId = is_int($this->hash) ? $this->hash : "???";
        return new ResponseObjectException(
            sprintf('Ethereum Block [%s]: %s', $txId, $message)
        );
    }
}
