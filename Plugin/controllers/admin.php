<?php

/**
 * The admin pages
 */
class MISTOFTIME_CTRL_Admin extends ADMIN_CTRL_Abstract
{
    /**
     * The status page
     */
    public function status()
    {
        $language = OW::getLanguage();

        $this->setPageTitle($language->text('mistoftime', 'admin_status_title'));
        $this->setPageHeading($language->text('mistoftime', 'admin_status_heading'));

        $this->addmainmenu('status');
    }

    /**
     * The settings page
     */
    public function settings()
    {
        $language = OW::getLanguage();

        $this->setPageTitle($language->text('mistoftime', 'admin_settings_title'));
        $this->setPageHeading($language->text('mistoftime', 'admin_settings_heading'));

        $this->addmainmenu('settings');

        $this->generatesettingsform();
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
        $menuitem->setLabel($language->text('mistoftime', 'admin_mainmenu_status'));
        $menuitem->setKey('status');
        $menuitem->setUrl(OW::getRouter()->urlForRoute('mistoftime.admin.status'));
        $menuitem->setOrder(1);
        $menuitem->setIconClass('ow_ic_dashboard');
        $menuitems[] = $menuitem;

        $menuitem = new BASE_MenuItem();
        $menuitem->setLabel($language->text('mistoftime', 'admin_mainmenu_settings'));
        $menuitem->setKey('settings');
        $menuitem->setUrl(OW::getRouter()->urlForRoute('mistoftime.admin.settings'));
        $menuitem->setOrder(2);
        $menuitem->setIconClass('ow_ic_gear_wheel');
        $menuitems[] = $menuitem;

        $menu = new BASE_CMP_ContentMenu($menuitems);
        $menu->getElement($currentitem)->setActive(true);
        $this->addComponent('mainmenu', $menu);
    }

    /**
     * Generates the settings form
     */
    private function generatesettingsform()
    {
        $language = OW::getLanguage();

        $settingsform = new Form('settingsform');

        $platform = new TextField('cdnurl');
        $platform->setLabel($language->text('mistoftime', 'admin_settings_settingsform_cdnurl'));
        $platform->setValue(OW::getConfig()->getValue('mistoftime', 'cdn_url'));
        $settingsform->addElement($platform);

        $submit = new Submit('settingssave');
        $submit->setValue($language->text('mistoftime', 'admin_settings_settingsform_settingssave'));
        $settingsform->addElement($submit);

        $this->addForm($settingsform);

        if (OW::getRequest()->isPost() && $settingsform->isValid($_POST) && isset($_POST['settingssave']))
        {
            OW::getConfig()->saveConfig('mistoftime', 'cdn_url', $platform->getValue());
        }
    }
}

?>