<?php

if (   isset($_POST)
    && isset($_POST['bsubmit'])
    && isset($_POST['dbuser'])
    && isset($_POST['dbpass'])
    && isset($_POST['dbname'])
    && isset($_POST['dbdriver'])
    && isset($_POST['dbserver'])
) {
    $sitename = $_POST['sitename'];
    $dbserver = $_POST['dbserver'];
    $dbuser = $_POST['dbuser'];
    $dbpass = $_POST['dbpass'];
    $dbname = $_POST['dbname'];
    $dbdriver = $_POST['dbdriver'];

    $configData = '<?php
$sitename = "' . $sitename . '";
$dbserver = "' . $dbserver . '";
$dbuser = "' . $dbuser . '";
$dbpass = "' . $dbpass . '";
$dbname = "' . $dbname . '";
$dbdriver = "' . $dbdriver . '";

';

    file_put_contents('app/config.php', $configData);

} else {
    die('Please fill all fields');
}