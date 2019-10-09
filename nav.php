<?php
if(preg_match('/Firefox/i',$_SERVER['HTTP_USER_AGENT'])){
   // action conditionnelle à Firefox
	echo "firefox";
}
if(preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT'])){
   // action conditionnelle à Internet Explorer
	echo "explorer";
}
if(preg_match('/Chrome/i',$_SERVER['HTTP_USER_AGENT'])){
   // action conditionnelle à Chrome
	echo "chromme";
}
?>