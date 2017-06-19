<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2016 Heimrich & Hannot GmbH
 *
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */


/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD']['navigationMenu'], 2, array('navigation_plus' => 'HeimrichHannot\NavigationPlus\ModuleNavigation'));