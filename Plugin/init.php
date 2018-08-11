<?php

OW::getRouter()->addRoute(new OW_Route('mistoftime.admin.status', 'admin/plugins/mistoftime/status', 'MISTOFTIME_CTRL_Admin', 'status'));
OW::getRouter()->addRoute(new OW_Route('mistoftime.admin.settings', 'admin/plugins/mistoftime/settings', 'MISTOFTIME_CTRL_Admin', 'settings'));
OW::getRouter()->addRoute(new OW_Route('mistoftime.api', 'mistoftime/api', 'MISTOFTIME_CTRL_Api', 'main'));
OW::getRouter()->addRoute(new OW_Route('mistoftime.play.windows', 'mistoftime/play/windows', 'MISTOFTIME_CTRL_Play', 'windows'));
OW::getRouter()->addRoute(new OW_Route('mistoftime.play.android', 'mistoftime/play/android', 'MISTOFTIME_CTRL_Play', 'android'));
OW::getRouter()->addRoute(new OW_Route('mistoftime.play.webgl', 'mistoftime/play/webgl', 'MISTOFTIME_CTRL_Play', 'webgl'));

?>