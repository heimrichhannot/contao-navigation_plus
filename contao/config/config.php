<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2016 Heimrich & Hannot GmbH
 *
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

use Contao\ArrayUtil;

/**
 * Front end modules
 */

ArrayUtil::arrayInsert(
    $GLOBALS['FE_MOD']['navigationMenu'],
    2,
    ['navigation_plus' => 'HeimrichHannot\NavigationPlus\ModuleNavigation']
);
