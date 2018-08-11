<?php

/**
 * The CDN API
 */
class MISTOFTIME_API_CDN
{
    /**
     * The main function
     */
    function main()
    {
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == 'getcdnurl')
            {
                $this->getcdnurl();
            }
        }
    }

    /**
     * Gets the CDN URL
     */
    private function getcdnurl()
    {
        echo OW::getConfig()->getValue('mistoftime', 'cdn_url');
    }
}

?>