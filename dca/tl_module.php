<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2016 Heimrich & Hannot GmbH
 *
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

$arrDca = &$GLOBALS['TL_DCA']['tl_module'];

/**
 * Selectors
 */
$arrDca['palettes']['__selector__'][] = 'definePages';

/**
 * Palettes
 */
$arrDca['palettes']['navigation_plus'] = str_replace('showHidden',
													 'showHidden, definePages',
													 $arrDca['palettes']['navigation']);

/**
 * Subpalettes
 */
$arrDca['subpalettes']['definePages'] = 'pages';

/**
 * Fields
 */

$arrFields = array
(
	'definePages' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['definePages'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr', 'submitOnChange' => true),
		'sql'                     => "char(1) NOT NULL default ''"
	)
);

$arrDca['fields'] = array_merge($arrDca['fields'], $arrFields);