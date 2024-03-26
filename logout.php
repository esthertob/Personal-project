<?php
include('include/config.php');

session_destroy();

header('Location: /whole');
die();