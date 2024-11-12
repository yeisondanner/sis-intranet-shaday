<?php
class Logout extends Controllers
{
    public function __construct()
    {
        session_start(getNameSesion());
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        parent::__construct();
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . base_url() . 'login');
    }
}