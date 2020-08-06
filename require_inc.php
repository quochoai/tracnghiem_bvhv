<?php 
ini_set('session.gc_maxlifetime', 28800); // 8 hours
@session_start();
ob_start();
define('INDEX',true);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
// Include required files
include("define/define.php");
include("language/vi.php");
include("common/functions_mysql.php");  // Mysql functions
include("common/functions_common.php");  // Common functions
include("common/function.php"); // Functions
include("config/db_connection.php");  // DB connections
$h = new mysql();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>