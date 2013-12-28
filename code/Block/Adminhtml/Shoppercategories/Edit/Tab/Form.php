<?php
class CosmoCommerce_ThemeFas01_Block_Adminhtml_Shoppercategories_Edit_Tab_Form extends Queldorei_Shoppercategories_Block_Adminhtml_Shoppercategories_Edit_Tab_Form
{

  private function _getGoogleFonts() {

      $gfonts447 ="微软雅黑,黑体,宋体";

      $fonts = explode(',', $gfonts447);
      $options = array(
          array(
              'value' => '',
              'label' => Mage::helper('shoppercategories')->__('- Please select -'),
          )
      );
      foreach ($fonts as $f ){
          $options[] = array(
              'value' => $f,
              'label' => $f,
          );
      }

      return $options;
  }

}