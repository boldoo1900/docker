<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{

    public static function isLoggedin()
    {
        if (!isset($_SESSION['userInfo'])) {
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }
}
