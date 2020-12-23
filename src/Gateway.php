<?php
namespace Omnipay\PaymentServiceNetwork;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\PaymentServiceNetwork\Message\CompletePurchaseRequest;
use Omnipay\PaymentServiceNetwork\Message\PurchaseRequest;

class Gateway extends AbstractGateway
{
    /**
     * Get name of the gateway
     *
     * @return string
     */
    public function getName(): string
    {
        return "Payment Service Network";
    }


    /**
     * Get default parameters
     *
     * @return array
     */
    public function getDefaultParameters(): array
    {
        return [
            'AccountId' => '',
            'security_code' => '775',
            'sandbox_mode' => false
        ];
    }

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
     * @return Gateway
     */
    public function setAccountId(string $value): Gateway
    {
        return $this->setParameter('AccountId', $value);
    }

    /**
     * Get security code.
     *
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->getParameter('security_code');
    }

    /**
     * Set security code.
     *
     * @param mixed $value
     * @return Gateway
     */
    public function setSecurityCode($value): Gateway
    {
        return $this->setParameter('security_code', $value);
    }

    public function getSandboxMode()
    {
        return $this->getParameter('sandbox_mode');
    }

    /**
     * @param mixed $value
     * @return Gateway
     */
    public function setSandboxMode($value): Gateway
    {
        return $this->setParameter('sandbox_mode', $value);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function purchase(array $options = array()): RequestInterface
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function completePurchase(array $options = array()): RequestInterface
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }
}
