<?php
session_start();          // ✅ eerst starten, dan destroyen
session_destroy();
header("Location: login.php");  // ✅ stuur naar login, niet index
exit;
?>