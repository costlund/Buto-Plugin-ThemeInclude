<?php
class PluginThemeInclude{
  public function widget_include($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    /**
     * 
     */
    if($data->get('data/methods')){
      foreach($data->get('data/methods') as $v){
        $i = new PluginWfArray($v);
        wfPlugin::includeonce($i->get('plugin'));
        $obj = wfSettings::getPluginObj($i->get('plugin'));
        $method = $i->get('method');
        $data = $obj->$method($data);
      }
    }
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
     * title
     */
    if(wfDocument::$title){
      $element[] = wfDocument::createHtmlElement('title', '');
    }
    /**
     * meta data from page settings
     */
    if(wfGlobals::get('page/settings/description')){
      $element[] = wfDocument::createHtmlElement('meta', null, array('name' => 'description', 'content' => wfGlobals::get('page/settings/description')));
    }
    if(wfGlobals::get('page/settings/keywords')){
      $element[] = wfDocument::createHtmlElement('meta', null, array('name' => 'keywords', 'content' => wfGlobals::get('page/settings/keywords')));
    }
    if(wfGlobals::get('page/settings/author')){
      $element[] = wfDocument::createHtmlElement('meta', null, array('name' => 'author', 'content' => wfGlobals::get('page/settings/author')));
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
        $icon_element = wfDocument::createHtmlElement('link', null, array('rel' => 'icon', 'sizes' => '16x16', 'type' => 'image/png', 'href' => wfSettings::replaceDir($data->get('data/icon')).'?t='.$t));
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
     * Bootstrap.
     */
    if(!$data->get('data/bootstrap/version')){
      $data->set('data/bootstrap/version', '4');
    }
    /**
     * 
     */
    if($data->get('data/bootstrap/version')=='4'){
      /**
       * Bootstrap 4.
       */
      wfPlugin::enable('twitter/bootstrap453v');
      $element[] = wfDocument::createWidget('twitter/bootstrap453v', 'include', array('meta' => true, 'css' => true, 'jquery' => true, 'popper' => true, 'js' => true));
    }elseif($data->get('data/bootstrap/version')=='5'){
      /**
       * Bootstrap 5.
       */
      wfPlugin::enable('twitter/bootstrap530v');
      $element[] = wfDocument::createWidget('twitter/bootstrap530v', 'include', array('meta' => true, 'css' => true, 'jquery' => true, 'popper' => true, 'js' => true));
    }else{
      throw new Exception(__CLASS__.'::'.__FUNCTION__.' says: Incorrect Bootstrap version provided ('.$data->get('data/bootstrap/version').').');
    }
    /**
     * Bootswatch.
     */
    if($data->get('data/bootswatch/theme')){
      if($data->get('data/bootstrap/version')=='4'){
        wfPlugin::enable('bootstrap/bootswatch_v431');
        $element[] = wfDocument::createWidget('bootstrap/bootswatch_v431', 'include', array('theme' => $data->get('data/bootswatch/theme')));
      }elseif($data->get('data/bootstrap/version')=='5'){
        wfPlugin::enable('bootstrap/bootswatch_v523');
        $element[] = wfDocument::createWidget('bootstrap/bootswatch_v523', 'include', array('theme' => $data->get('data/bootswatch/theme')));
      }
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
    $element[] = wfDocument::createWidget('wf/ajax', 'include', $data->get('data/plugin/wf/ajax'));
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
    if($data->get('data/icons/octicons')){
      wfPlugin::enable('icons/octicons');
    }
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
     * icons/bootstrap_v1_8_1
     */
    wfPlugin::enable('icons/bootstrap_v1_8_1');
    /**
     * 
     */
    $element[] = wfDocument::createHtmlElement('text', "<!-- PluginThemeInclude, End -->\n");
    /**
     * i18n/replace_html_from_attr
     */
    wfPlugin::enable('i18n/replace_html_from_attr');
    $element[] = wfDocument::createWidget('i18n/replace_html_from_attr', 'include');
    /**
     * i18n/replace_html_from_attr
     */
    wfPlugin::enable('json/bind');
    $element[] = wfDocument::createWidget('json/bind', 'include');
    /**
     * bootstrap/toast
     */
    wfPlugin::enable('bootstrap/toast');
    $element[] = wfDocument::createWidget('bootstrap/toast', 'include');
    /**
     * bootstrap/accordion
     */
    wfPlugin::enable('bootstrap/accordion');
    /**
     * 
     */
    wfDocument::renderElement($element);
  }
}