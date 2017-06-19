<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2016 Heimrich & Hannot GmbH
 *
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\NavigationPlus;


class PageModel extends \Contao\PageModel
{
	/**
	 * Find all published subpages by their parent ID, and selected pages and exclude pages only visible for guests
	 *
	 * @param integer $intPid        The parent page's ID
	 * @param boolean $blnShowHidden If true, hidden pages will be included
	 * @param boolean $blnIsSitemap  If true, the sitemap settings apply
	 * @param array   $arrPages      A list of page ids, that should be used to order subpages
	 *
	 * @return \Model\Collection|\PageModel[]|\PageModel|null A collection of models or null if there are no pages
	 */
	public static function findPublishedSubpagesWithoutGuestsByPidWithOrder($intPid, $blnShowHidden = false, $blnIsSitemap = false, array $arrPages = array())
	{
		$time = \Date::floorToMinute();

		$objSubpages = \Database::getInstance()->prepare(
			"SELECT p1.*, (SELECT COUNT(*) FROM tl_page p2 WHERE 
			p2.pid=p1.id AND p2.type!='root' AND p2.type!='error_403' AND 
			p2.type!='error_404'" . ((!$blnShowHidden && empty($arrPages)) ? ($blnIsSitemap ? " AND (p2.hide='' OR sitemap='map_always')" : " AND p2.hide=''") : "") .
			((FE_USER_LOGGED_IN && !BE_USER_LOGGED_IN) ? " AND p2.guests=''" : "") .
			(!BE_USER_LOGGED_IN ? " AND (p2.start='' OR p2.start<='$time') AND (p2.stop='' OR p2.stop>'" . ($time + 60) . "') AND p2.published='1'" : "") . ") 
			AS subpages FROM tl_page p1 WHERE p1.pid=? AND p1.type!='root' AND p1.type!='error_403' AND p1.type!='error_404'" .
			((!$blnShowHidden && empty($arrPages)) ? ($blnIsSitemap ? " AND (p1.hide='' OR sitemap='map_always')" : " AND p1.hide=''") : "") .
			((FE_USER_LOGGED_IN && !BE_USER_LOGGED_IN) ? " AND p1.guests=''" : "") .
			(!BE_USER_LOGGED_IN ? " AND (p1.start='' OR p1.start<='$time') AND (p1.stop='' OR p1.stop>'" . ($time + 60) . "') AND p1.published='1'" : "") .
			(empty($arrPages) ? " ORDER BY p1.sorting" : " ORDER BY FIELD(p1.id," . implode(',', array_map('intval', $arrPages)) . ")"))
			->execute($intPid);

		if ($objSubpages->numRows < 1)
		{
			return null;
		}

		return static::createCollectionFromDbResult($objSubpages, 'tl_page');
	}
}