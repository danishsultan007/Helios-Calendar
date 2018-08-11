<?php
/*
	Helios Calendar - Professional Event Management System
	Copyright � 2007 Refresh Web Development [http://www.refreshwebdev.com]
	
	Developed By: Chris Carlevato <chris@refreshwebdev.com>
	
	For the most recent version, visit the Helios Calendar website:
	[http://www.helioscalendar.com]
	
	License Information is found in docs/license.html
	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	|	Please do not edit this or any of the setup files							|
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/
		if(!isset($_SESSION['license']) && !isset($_SESSION['valid'])){?>
			<br /><a href="<?php echo CalRoot;?>/setup/" class="eventMain">Click here to begin Helios setup.</a>
<?php	} else {
			if(!isset($_POST['firstname'])){?>
				<script language="JavaScript">
				//<!--
				function checkEmail(obj) {
					if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(obj.value)){
						return 0;
					} else {
						return 1;
					}//end if
				}//end chkEmail
				
				function chkFrm(){
				dirty = 0;
				warn = "Account cannot be created because of the following reasons:\n";
					
					if(document.frm.firstname.value == ''){
						dirty = 1;
						warn = warn + '\n*First Name is Required';
					}//end if
					
					if(document.frm.lastname.value == ''){
						dirty = 1;
						warn = warn + '\n*Last Name is Required';
					}//end if
					
					if(document.frm.email.value == ''){
						dirty = 1;
						warn = warn + '\n*Email is Required';
					}//end if
					
					if(document.frm.email.value != '' && checkEmail(document.frm.email) == 1){
						dirty = 1;
						warn = warn + '\n*Email Format is Invalid';
					}//end if
					
					if(document.frm.password.value == ''){
						dirty = 1;
						warn = warn + '\n*Password is Required';
					}//end if
					
					if(dirty > 0){
						alert(warn + '\n\nPlease make the required changes and try again.');
						return false;
					} else {
						return true;
					}//end if
					
				}//end chkFrm
				//-->
				</script>
				<br />
				Complete the form below with the information for your administration console account.
				<br /><br />
				When setup is complete you will use this account to login to your Helios admin console, so keep it
				for your records.
				<br /><br />
				
				<form name="frm" id="frm" method="post" action="<?php echo CalRoot;?>/setup/index.php?step=4" onsubmit="return chkFrm();">
				<fieldset>
					<legend>Admin Account Settings</legend>
					<div class="frmOpt">
						<label for="firstname">First Name:</label>
						<input tabindex="1" size="20" maxlength="50" type="text" name="firstname" id="firstname" value="" class="setupText" />
					</div>
					<div class="frmOpt">
						<label for="lastname">Last Name:</label>
						<input tabindex="2" size="20" maxlength="50" type="text" name="lastname" id="lastname" value="" class="setupText" />
					</div>
					<div class="frmOpt">
						<label for="email">Email:</label>
						<input tabindex="3" size="30" maxlength="100" type="text" name="email" id="email" value="" class="setupText" />&nbsp;<?php appInstructionsIcon("Admin Email Address", "This will be used as the username for the account."); ?>
					</div>
					<div class="frmOpt">
						<label for="password">Password:</label>
						<input tabindex="4" size="15" maxlength="15" type="password" name="password" id="password" value="" class="setupText" />
					</div>
				</fieldset>
				<br />
				<div align="right"><input tabindex="5" type="submit" name="submit" id="submit" value="Setup Database" class="eventButton" /></div>
				</form>
	<?php	} else {	
				echo "<br />";
				eval(base64_decode('LypJZiB5b3UgY2FuIHJlYWQgdGhpcyB5b3UgaGF2ZSB2aW9sYXRlZCB0aGUgdGVybXMgb2YgdGhlIEhlbGlvcyBDYWxlbmRhciBFVUwuKi8/Pg0KCQkJU2V0dXAgd2lsbCBub3cgYXR0ZW1wdCB0byBjcmVhdGUgeW91ciBIZWxpb3MgQ2FsZW5kYXIgZGF0YWJhc2UuLi48YnIgLz48YnIgLz4NCgk8P3BocAkkZGJjb25uZWN0aW9uID0gbXlzcWxfY29ubmVjdChEQVRBQkFTRV9IT1NULCBEQVRBQkFTRV9VU0VSLCBEQVRBQkFTRV9QQVNTKTsNCgkJCQ0KCQkJJHN0b3AgPSAwOw0KCQkJbXlzcWxfc2VsZWN0X2RiKERBVEFCQVNFX05BTUUsJGRiY29ubmVjdGlvbik7DQoJCQllY2hvICJDaGVja2luZyA8aT4iIC4gREFUQUJBU0VfTkFNRSAuICI8L2k+IGRhdGFiYXNlLi4uIjsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiQ1JFQVRFIERBVEFCQVNFIElGIE5PVCBFWElTVFMgIiAuIERBVEFCQVNFX05BTUUpOw0KCQkJaWYobXlzcWxfYWZmZWN0ZWRfcm93cygpID4gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIkNyZWF0ZWQ8YnIgLz4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJBbHJlYWR5IEV4aXN0czxiciAvPiI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJDQoJCQllY2hvICI8YnIgLz5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gImFkbWluPC9pPiB0YWJsZS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW4gKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxGaXJzdE5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLExhc3ROYW1lIHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxFbWFpbCB2YXJjaGFyKDEwMCkgZGVmYXVsdCBOVUxMLFBhc3N3cmQgdmFyY2hhcigzMikgZGVmYXVsdCBOVUxMLElzQWN0aXZlIHRpbnlpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMScsTG9naW5DbnQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxMYXN0TG9naW4gZGF0ZXRpbWUgZGVmYXVsdCBOVUxMLFN1cGVyQWRtaW4gdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxTaG93SW5zdHJ1Y3Rpb25zIHRpbnlpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMScsUENLZXkgdmFyY2hhcigzMikgZGVmYXVsdCBOVUxMLFBSSU1BUlkgS0VZIChQa0lEKSxVTklRVUUgS0VZIFBrSUQgKFBrSUQpKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTSE9XIFRBQkxFIFNUQVRVUyBGUk9NICIgLiBEQVRBQkFTRV9OQU1FIC4gIiBMSUtFICciIC4gSENfVGJsUHJlZml4IC4gImFkbWluJyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCWVjaG8gIjxiciAvPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO0NyZWF0aW5nIEFkbWluIEFjY291bnQuLi4iOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW4gVkFMVUVTKCcxJywnIiAuICRfUE9TVFsnZmlyc3RuYW1lJ10gLiAiJywnIiAuICRfUE9TVFsnbGFzdG5hbWUnXSAuICInLCciIC4gJF9QT1NUWydlbWFpbCddIC4gIicsJyIgLiBtZDUobWQ1KCRfUE9TVFsncGFzc3dvcmQnXSkgLiAkX1BPU1RbJ2VtYWlsJ10pIC4gIicsJzEnLCAnMCcsIE5VTEwsICcwJywgJzEnLCBOVUxMKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTRUxFQ1QgKiBGUk9NICIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW4iKTsNCgkJCWlmKG15c3FsX251bV9yb3dzKCRyZXN1bHQpID09IDApew0KCQkJCSRzdG9wID0gMTsNCgkJCQllY2hvICI8Yj5GYWlsZWQ8L2I+IjsNCgkJCX0gZWxzZSB7DQoJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJfS8vZW5kIGlmDQoJCQkNCgkJCQ0KCQkJZWNobyAiPGJyIC8+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJhZG1pbmxvZ2luaGlzdG9yeTwvaT4gdGFibGUuLi4iOw0KCQkJbXlzcWxfcXVlcnkoIkNSRUFURSBUQUJMRSAiIC4gSENfVGJsUHJlZml4IC4gImFkbWlubG9naW5oaXN0b3J5IChQa0lEIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgYXV0b19pbmNyZW1lbnQsQWRtaW5JRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxJUCB2YXJjaGFyKDE2KSBkZWZhdWx0IE5VTEwsQ2xpZW50IExPTkdURVhUIGRlZmF1bHQgTlVMTCxMb2dpblRpbWUgZGF0ZXRpbWUgZGVmYXVsdCBOVUxMLFBSSU1BUlkgS0VZIChQa0lEKSwgVU5JUVVFIEtFWSBQa0lEIChQa0lEKSk7Iik7DQoJCQkkcmVzdWx0ID0gbXlzcWxfcXVlcnkoIlNIT1cgVEFCTEUgU1RBVFVTIEZST00gIiAuIERBVEFCQVNFX05BTUUgLiAiIExJS0UgJyIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW5sb2dpbmhpc3RvcnknIik7DQoJCQlpZihteXNxbF9udW1fcm93cygkcmVzdWx0KSA9PSAwKXsNCgkJCQkkc3RvcCA9IDE7DQoJCQkJZWNobyAiPGI+RmFpbGVkPC9iPiI7DQoJCQl9IGVsc2Ugew0KCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCX0vL2VuZCBpZg0KCQkJDQoJCQkNCgkJCWVjaG8gIjxiciAvPkNyZWF0aW5nIDxpPiIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW5wZXJtaXNzaW9uczwvaT4gdGFibGUuLi4iOw0KCQkJbXlzcWxfcXVlcnkoIkNSRUFURSBUQUJMRSAiIC4gSENfVGJsUHJlZml4IC4gImFkbWlucGVybWlzc2lvbnMgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxFdmVudEVkaXQgaW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLEV2ZW50UGVuZGluZyBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsRXZlbnRDYXRlZ29yeSBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsVXNlckVkaXQgaW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLEFkbWluRWRpdCBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsTmV3c2xldHRlciBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsU2V0dGluZ3MgaW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLCBUb29scyBpbnQoMykgVU5TSUdORUQgREVGQVVMVCBcIjBcIiBOT1QgTlVMTCwgUmVwb3J0cyBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsQWRtaW5JRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxJc0FjdGl2ZSBpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsUFJJTUFSWSBLRVkgIChQa0lEKSkiKTsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0hPVyBUQUJMRSBTVEFUVVMgRlJPTSAiIC4gREFUQUJBU0VfTkFNRSAuICIgTElLRSAnIiAuIEhDX1RibFByZWZpeCAuICJhZG1pbnBlcm1pc3Npb25zJyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCWVjaG8gIjxiciAvPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO1NldHRpbmcgQWRtaW4gUGVybWlzc2lvbi4uLiI7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJhZG1pbnBlcm1pc3Npb25zIFZBTFVFUygnMScsICcxJywgJzEnLCAnMScsICcxJywgJzEnLCAnMScsICcxJywgJzEnLCAnMScsICcxJywgJzEnKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTRUxFQ1QgKiBGUk9NICIgLiBIQ19UYmxQcmVmaXggLiAiYWRtaW5wZXJtaXNzaW9ucyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJDQoJCQllY2hvICI8YnIgLz5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gImNhdGVnb3JpZXM8L2k+IHRhYmxlLi4uIjsNCgkJCW15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgIiAuIEhDX1RibFByZWZpeCAuICJjYXRlZ29yaWVzIChQa0lEIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgYXV0b19pbmNyZW1lbnQsQ2F0ZWdvcnlOYW1lIHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxQYXJlbnRJRCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLElzQWN0aXZlIHRpbnlpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMScsUGF0aCB2YXJjaGFyKDEwMCkgTk9UIE5VTEwgZGVmYXVsdCAnLycsTGV2ZWwgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxQUklNQVJZIEtFWSAoUGtJRCksIFVOSVFVRSBLRVkgUGtJRCAoUGtJRCkpIik7DQoJCQkkcmVzdWx0ID0gbXlzcWxfcXVlcnkoIlNIT1cgVEFCTEUgU1RBVFVTIEZST00gIiAuIERBVEFCQVNFX05BTUUgLiAiIExJS0UgJyIgLiBIQ19UYmxQcmVmaXggLiAiY2F0ZWdvcmllcyciKTsNCgkJCWlmKG15c3FsX251bV9yb3dzKCRyZXN1bHQpID09IDApew0KCQkJCSRzdG9wID0gMTsNCgkJCQllY2hvICI8Yj5GYWlsZWQ8L2I+IjsNCgkJCX0gZWxzZSB7DQoJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJfS8vZW5kIGlmDQoJCQllY2hvICI8YnIgLz4mbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDtBZGRpbmcgRGVmYXVsdCBDYXRlZ29yeS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJjYXRlZ29yaWVzIFZBTFVFUygnMScsICdFdmVudHMnLCAnMCcsICcxJywgJy8nLCAnMCcpIik7DQoJCQkkcmVzdWx0ID0gbXlzcWxfcXVlcnkoIlNFTEVDVCAqIEZST00gIiAuIEhDX1RibFByZWZpeCAuICJjYXRlZ29yaWVzIik7DQoJCQlpZihteXNxbF9udW1fcm93cygkcmVzdWx0KSA9PSAwKXsNCgkJCQkkc3RvcCA9IDE7DQoJCQkJZWNobyAiPGI+RmFpbGVkPC9iPiI7DQoJCQl9IGVsc2Ugew0KCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCX0vL2VuZCBpZg0KCQkJDQoJCQkNCgkJCWVjaG8gIjxiciAvPkNyZWF0aW5nIDxpPiIgLiBIQ19UYmxQcmVmaXggLiAiZXZlbnRjYXRlZ29yaWVzPC9pPiB0YWJsZS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAiZXZlbnRjYXRlZ29yaWVzIChFdmVudElEIGludCgxMSkgdW5zaWduZWQgZGVmYXVsdCBOVUxMLENhdGVnb3J5SUQgaW50KDExKSB1bnNpZ25lZCBkZWZhdWx0IE5VTEwsS0VZIEV2ZW50SUQgKEV2ZW50SUQpLEtFWSBDYXRlZ29yeUlEIChDYXRlZ29yeUlEKSkiKTsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0hPVyBUQUJMRSBTVEFUVVMgRlJPTSAiIC4gREFUQUJBU0VfTkFNRSAuICIgTElLRSAnIiAuIEhDX1RibFByZWZpeCAuICJldmVudGNhdGVnb3JpZXMnIik7DQoJCQlpZihteXNxbF9udW1fcm93cygkcmVzdWx0KSA9PSAwKXsNCgkJCQkkc3RvcCA9IDE7DQoJCQkJZWNobyAiPGI+RmFpbGVkPC9iPiI7DQoJCQl9IGVsc2Ugew0KCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCX0vL2VuZCBpZg0KCQkJZWNobyAiPGJyIC8+Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Q3JlYXRpbmcgRGVmYXVsdCBFdmVudC9DYXRlZ29yeSBQYWlyaW5nLi4uIjsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gImV2ZW50Y2F0ZWdvcmllcyBWQUxVRVMoCScxJywgJzEnKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTRUxFQ1QgKiBGUk9NICIgLiBIQ19UYmxQcmVmaXggLiAiZXZlbnRjYXRlZ29yaWVzIik7DQoJCQlpZihteXNxbF9udW1fcm93cygkcmVzdWx0KSA9PSAwKXsNCgkJCQkkc3RvcCA9IDE7DQoJCQkJZWNobyAiPGI+RmFpbGVkPC9iPiI7DQoJCQl9IGVsc2Ugew0KCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCX0vL2VuZCBpZg0KCQkJDQoJCQkNCgkJCWVjaG8gIjxiciAvPkNyZWF0aW5nIDxpPiIgLiBIQ19UYmxQcmVmaXggLiAiZXZlbnRzPC9pPiB0YWJsZS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAiZXZlbnRzIChQa0lEIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgYXV0b19pbmNyZW1lbnQsVGl0bGUgdmFyY2hhcigxNTApIGRlZmF1bHQgTlVMTCxMb2NhdGlvbk5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLExvY2F0aW9uQWRkcmVzcyB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsTG9jYXRpb25BZGRyZXNzMiB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsTG9jYXRpb25DaXR5IHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxMb2NhdGlvblN0YXRlIHZhcmNoYXIoMzApIGRlZmF1bHQgTlVMTCxMb2NhdGlvblppcCB2YXJjaGFyKDExKSBkZWZhdWx0IE5VTEwsRGVzY3JpcHRpb24gbWVkaXVtdGV4dCxTdGFydERhdGUgZGF0ZSBkZWZhdWx0IE5VTEwsU3RhcnRUaW1lIHRpbWUgZGVmYXVsdCBOVUxMLFRCRCBpbnQoMykgZGVmYXVsdCBOVUxMLEVuZFRpbWUgdGltZSBkZWZhdWx0IE5VTEwsQ29udGFjdE5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLENvbnRhY3RFbWFpbCB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsQ29udGFjdFBob25lIHZhcmNoYXIoMjUpIGRlZmF1bHQgTlVMTCxJc0FjdGl2ZSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzEnLElzQXBwcm92ZWQgdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxJc0JpbGxib2FyZCB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFNlcmllc0lEIHZhcmNoYXIoMjApIGRlZmF1bHQgTlVMTCxTdWJtaXR0ZWRCeU5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLFN1Ym1pdHRlZEJ5RW1haWwgdmFyY2hhcig3NSkgZGVmYXVsdCBOVUxMLFN1Ym1pdHRlZEF0IGRhdGV0aW1lIGRlZmF1bHQgTlVMTCxBbGVydFNlbnQgdGlueWludCgzKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxDb250YWN0VVJMIHZhcmNoYXIoMTAwKSBkZWZhdWx0IE5VTEwsQWxsb3dSZWdpc3RlciB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFNwYWNlc0F2YWlsYWJsZSBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFB1Ymxpc2hEYXRlIGRhdGV0aW1lIGRlZmF1bHQgTlVMTCxWaWV3cyBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLE1lc3NhZ2UgbG9uZ3RleHQsRGlyZWN0aW9ucyBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLERvd25sb2FkcyBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLEVtYWlsVG9GcmllbmQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxVUkxDbGlja3MgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJyxNVmlld3MgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBkZWZhdWx0ICcwJywgTG9jSUQgSU5UKDExKSAgVU5TSUdORUQgREVGQVVMVCBcIjBcIiwgQ29zdCBWQVJDSEFSKDUwKSwgTG9jQ291bnRyeSBWQVJDSEFSKDUwKSwgUFJJTUFSWSBLRVkgKFBrSUQpLCBVTklRVUUgS0VZIFBrSUQgKFBrSUQpKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTSE9XIFRBQkxFIFNUQVRVUyBGUk9NICIgLiBEQVRBQkFTRV9OQU1FIC4gIiBMSUtFICciIC4gSENfVGJsUHJlZml4IC4gImV2ZW50cyciKTsNCgkJCWlmKG15c3FsX251bV9yb3dzKCRyZXN1bHQpID09IDApew0KCQkJCSRzdG9wID0gMTsNCgkJCQllY2hvICI8Yj5GYWlsZWQ8L2I+IjsNCgkJCX0gZWxzZSB7DQoJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJfS8vZW5kIGlmDQoJCQllY2hvICI8YnIgLz4mbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDtDcmVhdGluZyBEZWZhdWx0IEV2ZW50Li4uIjsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gImV2ZW50cyBWQUxVRVMoJzEnLCciIC4gQ2FsTmFtZSAuICIgT3BlbnMnLE5VTEwsTlVMTCxOVUxMLE5VTEwsTlVMTCxOVUxMLCcgV2VsY29tZSB0byB5b3VyIG5ldyBIZWxpb3MgQ2FsZW5kYXIgcG93ZXJlZCBldmVudCB3ZWJzaXRlLjxiciAvPlRoZSBmb2xsb3dpbmcgbGlua3Mgd2lsbCBoZWxwIHlvdSBhcyB5b3UgdXNlIEhlbGlvcyBDYWxlbmRhcjo8YnIgLz48YnIgLz48YSBocmVmPVwiaHR0cDovL3d3dy5oZWxpb3NjYWxlbmRhci5jb21cIiBjbGFzcz1cImV2ZW50TWFpblwiIHRhcmdldD1cIm5ld1wiPkhlbGlvcyBDYWxlbmRhciBXZWJzaXRlPC9hPjxiciAvPjxhIGhyZWY9XCJodHRwOi8vd3d3LmhlbGlvc2NhbGVuZGFyLmNvbS9kb2N1bWVudGF0aW9uL1wiIGNsYXNzPVwiZXZlbnRNYWluXCIgdGFyZ2V0PVwibmV3XCI+SGVsaW9zIENhbGVuZGFyIERvY3VtZW50YXRpb248L2E+PGJyIC8+PGEgaHJlZj1cImh0dHA6Ly93d3cuaGVsaW9zY2FsZW5kYXIuY29tL2ZvcnVtL1wiIGNsYXNzPVwiZXZlbnRNYWluXCIgdGFyZ2V0PVwibmV3XCI+SGVsaW9zIENhbGVuZGFyIEZvcnVtPC9hPjxiciAvPjxiciAvPlRoYW5rIHlvdSBmb3IgY2hvb3NpbmcgSGVsaW9zLicsJyIgLiBkYXRlKCJZLW0tZCIpIC4gIicsTlVMTCwnMScsTlVMTCxOVUxMLE5VTEwsTlVMTCwnMScsJzEnLCcxJyxOVUxMLE5VTEwsTlVMTCxOVUxMLCcwJywnIiAuIENhbFJvb3QgLiAiJywnMCcsJzAnLCciIC4gZGF0ZSgiWS1tLWQiKSAuICIgMDA6MDA6MDAnLCcwJyxOVUxMLCcwJywnMCcsJzAnLCcwJywnMCcsJzEnLCBOVUxMLCBOVUxMKTsiKTsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0VMRUNUICogRlJPTSAiIC4gSENfVGJsUHJlZml4IC4gImV2ZW50cyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJZWNobyAiPGJyIC8+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJsb2NhdGlvbnM8L2k+IHRhYmxlLi4uIjsNCgkJCW15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgIiAuIEhDX1RibFByZWZpeCAuICJsb2NhdGlvbnMgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxOYW1lIHZhcmNoYXIoMTAwKSxBZGRyZXNzIHZhcmNoYXIoNzUpLEFkZHJlc3MyIHZhcmNoYXIoNzUpLENpdHkgdmFyY2hhcig1MCksU3RhdGUgdmFyY2hhcigzMCksQ291bnRyeSB2YXJjaGFyKDUwKSxaaXAgdmFyY2hhcigxNSksVVJMIHZhcmNoYXIoMTAwKSxQaG9uZSB2YXJjaGFyKDI1KSBERUZBVUxUICcwJyxFbWFpbCB2YXJjaGFyKDc1KSxEZXNjcmlwdCBsb25ndGV4dCxJc1B1YmxpYyB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIERFRkFVTFQgJzAnLElzQWN0aXZlIHRpbnlpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgREVGQVVMVCAnMCcsVVJMQ2xpY2tzIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgREVGQVVMVCAnMCcsTGF0IHZhcmNoYXIoMjUpIGRlZmF1bHQgTlVMTCxMb24gdmFyY2hhcigyNSkgZGVmYXVsdCBOVUxMLFBSSU1BUlkgS0VZIChQa0lEKSxVTklRVUUgS0VZIFBrSUQgKFBrSUQpKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTSE9XIFRBQkxFIFNUQVRVUyBGUk9NICIgLiBEQVRBQkFTRV9OQU1FIC4gIiBMSUtFICciIC4gSENfVGJsUHJlZml4IC4gImxvY2F0aW9ucyciKTsNCgkJCWlmKG15c3FsX251bV9yb3dzKCRyZXN1bHQpID09IDApew0KCQkJCSRzdG9wID0gMTsNCgkJCQllY2hvICI8Yj5GYWlsZWQ8L2I+IjsNCgkJCX0gZWxzZSB7DQoJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJfS8vZW5kIGlmDQoJCQkNCgkJCWVjaG8gIjxiciAvPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO0NyZWF0aW5nIERlZmF1bHQgTG9jYXRpb24uLi4iOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAibG9jYXRpb25zIFZBTFVFUygnMScsICdNeSBGaXJzdCBMb2NhdGlvbicsICcxIERpdmlzaW9uIEF2ZSBOb3J0aCcsIE5VTEwsICdHcmFuZCBSYXBpZHMnLCAnTUknLCAnVVNBJywgJzQ5NTAzJywgJ2h0dHA6Ly93d3cuaGVsaW9zY2FsZW5kYXIuY29tJyxOVUxMLE5VTEwsICdEb3dudG93biBHcmFuZCBSYXBpZHMsIE1pY2hpZ2FuIHRoZSBiaXJ0aHBsYWNlIG9mIEhlbGlvcy4nLCAnMScsICcxJywgJzAnLCAnNDIuOTYzMjI2JywgJy04NS42NjgxMzAnKTsiKTsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0VMRUNUICogRlJPTSAiIC4gSENfVGJsUHJlZml4IC4gImxvY2F0aW9ucyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJDQoJCQllY2hvICI8YnIgLz5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gIm5ld3NsZXR0ZXJzPC9pPiB0YWJsZS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAibmV3c2xldHRlcnMgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxUZW1wbGF0ZU5hbWUgdmFyY2hhcigyNTApIGRlZmF1bHQgTlVMTCxUZW1wbGF0ZVNvdXJjZSBsb25ndGV4dCxJc0FjdGl2ZSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFBSSU1BUlkgS0VZIChQa0lEKSwgVU5JUVVFIEtFWSBQa0lEIChQa0lEKSkiKTsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0hPVyBUQUJMRSBTVEFUVVMgRlJPTSAiIC4gREFUQUJBU0VfTkFNRSAuICIgTElLRSAnIiAuIEhDX1RibFByZWZpeCAuICJuZXdzbGV0dGVycyciKTsNCgkJCWlmKG15c3FsX251bV9yb3dzKCRyZXN1bHQpID09IDApew0KCQkJCSRzdG9wID0gMTsNCgkJCQllY2hvICI8Yj5GYWlsZWQ8L2I+IjsNCgkJCX0gZWxzZSB7DQoJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJfS8vZW5kIGlmDQoJCQkNCgkJCWVjaG8gIjxiciAvPkNyZWF0aW5nIDxpPiIgLiBIQ19UYmxQcmVmaXggLiAicmVnaXN0cmFudHM8L2k+IHRhYmxlLi4uIjsNCgkJCW15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgIiAuIEhDX1RibFByZWZpeCAuICJyZWdpc3RyYW50cyAoUGtJRCBpbnQoMTEpIHVuc2lnbmVkIE5PVCBOVUxMIGF1dG9faW5jcmVtZW50LE5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLEVtYWlsIHZhcmNoYXIoNzUpIGRlZmF1bHQgTlVMTCxQaG9uZSB2YXJjaGFyKDI1KSBkZWZhdWx0IE5VTEwsQWRkcmVzcyB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsQWRkcmVzczIgdmFyY2hhcig3NSkgZGVmYXVsdCBOVUxMLENpdHkgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLFN0YXRlIGNoYXIoMikgZGVmYXVsdCBOVUxMLFppcCB2YXJjaGFyKDExKSBkZWZhdWx0IE5VTEwsRXZlbnRJRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxJc0FjdGl2ZSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzEnLFJlZ2lzdGVyZWRBdCBkYXRldGltZSBkZWZhdWx0IE5VTEwsUFJJTUFSWSBLRVkgKFBrSUQpLCBVTklRVUUgS0VZIFBrSUQgKFBrSUQpKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTSE9XIFRBQkxFIFNUQVRVUyBGUk9NICIgLiBEQVRBQkFTRV9OQU1FIC4gIiBMSUtFICciIC4gSENfVGJsUHJlZml4IC4gInJlZ2lzdHJhbnRzJyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJZWNobyAiPGJyIC8+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJzZW5kdG9mcmllbmQ8L2k+IHRhYmxlLi4uIjsNCgkJCW15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgIiAuIEhDX1RibFByZWZpeCAuICJzZW5kdG9mcmllbmQgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxNeU5hbWUgdmFyY2hhcigxMDApIGRlZmF1bHQgTlVMTCxNeUVtYWlsIHZhcmNoYXIoMTAwKSBkZWZhdWx0IE5VTEwsUmVjaXBpZW50TmFtZSB2YXJjaGFyKDEwMCkgZGVmYXVsdCBOVUxMLFJlY2lwaWVudEVtYWlsIHZhcmNoYXIoMTAwKSBkZWZhdWx0IE5VTEwsTWVzc2FnZSBsb25ndGV4dCxFdmVudElEIGludCgxMSkgdW5zaWduZWQgZGVmYXVsdCBOVUxMLElQQWRkcmVzcyB2YXJjaGFyKDUwKSBkZWZhdWx0IE5VTEwsU2VuZERhdGUgZGF0ZXRpbWUgZGVmYXVsdCBOVUxMLFBSSU1BUlkgS0VZIChQa0lEKSwgVU5JUVVFIEtFWSBQa0lEIChQa0lEKSkiKTsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0hPVyBUQUJMRSBTVEFUVVMgRlJPTSAiIC4gREFUQUJBU0VfTkFNRSAuICIgTElLRSAnIiAuIEhDX1RibFByZWZpeCAuICJzZW5kdG9mcmllbmQnIik7DQoJCQlpZihteXNxbF9udW1fcm93cygkcmVzdWx0KSA9PSAwKXsNCgkJCQkkc3RvcCA9IDE7DQoJCQkJZWNobyAiPGI+RmFpbGVkPC9iPiI7DQoJCQl9IGVsc2Ugew0KCQkJCWVjaG8gIkZpbmlzaGVkIjsNCgkJCX0vL2VuZCBpZg0KCQkJDQokZGVmYXVsdFRlbXBsYXRlID0gIjwhRE9DVFlQRSBIVE1MIFBVQkxJQyBcIi0vL1czQy8vRFREIEhUTUwgNC4wMSBUcmFuc2l0aW9uYWwvL0VOXCI+DQoNCjxodG1sPg0KPGhlYWQ+DQo8c3R5bGU+DQp0ZHsNCglmb250LWZhbWlseTogdGltZXM7DQoJZm9udC1zaXplOiAxMXB4Ow0KCX0NCjwvc3R5bGU+DQo8L2hlYWQ+DQoNCjxib2R5Pg0KDQo8dGFibGUgY2VsbHBhZGRpbmc9XCIwXCIgY2VsbHNwYWNpbmc9XCIwXCIgYm9yZGVyPVwiMFwiIHdpZHRoPVwiNjAwXCI+DQoJPHRyPg0KCQk8dGQgd2lkdGg9XCI0MTBcIiB2YWxpZ249XCJ0b3BcIj4NCgkJSGVsbG8gW2ZpcnN0bmFtZV0gW2xhc3RuYW1lXTxicj4NCg0KCQlIZXJlIGlzIHRoZSBldmVudCBpbmZvcm1hdGlvbiB5b3UgYXJlIHJlZ2lzdGVyZWQgZm9yLg0KCQk8YnI+PGJyPg0KDQoJCVtldmVudHNdDQoJCTxicj48YnI+DQoNCgkJVmlzaXQ6IFtjYWxlbmRhcnVybF0gdG8gYnJvd3NlIGFsbCBbZXZlbnQtY291bnRdIG91ciBldmVudHMuDQoJCTxicj48YnI+DQoJCVtlZGl0cmVnaXN0cmF0aW9uXTxicj4NCgkJW3Vuc3Vic2NyaWJlXQ0KCQk8L3RkPg0KDQoJCTx0ZCB3aWR0aD1cIjE5MFwiIHZhbGlnbj1cInRvcFwiPg0KCQk8Yj5GZWF0dXJlZCBFdmVudHM8L2I+PGJyPg0KDQoJCVtiaWxsYm9hcmRdDQoJCTxicj48YnI+DQoNCgkJPGI+TW9zdCBWaWV3ZWQ8L2I+PGJyPg0KCQlbbW9zdC12aWV3ZWRdDQoNCgkJPC90ZD4NCgk8L3RyPg0KDQo8L3RhYmxlPg0KDQo8L2JvZHk+DQo8L2h0bWw+IjsNCgkJCQ0KCQkJZWNobyAiPGJyIC8+Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Q3JlYXRpbmcgRGVmYXVsdCBUZW1wbGF0ZS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJuZXdzbGV0dGVycyBWQUxVRVMoJzEnLCAnRGVmYXVsdCBUZW1wbGF0ZScsICciIC4gJGRlZmF1bHRUZW1wbGF0ZSAuICInLCAnMScpOyIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTRUxFQ1QgKiBGUk9NICIgLiBIQ19UYmxQcmVmaXggLiAibmV3c2xldHRlcnMiKTsNCgkJCWlmKG15c3FsX251bV9yb3dzKCRyZXN1bHQpID09IDApew0KCQkJCSRzdG9wID0gMTsNCgkJCQllY2hvICI8Yj5GYWlsZWQ8L2I+IjsNCgkJCX0gZWxzZSB7DQoJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJfS8vZW5kIGlmDQoJCQkNCgkJCQ0KCQkJZWNobyAiPGJyIC8+Q3JlYXRpbmcgPGk+IiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5nczwvaT4gdGFibGUuLi4iOw0KCQkJbXlzcWxfcXVlcnkoIkNSRUFURSBUQUJMRSAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIChQa0lEIGludCgxMSkgdW5zaWduZWQgTk9UIE5VTEwgYXV0b19pbmNyZW1lbnQsU2V0dGluZ1ZhbHVlIHRleHQsUFJJTUFSWSBLRVkgKFBrSUQpLCBVTklRVUUgS0VZIFBrSUQgKFBrSUQpKTsiKTsNCgkJCSRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0hPVyBUQUJMRSBTVEFUVVMgRlJPTSAiIC4gREFUQUJBU0VfTkFNRSAuICIgTElLRSAnIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyciKTsNCgkJCWlmKG15c3FsX251bV9yb3dzKCRyZXN1bHQpID09IDApew0KCQkJCSRzdG9wID0gMTsNCgkJCQllY2hvICI8Yj5GYWlsZWQ8L2I+IjsNCgkJCX0gZWxzZSB7DQoJCQkJZWNobyAiRmluaXNoZWQiOw0KCQkJfS8vZW5kIGlmDQoJCQllY2hvICI8YnIgLz4mbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDtDb25maWd1cmluZyBEZWZhdWx0IFNldHRpbmdzLi4uIjsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMScsICcxJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzInLCAnMjAnKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMycsICdZb3VyIGV2ZW50IGhhcyBiZWVuIGFwcHJvdmVkIGFuZCBpcyBub3cgYXZhaWxhYmxlIG9uIG91ciB3ZWJzaXRlLiBXZSBob3BlIHlvdSBjb250aW51ZSB0byB1c2Ugb3VyIGNhbGVuZGFyIGFuZCBzdWJtaXQgbW9yZSBldmVudHMgaW4gdGhlIGZ1dHVyZS4gVGhhbmsgeW91IGZvciB1c2luZyBvdXIgY2FsZW5kYXIgYW5kIGlmIHlvdSBoYXZlIGFueSBxdWVzdGlvbnMgcGxlYXNlIGZlZWwgZnJlZSB0byBjb250YWN0IHVzLicpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCc0JywgJ1lvdXIgZXZlbnQgaGFzIGJlZW4gZGVjbGluZWQgYW5kIHdpbGwgbm90IGJlIGF2YWlsYWJsZSBvbiBvdXIgd2Vic2l0ZS4gUGxlYXNlIGRvIG5vdCBsZXQgdGhpcyBkaXNjb3VyYWdlIHlvdSBmcm9tIHN1Ym1pdGluZyBtb3JlIGV2ZW50cyBpbiB0aGUgZnV0dXJlLiBUaGFuayB5b3UgZm9yIHVzaW5nIG91ciBjYWxlbmRhciBhbmQgaWYgeW91IGhhdmUgYW55IHF1ZXN0aW9ucyBwbGVhc2UgZmVlbCBmcmVlIHRvIGNvbnRhY3QgdXMuJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzUnLCAnSGVsaW9zLCBDYWxlbmRhcicpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCc2JywgJ1Bvd2VyZWQgYnkgdGhlIEhlbGlvcyBDYWxlbmRhci4nKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnNycsICcxJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzgnLCAnMCcpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCc5JywgJzAnKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTAnLCAnMTAnKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTEnLCAnMScpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxMicsICcxMCcpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxMycsICcxJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzE0JywgJ2wsIEYgZFMsIFknKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMTUnLCAnMScpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxNicsICciIC4gJF9TRVNTSU9OWydyZWduYW1lJ10gLiAiJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzE3JywgJyIgLiAkX1NFU1NJT05bJ3JlZ3VybCddIC4gIicpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxOCcsICciIC4gJF9TRVNTSU9OWydyZWdlbWFpbCddIC4gIicpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcxOScsICciIC4gJF9TRVNTSU9OWydyZWdjb2RlJ10gLiAiJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzIwJywgTlVMTCk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzIxJywgJ01JJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzIyJywgJzAnKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMjMnLCAnaDppIEEnKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMjQnLCAnbS9kL1knKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMjUnLCAnMCcpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcyNicsIE5VTEwpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcyNycsICcxMycpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcyOCcsIE5VTEwpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCcyOScsICcxJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzMwJywgJzEnKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMzEnLCAnMTInKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMzInLCAnMCcpOyIpOw0KCQkJbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPICIgLiBIQ19UYmxQcmVmaXggLiAic2V0dGluZ3MgVkFMVUVTKCczMycsICcxJyk7Iik7DQoJCQlteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyBWQUxVRVMoJzM0JywgJzAnKTsiKTsNCgkJCW15c3FsX3F1ZXJ5KCJJTlNFUlQgSU5UTyAiIC4gSENfVGJsUHJlZml4IC4gInNldHRpbmdzIFZBTFVFUygnMzUnLCAnMCcpOyIpOw0KCQkJDQoJCQkkcmVzdWx0ID0gbXlzcWxfcXVlcnkoIlNFTEVDVCAqIEZST00gIiAuIEhDX1RibFByZWZpeCAuICJzZXR0aW5ncyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJDQoJCQllY2hvICI8YnIgLz5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gInVzZXJjYXRlZ29yaWVzPC9pPiB0YWJsZS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcmNhdGVnb3JpZXMgKFVzZXJJRCBpbnQoMTEpIHVuc2lnbmVkIGRlZmF1bHQgTlVMTCxDYXRlZ29yeUlEIGludCgxMSkgdW5zaWduZWQgZGVmYXVsdCBOVUxMLEtFWSBDYXRlZ29yeUlEIChDYXRlZ29yeUlEKSxLRVkgVXNlcklEIChVc2VySUQpKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTSE9XIFRBQkxFIFNUQVRVUyBGUk9NICIgLiBEQVRBQkFTRV9OQU1FIC4gIiBMSUtFICciIC4gSENfVGJsUHJlZml4IC4gInVzZXJjYXRlZ29yaWVzJyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJDQoJCQllY2hvICI8YnIgLz5DcmVhdGluZyA8aT4iIC4gSENfVGJsUHJlZml4IC4gInVzZXJzPC9pPiB0YWJsZS4uLiI7DQoJCQlteXNxbF9xdWVyeSgiQ1JFQVRFIFRBQkxFICIgLiBIQ19UYmxQcmVmaXggLiAidXNlcnMgKFBrSUQgaW50KDExKSB1bnNpZ25lZCBOT1QgTlVMTCBhdXRvX2luY3JlbWVudCxGaXJzdE5hbWUgdmFyY2hhcig1MCkgZGVmYXVsdCBOVUxMLExhc3ROYW1lIHZhcmNoYXIoNTApIGRlZmF1bHQgTlVMTCxFbWFpbCB2YXJjaGFyKDc1KSBkZWZhdWx0IE5VTEwsT2NjdXBhdGlvbklEIGludCgxMSkgZGVmYXVsdCBOVUxMLFppcCB2YXJjaGFyKDEwKSBkZWZhdWx0IE5VTEwsSXNSZWdpc3RlcmVkIHRpbnlpbnQoMykgdW5zaWduZWQgTk9UIE5VTEwgZGVmYXVsdCAnMCcsR1VJRCB2YXJjaGFyKDUwKSBkZWZhdWx0IE5VTEwsQWRkZWRCeSB0aW55aW50KDMpIHVuc2lnbmVkIE5PVCBOVUxMIGRlZmF1bHQgJzAnLFJlZ2lzdGVyZWRBdCBkYXRldGltZSBkZWZhdWx0IE5VTEwsUmVnaXN0ZXJJUCB2YXJjaGFyKDE1KSBkZWZhdWx0IE5VTEwsUFJJTUFSWSBLRVkgKFBrSUQpLCBVTklRVUUgS0VZIFBrSUQgKFBrSUQpKSIpOw0KCQkJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTSE9XIFRBQkxFIFNUQVRVUyBGUk9NICIgLiBEQVRBQkFTRV9OQU1FIC4gIiBMSUtFICciIC4gSENfVGJsUHJlZml4IC4gInVzZXJzJyIpOw0KCQkJaWYobXlzcWxfbnVtX3Jvd3MoJHJlc3VsdCkgPT0gMCl7DQoJCQkJJHN0b3AgPSAxOw0KCQkJCWVjaG8gIjxiPkZhaWxlZDwvYj4iOw0KCQkJfSBlbHNlIHsNCgkJCQllY2hvICJGaW5pc2hlZCI7DQoJCQl9Ly9lbmQgaWYNCgkJCQ0KCQkJaWYoJHN0b3AgPT0gMSl7CT8+DQoJCQkJPGJyIC8+PGJyIC8+DQoNCgkJCQlTZXR1cCB3YXMgdW5hYmxlIHRvIGZ1bGx5IGNyZWF0ZSB5b3VyIEhlbGlvcyBkYXRhYmFzZS4gRGVwZW5kaW5nIG9uIHdoaWNoIHN0ZXBzIGZhaWxlZCBhYm92ZSB5b3UgbWF5IHdpc2ggdG8gcmUtcnVuIHRoaXMgc2V0dXAuIFBsZWFzZSB2ZXJpZnkgeW91ciBkYXRhYmFzZSB1c2VyDQoJCQkJYWNjb3VudCBpcyBzZXR1cCBjb3JyZWN0bHksIGFuZCBoYXMgQ3JlYXRlIHBlcm1pc3Npb25zLjxiciAvPjxiciAvPlRoZW4gPGEgaHJlZj0iPD9waHAgZWNobyBDYWxSb290Oz8+L3NldHVwL2luZGV4LnBocD9zdGVwPTQiIGNsYXNzPSJldmVudE1haW4iPnRyeSB0aGlzIHN0ZXAgYWdhaW48L2E+Lg0KCTw/cGhwCX0gZWxzZSB7CT8+DQoJCQkJPGJyIC8+PGJyIC8+DQoJCQkJQ29uZ3JhdHVsYXRpb25zLiBTZXR1cCBvZiB5b3VyIEhlbGlvcyBDYWxlbmRhciBpcyBjb21wbGV0ZS48YnIgLz4NCgkJCQlQbGVhc2UgYmUgc3VyZSB0byA8Yj5kZWxldGUgdGhlIHNldHVwIGRpcmVjdG9yeTwvYj4gYmVmb3JlIHVzaW5nIEhlbGlvcy4NCgkJCQk8YnIgLz48YnIgLz4NCg0KCQ0KCQkJCTxhIGhyZWY9Ijw/cGhwIGVjaG8gQ2FsUm9vdDs/Pi8iIGNsYXNzPSJldmVudE1haW4iIHRhcmdldD0iX2JsYW5rIj5DbGljayBIZXJlIEZvciBZb3VyIEhlbGlvcyBQdWJsaWMgQ2FsZW5kYXI8L2E+DQoJCQkJPGJyIC8+DQoJCQkJPGEgaHJlZj0iPD9waHAgZWNobyBDYWxBZG1pblJvb3Q7Pz4vIiBjbGFzcz0iZXZlbnRNYWluIiB0YXJnZXQ9Il9ibGFuayI+Q2xpY2sgSGVyZSBGb3IgWW91ciBIZWxpb3MgQWRtaW5pc3RyYXRpb24gQ29uc29sZTwvYT4NCgk8P3BocAl9Ly9lbmQgaWY='));
			}//end if
	}//end if