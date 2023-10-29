<?php
require_once('../Model/Db.php');
require_once('../Model/User.php');

$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {
    $user = new User();
    $user->login($email, $password);
} else {
    echo "<script>alert('Veuillez remplir tous les champs');</script>";
    echo "<script>window.location.href='../index.php?login';</script>";
}
