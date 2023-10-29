<?php

class User
{
    public $username;
    public $email;
    public $password;

    public function checkUser($email)
    {
        $db = Db::getInstance()->getConnection();
        $req = $db->prepare('SELECT * FROM users WHERE user_email = ?');
        $req->execute(array($email));
        $user = $req->fetch();

        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $user = new User();
        $user->checkUser($email);

        if ($user->checkUser($email) == true) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&:?])[A-Za-z\d@$!%*?&:?]{8,}$/", $password)) {
                    $db = Db::getInstance()->getConnection();
                    $sql = $db->prepare('SELECT * FROM users WHERE user_email = ?');
                    $sql->execute(array($email));
                    $user = $sql->fetch();

                    if (password_verify($password, $user['user_password'])) {
                        session_start();
                        $_SESSION['user'] = $user['user_id'];
                        echo "<script>alert('Vous êtes connecté');</script>";
                        echo "<script>window.location.href='../index.php?home';</script>";
                    } else {
                        echo "<script>alert('Mot de passe incorrect');</script>";
                        echo "<script>window.location.href='../index.php?login';</script>";
                    }
                } else {
                    echo "<script>alert('Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');</script>";
                    echo "<script>window.location.href='../index.php?login';</script>";
                }
            } else {
                echo "<script>alert('Veuillez entrer un email valide');</script>";
                echo "<script>window.location.href='../index.php?login';</script>";
            }
        } else {
            echo "<script>alert('Cet utilisateur n\'existe pas');</script>";
            echo "<script>window.location.href='../index.php?login';</script>";
        }
    }

    public function register($username, $email, $password, $password_confirm)
    {
        $user = new User();
        $user->checkUser($email);

        if ($user->checkUser($email) == false) {
            if (preg_match("/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/", $username)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&:?])[A-Za-z\d@$!%*?&:?]{8,}$/", $password)) {
                        if ($password == $password_confirm) {
                            $password = password_hash($password, PASSWORD_DEFAULT);

                            $db = Db::getInstance()->getConnection();
                            $req = $db->prepare('INSERT INTO users (username, user_email, user_password) VALUES (?, ?, ?)');
                            $req->execute(array($username, $email, $password));

                            $sql = $db->prepare('SELECT * FROM users WHERE user_email = ?');
                            $sql->execute(array($email));
                            $user = $sql->fetch();

                            session_start();
                            $_SESSION['user'] = $user['user_id'];

                            echo "<script>alert('Vous êtes inscrit');</script>";
                            echo "<script>window.location.href='../index.php?home';</script>";
                        } else {
                            echo "<script>alert('Les mots de passe ne correspondent pas');</script>";
                            echo "<script>window.location.href='../index.php?register';</script>";
                        }
                    } else {
                        echo "<script>alert('Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');</script>";
                        echo "<script>window.location.href='../index.php?register';</script>";
                    }
                } else {
                    echo "<script>alert('Veuillez entrer un email valide');</script>";
                    echo "<script>window.location.href='../index.php?register';</script>";
                }
            } else {
                echo "<script>alert('Le nom d\'utilisateur ne doit pas contenir de caractères spéciaux');</script>";
                echo "<script>window.location.href='../index.php?register';</script>";
            }
        } else {
            echo "<script>alert('Cet utilisateur existe déjà');</script>";
            echo "<script>window.location.href='../index.php?register';</script>";
        }
    }
}
