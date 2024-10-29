<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 当使用qq或者微信的内置浏览器打开网站时，发出提示用其他浏览器打开<br>
 * 本插件由<a href="https://www.typecho.wiki" target="_blank">Typecho.wiki</a>负责分发<br>
 * <a href="https://www.typecho.wiki/typecho-blocks-qq-and-wechat-builtin-browser-plugin-txdie.html" target="_blank" style="background: #000;padding: 2px 4px;color: #ffeb00;font-size: 12px;">Txdie插件使用</a> - <a href="https://www.typecho.wiki/typecho-blocks-qq-and-wechat-builtin-browser-plugin-txdie.html#comments" target="_blank" style="background: #000;padding: 2px 4px;color: #ffeb00;font-size: 12px;">Txdie插件Bug反馈</a> - <a href="http://qqdie.com" target="_blank" style="background: #000;padding: 2px 4px;color: #ffeb00;font-size: 12px;">插件作者网站</a> - <a href="https://www.typecho.wiki" target="_blank" style="background: #000;padding: 2px 4px;color: #ffeb00;font-size: 12px;">更多Typecho插件</a>
 * 
 * @package Txdie
 * @author QQDIE
 * @version 1.0.0
 * @link http://qqdie.com
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
