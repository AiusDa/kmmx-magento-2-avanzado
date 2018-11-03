<?php

namespace Kmmx\Reward\Observer;

use Magento\Framework\Event\ObserverInterface;

class RewardObserver implements ObserverInterface
{
    protected $_logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $orderIds = $observer->getData('order_ids');
        $this->_logger->debug('RewardObserver Say: ', $orderIds);
    }
}
