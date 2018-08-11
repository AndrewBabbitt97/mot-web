<?php

OW::getNavigation()->deleteMenuItem('mistoftime', 'menuitem_play');

$htaccess = file_get_contents(OW_DIR_ROOT . '.htaccess');
$htaccess = str_replace("RewriteCond %{REQUEST_URI} !^/index\.php\nRewriteCond %{REQUEST_URI} !/cdn/", "RewriteCond %{REQUEST_URI} !^/index\.php", $htaccess);
file_put_contents(OW_DIR_ROOT . '.htaccess', $htaccess);

?>