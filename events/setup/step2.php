<?php
/*
	Helios Calendar - Professional Event Management System
	Copyright � 2005 Refresh Web Development [http://www.refreshwebdev.com]
	
	Developed By: Chris Carlevato <chris@refreshwebdev.com>
	
	For the most recent version, visit the Helios Calendar website:
	[http://www.helioscalendar.com]
	
	License Information is found in docs/license.html
	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	|	Modifying Helios Setup files is not permitted and violates the Helios EUL.	|
	|	Please do not edit this or any of the setup files							|
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/
	if(isset($_POST['agree']) && $_POST['agree'] == 'on'){
		$_SESSION['license'] = true;
	}//end if
	
	if(!isset($_SESSION['license'])){?>
		<a href="<?echo CalRoot;?>/setup/" class="main">Click here to being Helios setup.</a>
<?	} else {	?>
		Before continueing here's what you should do.<br>
		(Or setup will not be successful)
		<br><br>
		
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<tr>
					<td class="eventMain" valign="top"><b>1)</b>&nbsp;</td>
					<td class="eventMain">
						Edit the globals.php file to contain your required database &amp; site information.
						<br>
						[ <i>Helios_Directory</i>/includes/globals.php ] current settings:
						<br><br>
						<table cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td rowspan="17" width="25">&nbsp;</td>
								<td width="120" class="eventMain"><b>Table Prefix:</b></td>
								<td class="eventMain"><?echo HC_TblPrefix;?></td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>DB Host:</b></td>
								<td class="eventMain"><?echo DATABASE_HOST;?></td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>Database:</td>
								<td class="eventMain"><?echo DATABASE_NAME;?></td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>DB User:</td>
								<td class="eventMain"><?echo DATABASE_USER;?></td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>DB Password:</b></td>
								<td class="eventMain">
								<?	$disPass = "";
									for($i=0; $i < strlen(DATABASE_PASS); $i++){
										$disPass .= "x";
									}//end for
									echo $disPass;?>
								</td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>Helios Root:</b></td>
								<td class="eventMain"><?echo CalRoot;?>/</td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>Helios Admin:</b></td>
								<td class="eventMain"><?echo CalAdminRoot;?>/</td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>Mobile Root:</b></td>
								<td class="eventMain"><?echo MobileRoot;?>/</td>
							</tr>
							<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="7" alt="" border="0"></td></tr>
							<tr>
								<td class="eventMain"><b>Admin Contact:</b></td>
								<td class="eventMain"><a href="mailto:<?echo CalAdminEmail;?>" class="main"><?echo CalAdmin;?></a></td>
							</tr>
						</table>
						<br>
						If any of this information is incorrect update the globals.php before continuing.<br><br>
						<b>Please make sure</b> that the database account you are using has create and delete permissions.
					</td>
					<td class="eventMain" width="100" align="center" valign="top">
					<?	
						$dbconnection = mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);
						mysql_select_db(DATABASE_NAME,$dbconnection);
						
						$result = mysql_query("SELECT version()");
						if(hasRows($result)){
							$_SESSION['mysqlversion'] = mysql_result($result,0,0);
					?>		<span style="color: green;font-weight:bold;">DB Connection Ready</span>	<?
						} else {
							$stop = true;	?>
							<span style="color: crimson;font-weight:bold;">No DB Connection</span>
					<?	}//end if	?>
					</td>
				</tr>
			</tr>
			<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="20" alt="" border="0"></td></tr>
			<tr>
				<tr>
					<td class="eventMain" valign="top"><b>2)</b>&nbsp;</td>
					<td class="eventMain">
						CHMOD 777 the WURFL log file.
						<br>
						[ <i>Helios_Directory</i>/includes/wurfl/data/wurfl.log ]
					</td>
					<td class="eventMain" width="100" align="center" valign="top">
					<?	if(is_writable("../includes/wurfl/data/wurfl.log")){
					?>		<span style="color: green;font-weight:bold;">Log File Ready</span>	<?
						} else {	
							$stop = true;	?>
							<span style="color: crimson;font-weight:bold;">Not Completed</span>
					<?	}//end if	?>
					</td>
				</tr>
			</tr>
			<tr><td colspan="3"><img src="<?echo CalRoot;?>/images/spacer.gif" width="1" height="20" alt="" border="0"></td></tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td class="eventMain" align="center">
				<?	if(isset($stop)){?>
					<input type="button" name="refresh" id="refresh" onClick="window.location.href='<?echo CalRoot;?>/setup/index.php?step=2';return false;" value="Refresh" class="eventButton">
				<?	} else {	?>
					<input type="button" name="refresh" id="refresh" onClick="window.location.href='<?echo CalRoot;?>/setup/?step=3';return false;" value="Continue" class="eventButton">
				<?	}//end if	?>
				</td>
			</tr>
		</table>
<?	}//end if?>