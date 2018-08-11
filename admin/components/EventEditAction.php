<?php
/*
	Helios Calendar - Professional Event Management System
	Copyright � 2005 Refresh Web Development [http://www.refreshwebdev.com]
	
	Developed By: Chris Carlevato <chris@refreshwebdev.com>
	
	For the most recent version, visit the Helios Calendar website:
	[http://www.helioscalendar.com]
	
	License Information is found in docs/license.html
*/
	
	include('../../events/includes/include.php');
	hookDB();
	
	$eID = $_POST['eID'];
	$eventStatus = $_POST['eventStatus'];
	$eventBillboard = $_POST['eventBillboard'];
	$eventTitle = $_POST['eventTitle'];
	$eventDesc = $_POST['eventDescription'];
	$eventDate = $_POST['eventDate'];
	$locName = $_POST['locName'];
	$locAddress = $_POST['locAddress'];
	$locAddress2 = $_POST['locAddress2'];
	$locCity = $_POST['locCity'];
	$locState = $_POST['locState'];
	$locZip = $_POST['locZip'];
	$contactName = $_POST['contactName'];
	$contactEmail = $_POST['contactEmail'];
	$contactPhone = $_POST['contactPhone'];
	$contactURL = $_POST['contactURL'];
	
	if( !ereg("^http://*", $contactURL, $regs) ){
	   $contactURL = "http://" . $contactURL;
	}//end if
	
	$allowRegistration = $_POST['eventRegistration'];
	
	if($allowRegistration == 1){
		$maxRegistration = $_POST['eventRegAvailable'];
	} else {
		$maxRegistration = "null";
	}//end if
	
	if(!isset($_POST['overridetime'])){
		$startTimeHour = $_POST['startTimeHour'];
		$startTimeMins = $_POST['startTimeMins'];
		
		if($_POST['startTimeAMPM'] == 'PM' AND $startTimeHour != 12){
			$startTimeHour = $startTimeHour + 12;
		}//end if
		
		if($_POST['startTimeAMPM'] == 'AM' AND $startTimeHour == 12){
			$startTimeHour = $startTimeHour + 12;
		}//end if
		
		if(!isset($_POST['ignoreendtime'])){
			$endTimeHour = $_POST['endTimeHour'];
			$endTimeMins = $_POST['endTimeMins'];
			
			if($_POST['endTimeAMPM'] == 'PM' AND $endTimeHour != 12){
				$endTimeHour = $endTimeHour + 12;
			}//end if
			
			if($_POST['endTimeAMPM'] == 'AM' AND $endTimeHour == 12){
				$endTimeHour = $endTimeHour + 12;
			}//end if
			
			$endTime = "'" . cIn($endTimeHour) . ":" . cIn($endTimeMins) . ":00'";
		} else {
			$endTime = "NULL";
		}//end if
		
		$tbd = 0;
		$startTime = "'" . cIn($startTimeHour) . ":" . cIn($startTimeMins) . ":00'";
		
	} else {
		$startTime = "NULL";
		$endTime = "NULL";
		if($_POST['specialtime'] == "allday"){
			$tbd = 1;
		} else {
			$tbd = 2;
		}//end if
		
	}//end if
		$query = "UPDATE " . HC_TblPrefix . "events
					SET Title = '" . cIn($eventTitle) . "',
						LocationName = '" . cIn($locName) . "',
						LocationAddress = '" . cIn($locAddress) . "',
						LocationAddress2 = '" . cIn($locAddress2) . "',
						LocationCity = '" . cIn($locCity) . "',
						LocationState = '" . cIn($locState) . "',
						LocationZip = '" . cIn($locZip) . "',
						Description = '" . cIn($eventDesc) . "',
						StartDate = '" . cIn(dateToMySQL($eventDate, "/")) . "',
						StartTime = " . $startTime . ",
						TBD = " . cIn($tbd) . ",
						EndTime = " . $endTime . ",
						ContactName = '" . cIn($contactName) . "',
						ContactEmail = '" . cIn($contactEmail) . "',
						ContactPhone = '" . cIn($contactPhone) . "',
						IsApproved = '" . cIn($eventStatus) . "',
						IsBillboard = '" . cIn($eventBillboard) . "',
						ContactURL = '" . cIn($contactURL) . "',
						AllowRegister = '" . cIn($allowRegistration) . "',
						SpacesAvailable = " . cIn($maxRegistration);
						
		if($_POST['prevStatus'] == 2 && $eventStatus == 1){
			$query = $query . ", PublishDate = NOW()";
		}//end if
		
		$query = $query . " WHERE PkID = " . $eID;
		doQuery($query);
		
		$result = doQuery("DELETE FROM " . HC_TblPrefix . "eventcategories WHERE EventID = " . cIn($eID));
	
		if(isset($_POST['catID'])){
			$catID = $_POST['catID'];
				foreach ($catID as $val){
					doQuery("INSERT INTO " . HC_TblPrefix . "eventcategories(EventID, CategoryID) VALUES('" . cIn($eID) . "', '" . cIn($val) . "')");
				}//end while
		}//end if
		
	
	header("Location: " . CalAdminRoot . "/index.php?com=eventedit&eID=" . $eID  . "&msg=1");
?>

