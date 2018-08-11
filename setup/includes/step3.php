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
/*
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	|	Modifying or in anyway altering source code contained in this file is 	|
	|	not permitted and violates the Helios Calendar Software License Agreement	|
	|	DO NOT edit or reverse engineer any source code or files with this notice.	|
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/
	if(!isset($_SESSION['license']) || $_SESSION['license'] == false || !isset($_SESSION['review']) || $_SESSION['review'] == false){
		hc_fail();
	} else {
		if(!isset($_POST['liccode'])){
			echo '
		<p>
			To retrieve your license code from your member account click "Refresh Members Site" to the right.
		</p>
		<form name="frm" id="frm" method="post" action="'.CalRoot.'/setup/index.php?step=3" onsubmit="return (document.getElementById(\'liccode\').value != \'\') ? true : false;">
		<fieldset>
			<label for="liccode">License Code:</label>
			<input size="50" type="text" name="liccode" id="liccode" value="" autofocus="autofocus" required="required" />
		</fieldset>
		<input type="submit" name="submit" id="submit" value="Confirm License" />
		</form>';
		} else {
			eval(base64_decode('LypJZiB5b3UgYXJlIHJlYWRpbmcgdGhpcyB5b3UgaGF2ZSB2aW9sYXRlZCB0aGUgSGVsaW9zIENhbGVuZGFyIFNvZnR3YXJlIExpY2Vuc2UgQWdyZWVtZW50Ki8NCmlmKCRfUE9TVFsnbGljY29kZSddID09ICJsb2NhbGhvc3QiICYmICRfU0VSVkVSWydIVFRQX0hPU1QnXSA9PSAibG9jYWxob3N0IiAmJiBzdHJwb3MoQ2FsUm9vdCwnbG9jYWxob3N0JykgIT09IGZhbHNlKXsNCgkkX1NFU1NJT05bJ3ZhbGlkJ10gPSB0cnVlOw0KCSRfU0VTU0lPTlsncmVnY29kZSddID0gImxvY2FsaG9zdF9vbmx5IjsNCgkkX1NFU1NJT05bJ3JlZ25hbWUnXSA9ICJEZXZlbG9wZXIiOw0KCSRfU0VTU0lPTlsncmVndXJsJ10gPSAibG9jYWxob3N0IjsNCgkkX1NFU1NJT05bJ3JlZ2VtYWlsJ10gPSAic3VwcG9ydEBoZWxpb3NjYWxlbmRhci5jb20iOw0KCWVjaG8gJw0KCQk8ZmllbGRzZXQ+DQoJCQk8cD4NCgkJCQlZb3VyIGxvY2FsaG9zdCBpbnN0YWxsYXRpb24gb2YgSGVsaW9zIENhbGVuZGFyIGhhcyBiZWVuIHZhbGlkYXRlZC4NCgkJCTwvcD4NCgkJCTxwPg0KCQkJCVRoaXMgaW5zdGFsbGF0aW9uIHdpbGwgb25seSBiZSB2aXNpYmxlIGZyb20gdGhlIGxvY2FsaG9zdCBhZGRyZXNzIGFuZCBpcyBsaWNlbnNlZCBmb3IgbG9jYWwgZGV2ZWxvcG1lbnQgdXNlIG9ubHkuDQoJCQkJPGJyIC8+PGI+QW55IG90aGVyIHVzYWdlIGlzIHByb2hpYml0ZWQgYW5kIHZpb2xhdGVzIHRoZSBIZWxpb3MgQ2FsZW5kYXIgU29mdHdhcmUgTGljZW5zZSBBZ3JlZW1lbnQ8L2I+DQoNCgkJCTwvcD4NCgkJPC9maWVsZHNldD4NCgkJPGlucHV0IG9uY2xpY2s9ImRvY3VtZW50LmxvY2F0aW9uLmhyZWY9XCcnIC4gQ2FsUm9vdCAuICcvc2V0dXAvaW5kZXgucGhwP3N0ZXA9NFwnOyIgdHlwZT0iYnV0dG9uIiBuYW1lPSJzdWJtaXQiIGlkPSJzdWJtaXQiIHZhbHVlPSJDb250aW51ZSIgLz4nOw0KfSBlbHNlIHsNCgkkaG9zdCA9ICJ2YWxpZGF0ZS5yZWZyZXNobXkuY29tIjsNCgkkZmlsZSA9ICIvaC5waHA/dj0yLjEmYz0iIC4gc3RyaXBfdGFncygkX1BPU1RbJ2xpY2NvZGUnXSkgLiAiJnU9IiAuICRfU0VSVkVSWydIVFRQX0hPU1QnXTsNCg0KCWlmKCEkZnAgPSBmc29ja29wZW4oJGhvc3QsIDgwLCAkZXJybm8sICRlcnJzdHIsIDEpKXsNCgkJZWNobyAnDQoJCTxwPg0KCQkJQ29ubmVjdGlvbiB0byB2YWxpZGF0aW9uIHNlcnZlciBmYWlsZWQuIFRoZSBmb2xsb3dpbmcgZXJyb3IgbWVzc2FnZSB3YXMgcmV0dXJuZWQuDQoJCQk8YmxvY2txdW90ZT5FcnJvciAjOicuJGVycm5vLicgLS0gJy4kZXJyc3RyLic8L2Jsb2NrcXVvdGU+DQoJCQlQbGVhc2Ugd2FpdCBhIGZldyBtb21lbnRzIGFuZCB0cnkgYWdhaW4uIElmIHlvdSBjb250aW51ZSB0byByZWNlaXZlIHRoaXMgbWVzc2FnZSBwbGVhc2Ugc3VibWl0IGEgc3VwcG9ydCB0aWNrZXQgZnJvbSB5b3VyIFJlZnJlc2ggTWVtYmVycyBTaXRlIGFjY291bnQgZm9yIGFzc2lzdGFuY2UuDQoJCTwvcD4nOw0KCX0gZWxzZSB7DQoJCSRyZWFkID0gIiI7DQoJCSRyZXF1ZXN0ID0gIkdFVCAkZmlsZSBIVFRQLzEuMVxyXG4iOw0KCQkkcmVxdWVzdCAuPSAiSG9zdDogJGhvc3RcclxuIjsNCgkJJHJlcXVlc3QgLj0gIkNvbm5lY3Rpb246IENsb3NlXHJcblxyXG4iOw0KCQlmd3JpdGUoJGZwLCAkcmVxdWVzdCk7DQoNCgkJd2hpbGUgKCFmZW9mKCRmcCkpDQoJCQkkcmVhZCAuPSBmcmVhZCgkZnAsMTAyNCk7DQoNCgkJJG91dHB1dCA9IGV4cGxvZGUoImhlbGlvcy8vIiwgJHJlYWQpOw0KCQlpZihpc3NldCgkb3V0cHV0WzFdKSl7DQoJCQkkcmVnRGF0YSA9IGV4cGxvZGUoIi8vIiwgYmFzZTY0X2RlY29kZSgkb3V0cHV0WzFdKSk7DQoJCQkkX1NFU1NJT05bJ3ZhbGlkJ10gPSB0cnVlOw0KCQkJJF9TRVNTSU9OWydyZWdjb2RlJ10gPSBzdHJpcF90YWdzKCRfUE9TVFsnbGljY29kZSddKTsNCgkJCSRfU0VTU0lPTlsncmVnbmFtZSddID0gJHJlZ0RhdGFbMF07DQoJCQkkX1NFU1NJT05bJ3JlZ3VybCddID0gJHJlZ0RhdGFbMl07DQoJCQkkX1NFU1NJT05bJ3JlZ2VtYWlsJ10gPSAkcmVnRGF0YVsxXTsNCg0KCQkJZWNobyAnDQoJCTxmaWVsZHNldD4NCg0KCQkJUGxlYXNlIHJldmlldyB5b3VyIGxpY2Vuc2UgaW5mb3JtYXRpb24gYmVsb3cgdGhlbiBjbGljayAiQ29udGludWUiLg0KCQkJPHVsPg0KCQkJCTxsaT48c3Bhbj5MaWNlbnNlIENvZGU6PC9zcGFuPicuc3RyaXBfdGFncygkX1BPU1RbJ2xpY2NvZGUnXSkuJzwvbGk+DQoJCQkJPGxpPjxzcGFuPkxpY2Vuc2VlOjwvc3Bhbj4nLiRyZWdEYXRhWzBdLic8L2xpPg0KCQkJCTxsaT48c3Bhbj5MaWNlbnNlZSBFbWFpbDo8L3NwYW4+Jy4kcmVnRGF0YVsxXS4nPC9saT4NCgkJCQk8bGk+PHNwYW4+TGljZW5zZWQgVVJMOjwvc3Bhbj4nLiRyZWdEYXRhWzJdLic8L2xpPg0KDQoJCQk8L3VsPg0KCQk8L2ZpZWxkc2V0Pg0KCQk8aW5wdXQgb25jbGljaz0iZG9jdW1lbnQubG9jYXRpb24uaHJlZj1cJycgLiBDYWxSb290IC4gJy9zZXR1cC9pbmRleC5waHA/c3RlcD00XCc7IiB0eXBlPSJidXR0b24iIG5hbWU9InN1Ym1pdCIgaWQ9InN1Ym1pdCIgdmFsdWU9IkNvbnRpbnVlIiAvPic7DQoJCX0gZWxzZSB7DQoJCQllY2hvICcNCgkJPGZpZWxkc2V0Pg0KCQkJPGI+WW91ciBMaWNlbnNlIENvZGUgY291bGQgbm90IGJlIGNvbmZpcm1lZC4gVGhpcyBjYW4gaGFwcGVuIGZvciBzZXZlcmFsIHJlYXNvbnMuPC9iPg0KCQkJPHVsIGNsYXNzPSJidWxsZXRlZCI+DQoJCQkJPGxpPllvdXIgd2ViIHNlcnZlciB3YXMgdW5hYmxlIHRvIGNvbm5lY3QgdG8gUmVmcmVzaCBXZWIgRGV2ZWxvcG1lbnRcJ3MgdmFsaWRhdGlvbiBzZXJ2ZXIuPC9saT4NCgkJCQk8bGk+WW91ciBMaWNlbnNlIENvZGUgd2FzIGVudGVyZWQgaW5jb3JyZWN0bHkgKGNvbmZpcm0gaXQgaW4geW91ciBtZW1iZXIgYWNjb3VudCkuPC9saT4NCg0KCQkJCTxsaT5Zb3VyIExpY2Vuc2UgQ29kZSB3YXMgY29waWVkICZhbXA7IHBhc3RlZCBpbmNvcnJlY3RseSAod2l0aCBhbiBleHRyYSBzcGFjZS9jaGFyYWN0ZXIpLjwvbGk+DQoJCQkJPGxpPllvdXIgTGljZW5zZWQgRG9tYWluIGFuZCB0aGUgY3VycmVudCBpbnN0YWxsIHBvaW50IGRvIG5vdCBtYXRjaC48L2xpPg0KCQkJCTxsaT5Zb3UgYXJlIGluc3RhbGxpbmcgYSB2ZXJzaW9uIG9mIEhlbGlvcyBDYWxlbmRhciB5b3VyIGxpY2Vuc2UgaXMgbm90IGF1dGhvcml6ZWQgZm9yLjwvbGk+DQoJCQkJPGxpPllvdXIgTGljZW5zZSBDb2RlIGlzIGludmFsaWQuPC9saT4NCgkJCTwvdWw+DQoNCgkJCTxwIHN0eWxlPSJwYWRkaW5nLXRvcDoxNXB4OyI+DQoNCgkJCQk8Yj5UbyBwcm9jZWVkIHlvdSBzaG91bGQ6PC9iPg0KCQkJPC9wPg0KCQkJPG9sPg0KCQkJCTxsaT5Mb2dpbiB0byB5b3VyIG1lbWJlciBhY2NvdW50ICZhbXA7IGNvbmZpcm0geW91ciBMaWNlbnNlIENvZGUuPC9saT4NCgkJCQk8bGk+Q29uZmlybSB5b3VyIGN1cnJlbnQgaW5zdGFsbCBwb2ludCBtYXRjaGVzIHlvdXIgbGljZW5zZWQgZG9tYWluPC9saT4NCg0KCQkJCTxsaT5DbGljayAiVHJ5IEFnYWluIiBiZWxvdyBhbmQgZW50ZXIgeW91ciBjb25maXJtZWQgTGljZW5zZSBDb2RlLjwvbGk+DQoNCgkJCTwvb2w+DQoJCQk8cCBzdHlsZT0icGFkZGluZy10b3A6MTVweDsiPg0KCQkJCTxiPk5vdGU6PC9iPiBJZiB5b3UgbGljZW5zZWQgeW91ciBkb21haW4gd2l0aCB0aGUgInd3dy4iIHByZWZpeCB5b3VyIENhbFJvb3QgJmFtcDsgQWRtaW5Sb290IG11c3QgYWxzbyBpbmNsdWRlICJ3d3cuIg0KCQkJCUxpa2V3aXNlLCBpZiB5b3UgcmVnaXN0ZXJlZCB5b3VyIGxpY2Vuc2Ugd2l0aG91dCB0aGUgInd3dy4iIHByZWZpeCB5b3VyIENhbFJvb3QgJmFtcDsgQWRtaW5Sb290IHNob3VsZCBub3QgaW5jbHVkZSAid3d3LiINCgkJCTwvcD4NCg0KCQkJPHA+DQoJCQkJSWYgeW91IGNvbnRpbnVlIHRvIHJlY2VpdmUgdGhpcyBtZXNzYWdlIGFmdGVyIHBlcmZvcm1pbmcgdGhlIHN0ZXBzIGFib3ZlIHBsZWFzZSBzdWJtaXQgYSBzdXBwb3J0IHRpY2tldCBmcm9tIHlvdXIgUmVmcmVzaCBNZW1iZXJzIFNpdGUgYWNjb3VudCBmb3IgYXNzaXN0YW5jZS4NCgkJCTwvcD4NCg0KCQk8L2ZpZWxkc2V0Pg0KCQk8aW5wdXQgb25jbGljaz0iZG9jdW1lbnQubG9jYXRpb24uaHJlZj1cJycgLiBDYWxSb290IC4gJy9zZXR1cC9pbmRleC5waHA/c3RlcD0zXCc7IiB0eXBlPSJidXR0b24iIG5hbWU9ImJ0biIgaWQ9ImJ0biIgdmFsdWU9IlRyeSBBZ2FpbiIgLz4nOw0KCQl9DQoJCWZjbG9zZSgkZnApOw0KCX0NCn0='));			
		}
	}	
?>