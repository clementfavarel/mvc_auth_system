<?php
require_once('Model/Model.php');

session_start();

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke()
    {
        if (!isset($_SESSION['user'])) {
            if (isset($_GET['login'])) {
                include('View/login.php');
            } else if (isset($_GET['register'])) {
                include('View/register.php');
            } else {
                include('View/login.php');
            }
        } else {
            if (isset($_GET['logout'])) {
                session_destroy();
                include('View/login.php');
            } else if (isset($_SESSION['home'])) {
                include('View/home.php');
            } else {
                include('View/home.php');
            }
        }
    }
}
