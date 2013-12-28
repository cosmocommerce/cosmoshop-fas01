<?php

require_once 'Queldorei/ShopperSettings/controllers/Adminhtml/ActivateController.php';
class CosmoCommerce_ThemeFas01_Adminhtml_ActivateController extends Queldorei_ShopperSettings_Adminhtml_ActivateController
{

	public function indexAction()
	    {
	        $this->_initAction();
	        $this->_title($this->__('Queldorei'))
	            ->_title($this->__('Shopper'))
	            ->_title($this->__('Activate Shopper Theme'));

	        $this->_addContent($this->getLayout()->createBlock('shoppersettings/adminhtml_activate_edit'));
	        $block = $this->getLayout()->createBlock('core/text', 'activate-desc')
	                ->setText('<b>将会激活以下信息:</b>
	                        <br/><br/>
	                        <big>系统 > 配置</big><br/><br/>
	                        <b>网站 > 默认页面</b>
	                        <ul>
	                            <li>首页</li>
	                            <li>错误提示页</li>
	                        </ul>
	                        <b>设计 > 模板包</b>
	                        <ul>
	                            <li>FAS01 模板</li>
	                        </ul>
							<b>设计 > 设计</b>
	                        <ul>
	                            <li>默认</li>
	                        </ul>
	                        <b>设计 > 页尾</b>
	                        <ul>
	                            <li>版权信息</li>
	                        </ul>
	                        <b>汇率设置 > 汇率选项</b>
	                        <ul>
	                            <li>允许的汇率</li>
	                        </ul>
	                        ');
	        $this->_addLeft($block);

	        $this->renderLayout();
	    }

	public function activateAction()
    {
        $stores = $this->getRequest()->getParam('stores', array(0));
        $update_currency = $this->getRequest()->getParam('update_currency', 0);
        $setup_cms = $this->getRequest()->getParam('setup_cms', 0);
        
        try {
	        foreach ($stores as $store) {
                $scope = ($store ? 'stores' : 'default');
		        //web > default pages
                Mage::getConfig()->saveConfig('web/default/cms_home_page', 'shopper_home_2col', $scope, $store);
                Mage::getConfig()->saveConfig('web/default/cms_no_route', 'shopper_no_route', $scope, $store);
		        //design > package
                Mage::getConfig()->saveConfig('design/package/name', 'shopper', $scope, $store);
				//design > themes
                Mage::getConfig()->saveConfig('design/theme/default', 'default', $scope, $store);
                //design > header
                //Mage::getConfig()->saveConfig('design/header/logo_src', 'images/logo.png', $scope, $store);
                //design > footer
                Mage::getConfig()->saveConfig('design/footer/copyright', 'CosmoShop &copy; 2014 <a href="http://www.fuwuqi.org.cn" >时尚模板</a> 上海杰原信息科技有限公司', $scope, $store);
                //Currency Setup > Currency Options
                if ($update_currency) {
                    Mage::getConfig()->saveConfig('currency/options/allow', 'CNY', $scope, $store);
                }
            }

	        if ($setup_cms) {
                Mage::getModel('shoppersettings/settings')->setupCms();
	        }

		    Mage::getSingleton('adminhtml/session')->addSuccess(
                Mage::helper('shoppersettings')->__('模板已经激活.<br/>
                如果前台没有变化请清空缓存 (位于  系统 > 缓存管理) .<br/>
                <b>注意: 请从后台登出以后再次登录激活设置.</b>
                '));
        }
        catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('shoppersettings')->__('An error occurred while activating theme').$e->getMessage());
        }

        $this->getResponse()->setRedirect($this->getUrl("*/*/"));
    }


}