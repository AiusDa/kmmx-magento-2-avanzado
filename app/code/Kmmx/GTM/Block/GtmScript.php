<?php
namespace Kmmx\GTM\Block;

use Magento\Store\Model\ScopeInterface;

class GtmScript extends \Magento\Framework\View\Element\Template
{

    protected $_logger;
    private $_xmlPathGtmId = 'GTM/gtm_configuration/gtm_id';

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        parent::__construct($context);
        $this->_logger = $logger;
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * Get Tag Manager Account ID
     *
     * @param null $store_id
     * @return null | string
     */
    public function getAccountId($store_id = null)
    {
        $gtmId =  $this->_scopeConfig->getValue(
            $this->_xmlPathGtmId,
            ScopeInterface::SCOPE_STORE,
            $store_id
        );
        $this->_logger->debug("GTM ID: $gtmId");
        return $gtmId;
    }
}
