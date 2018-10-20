<?php
 
namespace Kmmx\Reward\Model;
 
/**
 * Pay In Store payment method model
 */
class RewardMethod extends \Magento\Payment\Model\Method\AbstractMethod
{
 
    /**
     * Payment code
     *
     * @var string
     */
    protected $_code = 'reward';
}
