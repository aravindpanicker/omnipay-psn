<?php

namespace Omnipay\PaymentServiceNetwork\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class CompletePurchaseResponse
 * @package Omnipay\PaymentServiceNetwork\Message
 */
class CompletePurchaseResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * Check if transaction was successful
     * @return bool|mixed|null
     */
    public function isSuccessful(): ?bool
    {
        if(isset($this->data['Payment_Status']) && $this->data['Payment_Status'] == 'Approved') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get transaction reference.
     *
     * @return mixed|string|null
     */
    public function getTransactionReference(): ?string
    {
        return $this->getTransactionId();
    }

    /**
     * Get transaction id
     *
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->data['Trans_ID'];
    }
}