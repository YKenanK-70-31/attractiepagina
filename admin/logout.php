<?php
session_start();
session_destroy();
require_once 'backend/config.php';
header("Location: $base_url/admin/login.php");
exit;
?>