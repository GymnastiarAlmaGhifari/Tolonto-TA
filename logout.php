<?php
require_once "core/init.php";

// destroy cookie value

session_unset();
session_destroy();
header('Location:login.php');
