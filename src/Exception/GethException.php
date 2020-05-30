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

namespace EthereumRPC\Exception;

/**
 * Class GethException
 * @package EthereumRPC\Exception
 */
class GethException extends EthereumRPCException
{
    /**
     * @param string $method
     * @param string $expected
     * @param string $got
     * @return GethException
     */
    public static function unexpectedResultType(string $method, string $expected, string $got): self
    {
        return new self(
            sprintf('Method [%s] expects result type %s, got %s', $method, strtoupper($expected), strtoupper($got))
        );
    }
}
