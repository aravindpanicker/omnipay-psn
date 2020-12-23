<?php

namespace Omnipay\PaymentServiceNetwork\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Class PurchaseRequest
 * @package Omnipay\PaymentServiceNetwork\Message
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Get PSN Account Id
     *
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->getParameter('AccountId');
    }

    /**
     * Set PSN Account Id
     *
     * @param string $value
     * @return PurchaseRequest
     */
    public function setAccountId(string $value): PurchaseRequest
    {
        return $this->setParameter('AccountId', $value);
    }

    /**
     * Get payer's name
     *
     * @return PurchaseRequest
     */
    public function getPayerName(): PurchaseRequest
    {
        return $this->getParameter('PayerName');
    }

    /**
     * Set payer's name
     *
     * @param string $value
     * @return PurchaseRequest
     */
    public function setPayerName(string $value): PurchaseRequest
    {
        return $this->setParameter('PayerName', $value);
    }

    /**
     * Get Address
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->getParameter('Addr');
    }

    /**
     * Set Address
     *
     * @param string $value
     * @return PurchaseRequest
     */
    public function setAddress(string $value): PurchaseRequest
    {
        return $this->setParameter('Addr', $value);
    }

    /**
     * Get city
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->getParameter('City');
    }

    /**
     * Set City
     *
     * @param $value string
     * @return PurchaseRequest
     */
    public function setCity(string $value): PurchaseRequest
    {
        return $this->setParameter('City', $value);
    }

    /**
     * Get state
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->getParameter('State');
    }

    /**
     * Set state
     *
     * @param string $value
     * @return PurchaseRequest
     */
    public function setState(string $value): PurchaseRequest
    {
        return $this->setParameter('State', $value);
    }

    /**
     * Get Zip
     *
     * @return mixed
     */
    public function getZip()
    {
        return $this->getParameter('Zip');
    }

    /**
     * Set zip
     *
     * @param string $value
     * @return PurchaseRequest
     */
    public function setZip(string $value): PurchaseRequest
    {
        return $this->setParameter('Zip', $value);
    }

    /**
     * Get
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getParameter('Email');
    }

    /**
     * @param string $value
     * @return PurchaseRequest
     */
    public function setEmail(string $value): PurchaseRequest
    {
        return $this->setParameter('Email', $value);
    }

    /**
     * @return float
     */
    public function getPaymentAmount(): float
    {
        return $this->getParameter('Payment_Amt');
    }

    /**
     * @param float $value
     * @return PurchaseRequest
     */
    public function setPaymentAmount(float $value): PurchaseRequest
    {
        return $this->setParameter('Payment_Amt', $value);
    }

    /**
     * @return mixed
     */
    public function getCustomerNumber()
    {
        return $this->getParameter('Customer_Number');
    }

    /**
     * @param string $value
     * @return PurchaseRequest
     */
    public function setCustomerNumber(string $value): PurchaseRequest
    {
        return $this->setParameter('Customer_Number', $value);
    }


    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->getParameter('security_code');
    }

    /**
     * 775 is used if return post is needed.
     * 776 is used if no return post and payer stays on PSN’s payment pages.
     *
     * @param $value int
     * @return PurchaseRequest
     */
    public function setSecurityCode($value)
    {
        return $this->setParameter('security_code', $value);
    }

    /**
     * @return mixed
     */
    public function getSandboxMode()
    {
        return $this->getParameter('sandbox_mode');
    }

    /**
     * @param mixed $value
     * @return PurchaseRequest
     */
    public function setSandboxMode($value): PurchaseRequest
    {
        return $this->setParameter('sandbox_mode', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate('AccountId', 'PayerName', 'Addr', 'City', 'State', 'Zip', 'Payment_Amt', 'security_code');
        return $this->getParameters();
    }

    /**
     * @inheritDoc
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}