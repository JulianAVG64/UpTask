<?php

namespace Controllers;

class LoginController {
    public static function login() {
        echo "Desde Login";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }

    public static function logout() {
        echo "Desde Login";
    }

    public static function crear() {
        echo "Desde crear";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }

    public static function olvide() {
        echo "Desde olvide";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }

    public static function reestablecer() {
        echo "Desde Reestablecer";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }

    public static function mensaje() {
        echo "Desde Mensaje";
    }

    public static function confirmar() {
        echo "Desde Confirmar";
    }
}