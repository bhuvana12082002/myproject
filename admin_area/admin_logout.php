<?php
session_start();
session_unset();
session_destroy();
echo "<script>window.open('../last.php','_self')</script>";
?>