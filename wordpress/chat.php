<?php
if (isset($_POST['submit'])) {
	$navn = $_POST['navn'];
	$spm = $_POST['spm'];
	$spm = preg_replace("/\r|\n/", "", $spm);

	header("Location:https://kbharkiv.kk.dk/api/start_session?issue_menu=1&codeName=stadsarkiv&c2cjs=1&customer.name='.$navn.'&customer.details='$spm'");
}
?>