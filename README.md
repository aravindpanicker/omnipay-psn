# Omnipay: PSN

**PSN driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements Dummy support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply require `league/omnipay` and `apanicker/omnipay-psn` with Composer:

```
composer require league/omnipay apanicker/omnipay-psn
```

## Basic Usage

The following gateways are provided by this package:

* PaymentServiceNetwork

In order to use this driver, you need to acquire the test  `accountId` from [PSN](https://www.info.paymentservicenetwork.com). You can set the `testMode` parameter to `true` if you want to run the driver in sandbox mode.

```
use Omnipay\Omnipay;

$gateway = Omnipay::create('PaymentServiceNetwork');

$gateway->initialize([
    'accountId' => 'RXXXXXX',
    'testMode' => false
]);

$formData = [
    'PayerName' => 'John Doe',
    'Address' => '2310  Elliot Avenue',
    'City' => 'Seattle',
    'State' => 'WA',
    'Zip' => '98115',
    'Email' => 'john@testing.com',
    'Payment_Amount' => '150.00',
    'Customer_Number' => 'C12112'
];

$response = $gateway->purchase($formData)->send();

if($response->isRedirect()) {
    $response->redirect();
}
```
For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/apanicker/omnipay-psn/issues),
or better yet, fork the library and submit a pull request.
