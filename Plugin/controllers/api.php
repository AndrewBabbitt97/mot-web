<?php

/**
 * The Mist of Time API
 */
class MISTOFTIME_CTRL_API extends OW_ActionController
{
    /**
     * The entry point of the API
     */
    public function main()
    {
        if (isset($_GET['api']))
        {
            $storage = OW::getStorage();
            $apis = $storage->getFileNameList(OW::getPluginManager()->getPlugin('mistoftime')->getClassesDir() . 'api/', null, array('php'));

            for ($i = 0; $i < count($apis); $i++)
            {
                $apis[$i] = basename($apis[$i], '.php');
            }

            if (in_array($_GET['api'], $apis))
            {
                $apifile = OW::getPluginManager()->getPlugin('mistoftime')->getClassesDir() . 'api/' . strtolower($_GET['api']) . '.php';

                if ($storage->fileExists($apifile))
                {
                    require($apifile);
                    $class = "MISTOFTIME_API_" . strtoupper($_GET['api']);
                    $api = new $class;
                    $api->main();
                }
            }
        }

        exit();
    }
}

?>