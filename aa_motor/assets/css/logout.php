<?php

session_start();
session_unset("user");
header("Location: home.php");