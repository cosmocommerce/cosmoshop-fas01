<?php
class CosmoCommerce_ThemeFas01_Block_Adminhtml_Catalog_Product_Edit_Tabs extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs
{
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->removeTab('tags');
        $this->removeTab('customers_tags');
        return ;
    }
}
