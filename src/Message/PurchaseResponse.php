<?php

namespace Omnipay\PaymentServiceNetwork\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class PurchaseResponse
 * @package Omnipay\PaymentServiceNetwork\Message
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Production URL
     */
    const API_HOST_LIVE = 'https://www.paymentservicenetwork.com/psnautoauth.asp';

    /**
     * Test URL
     */
    const API_HOST_TEST = 'https://prodtst.paymentservicenetwork.com/psnautoauth.asp';

    /**
     * PSN API Version
     */
    const API_VERSION = '1.4';

    /**
     * @return string
     */
    protected function getEndpoint(): string
    {
        if($this->request->getTestMode()) {
            return self::API_HOST_TEST;
        }
        return self::API_HOST_LIVE;
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        $redirectData = $this->getRedirectData();
        unset($redirectData['testMode']);
        return $this->getEndpoint() . '?' . http_build_query($redirectData);
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isRedirect(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getRedirectMethod(): string
    {
        return 'GET';
    }

    /**
     * @return array|mixed
     */
    public function getRedirectData(): array
    {
        return $this->data;
    }
}