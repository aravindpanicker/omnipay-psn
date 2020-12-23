<?php

namespace Omnipay\PaymentServiceNetwork\Message;

class CompletePurchaseRequest extends PurchaseRequest
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->httpRequest->request->all();
    }

    /**
     * @param mixed $data
     * @return CompletePurchaseResponse
     */
    public function sendData($data): CompletePurchaseResponse
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}