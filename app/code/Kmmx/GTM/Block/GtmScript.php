<?php
namespace Kmmx\GTM\Block;

use Magento\Store\Model\ScopeInterface;

class GtmScript extends \Magento\Framework\View\Element\Template
{

    private $_xmlPathGtmId = 'GTM/gtm_configuration/gtm_id';

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        parent::__construct($context);
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
        return $this->_scopeConfig->getValue(
            $this->_xmlPathGtmId,
            ScopeInterface::SCOPE_STORE,
            $store_id
        );
    }
}
