<?php
/**
 * EMThemes
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade the framework to newer
 * versions in the future. If you wish to customize the framework for your
 * needs please refer to http://www.emthemes.com/ for more information.
 *
 * @category    EM
 * @package     EM_ThemeFramework
 * @copyright   Copyright (c) 2012 CodeSpot JSC. (http://www.emthemes.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class EM_Themeframework_Block_Adminhtml_Basetheme extends Mage_Adminhtml_Block_Template
{
    
    public function __construct()
    {
        $this->_controller = 'adminhtml_basetheme';
        parent::__construct();
        $this->setTemplate('em_themeframework/emthemes/basetheme.phtml');
    }
    
    public function _buildBaseThemeArray(Varien_Simplexml_Element $parent = null,$path = '')
    {
        if (is_null($parent)) {
            $parent = Mage::getSingleton('admin/config')->getAdminhtmlConfig()->getNode('menu/emthemes/children/emthemes_manager/children');
        }      

        $parentArr = array();
                
        foreach ($parent->children() as $childName => $child) {
            $menuArr = array();

            $menuArr['title'] = $child->title;
            $menuArr['identifier'] = $child->identifier;
            $menuArr['desciption'] = $child->desciption;

            if ($child->action) {
                $menuArr['action'] = $child->action;
            } else {
                $menuArr['action'] = '#';
                $menuArr['click'] = 'return false';
            }
            
            $parentArr[$childName] = $menuArr;
        }

        while (list($key, $value) = each($parentArr)) {
            $last = $key;
        }
        if (isset($last)) {
            $parentArr[$last]['last'] = true;
        }

        return $parentArr;
    }
}