<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: http://192.168.33.10/index");
