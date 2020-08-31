<?php
/**
 * FAQ for Magento
 *
 * @category   Flagbit
 * @package    Flagbit_Faq
 * @copyright  Copyright (c) 2009 Flagbit GmbH & Co. KG <magento@flagbit.de>
 */

/**
 * FAQ for Magento
 *
 * @category   Flagbit
 * @package    Flagbit_Faq
 * @author     Flagbit GmbH & Co. KG <magento@flagbit.de>
 */
class Flagbit_Faq_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Returns config data
     * 
     * @param string $field Requested field
     * @return array config Configuration information
     */
    public function getConfigData($field)
    {
        $path = 'faq/config/' . $field;

        return Mage::getStoreConfig($path, Mage::app()->getStore());
    }

    /**
     * Retrieve FAQ index url
     *
     * @return string
     */
    public function getFaqIndexUrl()
    {
        return $this->_getUrl('faq');
    }

    public function getUrlForFaqItem(Flagbit_Faq_Model_Faq $faqModel, ?Mage_Core_Model_Store $store = null): string
    {
        return $this->_getUrl($this->getFaqUrlKey() . '/' . $faqModel->getUrlKey());
    }

    /**
     * Get configured URL key.
     */
    public function getFaqUrlKey(): string
    {
        return Mage::getStoreConfig('flagbit_faq/general/url_key');
    }
}
