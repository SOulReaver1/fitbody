<?php

$inactive = 900; // 15 minutes
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
{  session_destroy(); header("Location: /admin");     }

$_SESSION['timeout']=time();