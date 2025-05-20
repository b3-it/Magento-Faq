<?php
declare(strict_types=1);

class Flagbit_Faq_Controller_Router extends Mage_Core_Controller_Varien_Router_Standard
{
    public function match(Zend_Controller_Request_Http $request): bool
    {
        if (Mage::app()->getStore()->isAdmin()) {
            return false;
        }

        $pageId = trim($request->getPathInfo(), '/');

        if (strpos($pageId, $this->_getUrlKey()) !== 0) {
            return false;
        }
        $pageId = str_replace($this->_getUrlKey() . '/', '', $pageId);

        /** @var Flagbit_Faq_Model_Mysql4_Faq_Collection $faqCollection */
        $faqCollection = Mage::getModel('flagbit_faq/faq')->getCollection()
            ->addFieldToFilter('url_key', ['eq' => $pageId])
            ->addStoreFilter(Mage::app()->getStore())
            ->setPageSize(1);

        if ($faqCollection->count() === 0) {
            return false;
        }

        $faqItemId = $faqCollection->getFirstItem()->getId();

        $request->setModuleName($this->_getUrlKey())
            ->setControllerName('index')
            ->setActionName('show')
            ->setParam('faq', $faqItemId);

        /** @todo perhaps we need this */
        $request->setAlias(Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS, $pageId);

        return true;
    }

    protected function _getUrlKey(): string
    {
        return Mage::helper('flagbit_faq')->getFaqUrlKey();
    }
}