<?php
session_start(); //starts or resumes an existing session

session_destroy();

header('location: ../index.php');
?>