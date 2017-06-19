<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'HeimrichHannot\NavigationPlus\PageModel'        => 'system/modules/navigation_plus/models/PageModel.php',

	// Modules
	'HeimrichHannot\NavigationPlus\ModuleNavigation' => 'system/modules/navigation_plus/modules/ModuleNavigation.php',
));
