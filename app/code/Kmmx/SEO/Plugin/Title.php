<?php

namespace Kmmx\SEO\Plugin;

use Magento\Store\Model\ScopeInterface;

class Title
{
    protected $_logger;
    private $_xmlPathTitlePrefix = 'SEO/seo_metas/title_prefix';
    private $_xmlPathTitleSufix = 'SEO/seo_metas/title_sufix';

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_logger = $logger;
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * Retrieve title element text (encoded)
     *
     * @return string
     */
    public function afterGet(\Magento\Framework\View\Page\Title $subject, $result)
    {
        return $this->getFullTitle($result);
    }

    /**
     * @param string title
     * @param bool store_id
     * @return string
     */
    private function getFullTitle($title, $store_id = null) {
        $separator = '|';
        // Retrieve Prefix value from admin configuration
        $prefix = $this->_scopeConfig->getValue(
            $this->_xmlPathTitlePrefix,
            ScopeInterface::SCOPE_STORE,
            $store_id
        );
        // Retrieve Sufix value from admin configuration
        $sufix = $this->_scopeConfig->getValue(
            $this->_xmlPathTitleSufix,
            ScopeInterface::SCOPE_STORE,
            $store_id
        );
        // Concatenates Prefix with Separator if Prefix is not empty
        $prefix = empty($prefix) ? "" : "$prefix $separator ";
        // Concatenates Sufix with Separator if Sufix is not empty
        $sufix = empty($sufix) ? "" : " $separator $sufix";

        $fullTitle = "$prefix$title$sufix";

        $this->_logger->debug("Full Title: $fullTitle");

        return $fullTitle;
    }
}