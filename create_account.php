<?php
session_start();
include "functions.php";

// Get JSON inputs, store in variable
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$fname = $obj['fname'];
$lname = $obj['lname'];
$email = $obj['email'];
$password1 = $obj['password1'];

$validFname = false;
$validLname = false;
$validEmail = false;
$validEmail2 = false;
$validPassword1 = false;
$inserted = true;

if ($fname != NULL) {
$validFname = true;
}
else {
$msgs['fnameErr'] = "First name is required";
}
if ($lname != NULL) {
$validLname = true;
}
else {
$msgs['lnameErr'] = "Last name is required";
}
if ($email != NULL) {
$validEmail = true;
}
else {
$msgs['eErr'] = "Email address is required";
}
if (!doesEmailExist($email)) {
$validEmail2 = true;
}
else {
$msgs['etaken'] = "The email you entered is already being used";
}
if ($password1 != NULL) {
$validPassword1 = true;
}
else {
$msgs['passReq'] = "Password is required";
}
if ($validFname && $validLname && $validEmail && $validEmail2 && $validPassword1) {
$hashed = password_hash($password1, PASSWORD_DEFAULT);
$inserted = insertUserRecord($fname, $lname, $email, $hashed);
if ($inserted) {
$msgs['suc'] = "Success";
$record = getUserRecord($email);
$_SESSION['record'] = $record;
}
else {
$msgs['fail'] = "Register failed; Check connection";
}
}
echo json_encode($msgs);
?>
