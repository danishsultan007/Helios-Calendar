<?php
/**
 * This file is part of Helios Calendar, it's use is governed by the Helios Calendar Software License Agreement.
 *
 * @author Refresh Web Development LLC
 * @link http://www.refreshmy.com
 * @copyright (C) 2004-2012 Refresh Web Development
 * @license http://www.helioscalendar.com/license.html
 * @package Helios Calendar
 */
	define('isHC',true);
	define('isAction',true);
	include_once('../loader.php');
	include_once(HCLANG.'/public/rss.php');
	
	if($hc_cfg[106] == 0)
		go_home();
	
	$sID = (isset($_GET['s']) && is_numeric($_GET['s'])) ? cIn($_GET['s']) : 0;
	$feedName = $hc_lang_rss['FeedLabel' . $sID];
	$tzRSS = str_replace(':','',HCTZ);
	
	if(!file_exists(HCPATH.'/cache/rss'.SYSDATE.'_' . $sID)){
		$files = glob(HCPATH.'/cache/rss*_' . $sID);
		if(COUNT($files) > 0 && $files[0] != ''){
			foreach($files as $filename){
				unlink($filename);
			}
		}
		
		$bQuery = ($sID == 3) ? " AND e.IsBillboard = 1 " : '';
		
		$query = "	SELECT DISTINCT e.PkID, e.Title, e.Description, e.StartDate, e.StartTime, e.SeriesID, e.PublishDate, (e.Views / (DATEDIFF('".SYSDATE."', e.PublishDate)+1)) as Ave
					FROM " . HC_TblPrefix . "events e
					WHERE IsActive = 1 AND IsApproved = 1 AND StartDate >= '" . cIn(SYSDATE) . "' ".$bQuery;
		$query .= ($hc_cfg[33] == 0) ? " AND e.SeriesID IS NULL 
					UNION 
					SELECT DISTINCT e.PkID, e.Title, e.Description, e.StartDate, e.StartTime, e.SeriesID, e.PublishDate, (e.Views / (DATEDIFF('".SYSDATE."', e.PublishDate)+1)) as Ave
					FROM " . HC_TblPrefix . "events e
						LEFT JOIN " . HC_TblPrefix . "events e2 ON (e.SeriesID = e2.SeriesID AND e2.StartDate > '".SYSDATE."' AND e.StartDate > e2.StartDate)
					WHERE
						e2.StartDate IS NULL AND 
						e.IsActive = 1 AND e.IsApproved = 1 AND e.StartDate >= '".SYSDATE."'  AND e.SeriesID IS NOT NULL ".$bQuery."
					GROUP BY e.SeriesID, e.PkID, e.Title, e.Description, e.StartDate, e.StartTime, e.SeriesID, e.Views, e.PublishDate" : '';
		
		switch($sID){
			case 0:
				$query .= " ORDER BY StartDate, StartTime LIMIT ".$hc_cfg[2];
				break;
			case 1:
				$query .= " ORDER BY PublishDate DESC, StartDate, StartTime LIMIT ".$hc_cfg[2];
				break;
			case 2:
				$query .= " ORDER BY Ave DESC, StartDate, StartTime LIMIT ".$hc_cfg[2];
				break;
			case 3:
				$query .= " ORDER BY StartDate, StartTime LIMIT ".$hc_cfg[2];
				break;
		}
		
		ob_start();
		$fp = fopen('../cache/rss'.SYSDATE.'_' . $sID, 'w');
		echo '
<!-- Generated by Helios Calendar '.$hc_cfg[49].' on '.SYSDATE.' '.SYSTIME.' -->
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
	<link>'.CalRoot.'/</link>
	<atom:link href="'.CalRoot.'/rss/?sID='.$sID.'" rel="self" type="application/rss+xml" />
	<copyright>Copyright 2004-'.date("Y").' Refresh Web Development LLC</copyright>
	<generator>http://www.HeliosCalendar.com</generator>
	<docs>'.CalRoot.'&#47;index.php&#63;com=tools</docs>
	<description>'.$hc_lang_rss['Upcoming'].'</description>';

		$result = doQuery($query);
		if(hasRows($result)){
			echo '
	<title>'.$feedName.' - '.CalName.'</title>';
		$cnt = 0;
			while($row = mysql_fetch_row($result)){
				$description = ($hc_cfg[107] > 0) ? clean_truncate($row[2],$hc_cfg[107]) : $row[2];
				$comment = ($hc_cfg[25] != '') ? '<comments><![CDATA['.CalRoot.'/index.php?com=detail&eID='.$row[0].'#disqus_thread'.']]></comments>' : '';
				echo '
	<item>
		<title>'.cleanXMLChars(stampToDate(cOut($row[3]), $hc_cfg[24]))." - ".cleanXMLChars(cOut($row[1])).'</title>
		<link><![CDATA['.CalRoot.'/index.php?com=detail&eID='.$row[0].']]></link>
		<description>'.cleanXMLChars(cOut($description)).'</description>
		'.$comment.'
		<guid>'.CalRoot.'/index.php&#63;com=detail&amp;eID='.$row[0].'</guid>
		<pubDate>'.cleanXMLChars(stampToDate($row[3].' '.$row[4], "%a, %d %b %Y %H:%M:%S").' '.$tzRSS).'</pubDate>
	</item>';
				++$cnt;
			}
		} else {
			echo '
	<title>'.$hc_lang_rss['RSSSorry'].'</title>
	<item>
		<title>'.$hc_lang_rss['RSSNoEvents'].'</title>
		<link>'.CalRoot.'/</link>
		<description>'.$hc_lang_rss['RSSNoLink'].'</description>
		<guid>' . CalRoot . '/</guid>
	</item>';
		}
		echo '
</channel>
</rss>';

		fwrite($fp, ob_get_contents());
		fclose($fp);
		ob_end_clean();
	}
	header('Content-Type:application/rss+xml; charset=' . $hc_lang_config['CharSet']);
	echo '<?xml version="1.0" encoding="'.$hc_lang_config['CharSet'].'"?>';
	include(HCPATH.'/cache/rss'.SYSDATE.'_'.$sID);
?>