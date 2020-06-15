# ethereum-rpc

Ethereum (geth) RPC client

interface to [Ethereum JSON-RPC API](https://github.com/ethereum/wiki/wiki/JSON-RPC).

## Prerequisites

* PHP >= 7.1
* [bert86014/http-client](https://github.com/bert86014/http-client) >= v0.3.0

## Installation

`composer require bert86014/ethereum-rpc`
```php

use EthereumRPC\EthereumRPC;
...

$eth = new EthereumRPC(config('ethereum.host'), config('ethereum.port'));

```

## Documentation

[官网]

## Integration

[Laravel 5 拓展包: bert86014/laravel-erc20](https://github.com/bert86014/laravel-erc20)

## Sponsor

Thank you for Sponsor Us!!!

BTC/USDT-OMNI: 34BoQPt38uxCDA6W9Dw9i7LgGar6xHoDFG

![image](https://github.com/bert86014/doc/raw/master/img/btc.png)

ETH/USDT-ERC20: 0xd9b020B647245E080890Af29657e30B2e7F45f59

![image](https://github.com/bert86014/doc/raw/master/img/eth.png)

## License

This content is released under the [MIT](http://opensource.org/licenses/MIT) License.

