<?php

class CosmoCommerce_ThemeFas01_Adminhtml_RestoreController extends Queldorei_ShopperSettings_Adminhtml_RestoreController
{

    public function indexAction()
    {
        $this->_initAction();
        $this->_title($this->__('Queldorei'))
            ->_title($this->__('Shopper'))
            ->_title($this->__('Restore Defaults'));

        $this->_addContent($this->getLayout()->createBlock('shoppersettings/adminhtml_restore_edit'));
        $block = $this->getLayout()->createBlock('core/text', 'restore-desc')
                ->setText('<b>Theme default settings :</b>
                        <br/><br/>
                        <b>Appearance</b>
                        <ul>
                            <li>ATTENTION: All colors will be restored to default scheme. Do not restore if you do not want to loose your changes</li>
                        </ul>');
        $this->_addLeft($block);

        $this->renderLayout();
    }

}