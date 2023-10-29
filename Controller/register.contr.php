<?php
require_once('../Model/Db.php');
require_once('../Model/User.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if (!empty($username) && !empty($email) && !empty($password) && !empty($password_confirm)) {
    $user = new User();
    $user->register($username, $email, $password, $password_confirm);
} else {
    echo "<script>alert('Veuillez remplir tous les champs');</script>";
    echo "<script>window.location.href='../index.php?register';</script>";
}
