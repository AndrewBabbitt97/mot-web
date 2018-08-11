<?php

/**
 * The download/play pages
 */
class MISTOFTIME_CTRL_Play extends OW_ActionController
{
    /**
     * The Windows download page
     */
    public function windows()
    {
        $language = OW::getLanguage();

        $this->setPageTitle($language->text('mistoftime', 'play_windows_title'));
        $this->setPageHeading($language->text('mistoftime', 'play_windows_heading'));

        $this->addmainmenu('windows');

        OW::getNavigation()->activateMenuItem(OW_Navigation::MAIN, 'mistoftime', 'menuitem_play');

        $downloadurl = OW::getConfig()->getValue('mistoftime', 'cdn_url') . 'StandaloneWindows/Player/mistoftime_standalonewindows.exe';
        $script = '$("input.download_button").click(function() {window.location="' . $downloadurl . '";});';
        OW::getDocument()->addOnloadScript($script);
    }

    /**
     * The Android download page
     */
    public function android()
    {
        $language = OW::getLanguage();

        $this->setPageTitle($language->text('mistoftime', 'play_android_title'));
        $this->setPageHeading($language->text('mistoftime', 'play_android_heading'));

        $this->addmainmenu('android');

        OW::getNavigation()->activateMenuItem(OW_Navigation::MAIN, 'mistoftime', 'menuitem_play');

        $downloadurl = OW::getConfig()->getValue('mistoftime', 'cdn_url') . 'Android/Player/mistoftime_android.apk';
        $script = '$("input.download_button").click(function() {window.location="' . $downloadurl . '";});';
        OW::getDocument()->addOnloadScript($script);
    }

    /**
     * The WebGL play page
     */
    public function webgl()
    {
        $language = OW::getLanguage();

        $this->setPageTitle($language->text('mistoftime', 'play_webgl_title'));
        $this->setPageHeading($language->text('mistoftime', 'play_webgl_heading'));

        $this->addmainmenu('webgl');

        OW::getNavigation()->activateMenuItem(OW_Navigation::MAIN, 'mistoftime', 'menuitem_play');

        $popouturl = OW::getConfig()->getValue('mistoftime', 'cdn_url') . 'WebGL/Player/motboot/index.html';
        $script = '$("input.play_button").click(function() {window.open("' . $popouturl . '", "_blank", "toolbar=no, scrollbars=no, resizeable=no, width=640, height=480");});';
        OW::getDocument()->addOnloadScript($script);
    }

    /**
     * Creates the main menu
     * @param mixed $currentitem
     */
    private function addmainmenu($currentitem)
    {
        $language = OW::getLanguage();

        $menuitems = array();

        $menuitem = new BASE_MenuItem();
        $menuitem->setLabel($language->text('mistoftime', 'play_mainmenu_windows'));
        $menuitem->setKey('windows');
        $menuitem->setUrl(OW::getRouter()->urlForRoute('mistoftime.play.windows'));
        $menuitem->setOrder(1);
        $menuitem->setIconClass('ow_ic_info');
        $menuitems[] = $menuitem;

        $menuitem = new BASE_MenuItem();
        $menuitem->setLabel($language->text('mistoftime', 'play_mainmenu_android'));
        $menuitem->setKey('android');
        $menuitem->setUrl(OW::getRouter()->urlForRoute('mistoftime.play.android'));
        $menuitem->setOrder(2);
        $menuitem->setIconClass('ow_ic_info');
        $menuitems[] = $menuitem;

        $menuitem = new BASE_MenuItem();
        $menuitem->setLabel($language->text('mistoftime', 'play_mainmenu_webgl'));
        $menuitem->setKey('webgl');
        $menuitem->setUrl(OW::getRouter()->urlForRoute('mistoftime.play.webgl'));
        $menuitem->setOrder(3);
        $menuitem->setIconClass('ow_ic_info');
        $menuitems[] = $menuitem;

        $menu = new BASE_CMP_ContentMenu($menuitems);

        $menu->getElement($currentitem)->setActive(true);

        $this->addComponent('mainmenu', $menu);
    }
}

?>