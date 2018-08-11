<?php

OW::getLanguage()->importPluginLangs(OW::getPluginManager()->getPlugin('mistoftime')->getRootDir() . 'langs.zip', 'mot');
OW::getPluginManager()->addPluginSettingsRouteName('mistoftime', 'mistoftime.admin.status');

if (!OW::getConfig()->configExists('mistoftime', 'cdn_url'))
{
    OW::getConfig()->addConfig('mistoftime', 'cdn_url', OW_URL_HOME . 'cdn/');
}

?>