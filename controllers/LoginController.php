<?php

namespace Controllers;

use MVC\Router;

class LoginController {
    public static function login(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }

        // Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout() {
        echo "Desde Login";
    }

    public static function crear(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }

        // Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crea tu cuenta en UpTask'
        ]);
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