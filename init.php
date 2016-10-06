<?php
header('Content-Type: text/html; charset=utf-8');
define('ROOT_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
require_once(ROOT_PATH.'/configs/config.php');
session_start();
