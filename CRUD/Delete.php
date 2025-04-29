<?php
require "../Datbase/lijst.php";
$lijst = new Lijst();
$lijst->DeleteList($_GET['id']);
header('location:View.php');
