<?php

require_once 'vendor/autoload.php';
require_once "bootstrap.php";
use App\User;

$user=new User();
$user->create('Hikmatullo','director','male','9714355');