<?php 
session_start();
include '../includes/connection.inc.php';
// create database connection
session_destroy();
header("Location:login.php");

