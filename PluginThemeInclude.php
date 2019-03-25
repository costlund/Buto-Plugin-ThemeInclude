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
     * Bootstrap 4.
     */
    wfPlugin::enable('twitter/bootstrap413v');
    $element[] = wfDocument::createWidget('twitter/bootstrap413v', 'include', array('meta' => true, 'css' => true, 'jquery' => true, 'popper' => true, 'js' => true));
    /**
     * Bootswatch.
     */
    wfPlugin::enable('bootstrap/bootswatch_v431');
    $element[] = wfDocument::createWidget('bootstrap/bootswatch_v431', 'include', array('theme' => $data->get('data/bootswatch/theme')));
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
     * 
     */
    wfDocument::renderElement($element);
  }
}