<?php

require('db_conn.php');
require_once("functions.inc.php");
redirectIfNotLoggedIn();

header("Location: cart.php");




