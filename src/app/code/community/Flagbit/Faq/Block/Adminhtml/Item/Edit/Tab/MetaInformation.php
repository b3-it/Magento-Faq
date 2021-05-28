<?php
declare(strict_types=1);

final class Flagbit_Faq_Block_Adminhtml_Item_Edit_Tab_MetaInformation extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm(): self
    {
        $model = Mage::registry('faq');
        
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('faq_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => $this->helper('flagbit_faq')->__('Meta Information'),
            'class' => 'fieldset-wide',
        ]);
        
        if ($model->getFaqId()) {
            $fieldset->addField('faq_id', 'hidden', ['name' => 'faq_id']);
        }

        $fieldset->addField('meta_title', 'text', [
            'name' => 'meta_title',
            'label' => $this->helper('flagbit_faq')->__('Meta Title'),
            'title' => $this->helper('flagbit_faq')->__('Meta Title'),
            'required' => false,
        ]);
        
        $fieldset->addField('meta_description', 'textarea', [
            'name' => 'meta_description',
            'label' => $this->helper('flagbit_faq')->__('Meta Description'),
            'title' => $this->helper('flagbit_faq')->__('Meta Description'),
            'required' => true,
        ]);
        
        $form->setValues($model->getData());
        $this->setForm($form);
        
        return parent::_prepareForm();
    }
}
