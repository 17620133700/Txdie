<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 当使用qq或者微信的内置浏览器打开网站时，发出提示用其他浏览器打开<br>
 * 
 * 
 * @package Txdie
 * @author QQDIE，ByGalxy
 * @version 1.0.0
 * @link https://blog.klbbx.cn
 */
class Txdie_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->beforeRender = array('Txdie_Plugin', 'render');
        Typecho_Plugin::factory('admin/common.php')->begin = array('Txdie_Plugin', 'render');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render($obj)
    {
include('hong.php');
return $obj;
    }
}
