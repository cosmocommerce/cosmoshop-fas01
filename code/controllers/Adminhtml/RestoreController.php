<?php

require_once 'Queldorei/ShopperSettings/controllers/Adminhtml/RestoreController.php';
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
                ->setText('<b>模板复原:</b>
                        <br/><br/>
                        <b>界面</b>
                        <ul>
                            <li>提醒: 所有的颜色设置将会恢复为默认值.如果需要保留颜色请不要恢复默认值.</li>
                        </ul>');
        $this->_addLeft($block);

        $this->renderLayout();
    }
 
}