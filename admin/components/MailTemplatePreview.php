<?php
/**
 * This file is part of Helios Calendar, it's use is governed by the Helios Calendar Software License Agreement.
 *
 * @author Refresh Web Development, LLC.
 * @link http://www.refreshmy.com
 * @copyright (C) 2004-2011 Refresh Web Development
 * @license http://www.helioscalendar.com/license.html
 * @package Helios Calendar
 */
	$isAction = 1;
	include('../includes/include.php');
	checkIt(1);
	
	$pID = (isset($_GET['pID']) && is_numeric($_GET['pID'])) ? cIn($_GET['pID']) : 0;

	$result = doQuery("SELECT TemplateSource FROM " . HC_TblPrefix . "templatesnews WHERE PkID = " . cIn($_GET['pID']));
	echo (hasRows($result)) ? mysql_result($result,0,0) : $hc_lang_news['InvalidTemplate'];
?>