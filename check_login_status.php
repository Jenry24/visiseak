<?php
session_start();
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] !== '';
echo json_encode(['loggedIn' => $loggedIn]);