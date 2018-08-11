<?php

OW::getNavigation()->addMenuItem(OW_Navigation::MAIN, 'mistoftime.play.windows', 'mistoftime', 'menuitem_play', OW_Navigation::VISIBLE_FOR_ALL);

$htaccess = file_get_contents(OW_DIR_ROOT . '.htaccess');
$htaccess = str_replace("RewriteCond %{REQUEST_URI} !^/index\.php", "RewriteCond %{REQUEST_URI} !^/index\.php\nRewriteCond %{REQUEST_URI} !/cdn/", $htaccess);
file_put_contents(OW_DIR_ROOT . '.htaccess', $htaccess);

?>