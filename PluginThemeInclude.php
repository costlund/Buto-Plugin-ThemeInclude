<?php
class PluginThemeInclude{
  public function widget_include($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    /**
     * 
     */
    $element = array();
    /**
     * 
     */
    $element[] = wfDocument::createHtmlElement('text', "<!-- PluginThemeInclude, Start -->\n");
    /**
     * Noindex
     */
    if($data->get('data/noindex/enabled')){
      wfPlugin::enable('meta/noindex');
      $element[] = wfDocument::createWidget('meta/noindex', 'noindex');
    }
    /**
     * Icon
     */
    $icon_element = array();
    if($data->get('data/icon')){
      /**
       * If an icon is set.
       */
      $t = wfFilesystem::getFiletime(wfGlobals::getWebDir().wfSettings::replaceDir($data->get('data/icon')));
      if(!$t){
        throw new Exception('PluginThemeInclude says: Could not find icon '.$data->get('data/icon').'!');
      }else{
        $icon_element = wfDocument::createHtmlElement('link', null, array('rel' => 'icon', 'sizes' => '16x16', 'type' => 'image/png', 'href' => $data->get('data/icon').'?t='.$t));
      }
    }
    if(!sizeof($icon_element)){
      /**
       * If there is an theme icon.
       */
      $t = wfFilesystem::getFiletime(wfGlobals::getWebDir().wfSettings::replaceDir('/theme/[theme]/icon/link_icon.png'));
      if($t){
        $icon_element = wfDocument::createHtmlElement('link', null, array('rel' => 'icon', 'sizes' => '16x16', 'type' => 'image/png', 'href' => '/theme/[theme]/icon/link_icon.png?t='.$t));
      }
    }
    if(!sizeof($icon_element)){
      /**
       * Else we use this plugin icon.
       */
        $t = wfFilesystem::getFiletime(wfGlobals::getWebDir().wfSettings::replaceDir('/plugin/theme/include/icon/icon.png'));
        $icon_element = wfDocument::createHtmlElement('link', null, array('rel' => 'icon', 'sizes' => '16x16', 'type' => 'image/png', 'href' => '/plugin/theme/include/icon/icon.png?u='.$t));
    }
    if(sizeof($icon_element)){
      $element[] = $icon_element;
    }
    /**
     * Bootstrap 4.
     */
    wfPlugin::enable('twitter/bootstrap453v');
    $element[] = wfDocument::createWidget('twitter/bootstrap453v', 'include', array('meta' => true, 'css' => true, 'jquery' => true, 'popper' => true, 'js' => true));
    /**
     * Bootswatch.
     */
    wfPlugin::enable('bootstrap/bootswatch_v431');
    if($data->get('data/bootswatch/theme')){
      $element[] = wfDocument::createWidget('bootstrap/bootswatch_v431', 'include', array('theme' => $data->get('data/bootswatch/theme')));
    }
    /**
     * Navbar.
     */
    wfPlugin::enable('bootstrap/navbar_v1');
    /**
     * Modal.
     */
    wfPlugin::enable('wf/bootstrapjs');
    $element[] = wfDocument::createWidget('wf/bootstrapjs', 'include');
    /**
     * Dom.
     */
    wfPlugin::enable('wf/dom');
    $element[] = wfDocument::createWidget('wf/dom', 'include');
    /**
     * wf/ajax
     */
    wfPlugin::enable('wf/ajax');
    $element[] = wfDocument::createWidget('wf/ajax', 'include');
    /**
     * wf/callbackjson
     */
    wfPlugin::enable('wf/callbackjson');
    $element[] = wfDocument::createWidget('wf/callbackjson', 'include');
    /**
     * wf/account2
     */
    wfPlugin::enable('wf/account2');
    $element[] = wfDocument::createWidget('wf/account2', 'include');
    /**
     * icons/octicons.
     */
    wfPlugin::enable('icons/octicons');
    /**
     * form/form_v1
     */
    wfPlugin::enable('form/form_v1');
    $element[] = wfDocument::createWidget('form/form_v1', 'include');
    /**
     * eternicode/bootstrapdatepicker2
     */
    wfPlugin::enable('eternicode/bootstrapdatepicker2');
    $element[] = wfDocument::createWidget('eternicode/bootstrapdatepicker2', 'include');
    /**
     * datatable/datatable_1_10_18
     */
    wfPlugin::enable('datatable/datatable_1_10_18');
    $element[] = wfDocument::createWidget('datatable/datatable_1_10_18', 'include', array('style' => 'bootstrap', 'export' => true));
    /**
     * bootstrap4/fs_modal
     */
    wfPlugin::enable('bootstrap4/fs_modal');
    $element[] = wfDocument::createWidget('bootstrap4/fs_modal', 'include');
    /**
     * wf/embed
     */
    wfPlugin::enable('wf/embed');
    /**
     * bootstrap/css_v1
     */
    wfPlugin::enable('bootstrap/css_v1');
    $element[] = wfDocument::createWidget('bootstrap/css_v1', 'include');
    /**
     * i18n/json_v1
     */
    wfPlugin::enable('i18n/json_v1');
    $element[] = wfDocument::createWidget('i18n/json_v1', 'include');
    /**
     * wf/table
     */
    wfPlugin::enable('wf/table');
    /**
     * bootstrap/navtabs_v1
     */
    wfPlugin::enable('bootstrap/navtabs_v1');
    $element[] = wfDocument::createWidget('bootstrap/navtabs_v1', 'include');
    /**
     * 
     */
    $element[] = wfDocument::createHtmlElement('text', "<!-- PluginThemeInclude, End -->\n");
    /**
     * 
     */
    wfDocument::renderElement($element);
  }
}