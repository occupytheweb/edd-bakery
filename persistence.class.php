<?php

require_once('user.php');
session_start();


class persistence
{
    private static $user;


    public static function user() { return self::$user; }


    public static function pull() {
        self::$user = isset($_SESSION['user']) ? $_SESSION['user'] : new user(null);
    }


    public static function persist_user(user $thisUser = null) {
        $_SESSION['user'] = $thisUser;
        self::pull();
    }
}

persistence::pull();
