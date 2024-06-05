<?php  
session_start();

session_unset();
session_destroy();

echo "<script>alert('Account Signout'); window.location='/qcpl/Frontend/login.html';</script>";
?>