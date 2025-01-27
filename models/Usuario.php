<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    // Validar el Login de Usuarios
    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'EL Email del Usuario es Obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }

        if(!$this->password) {
            self::$alertas['error'][] = 'EL Password no pueder ir vacío';
        }

        return self::$alertas;
    }

    // Validacion para cuentas nuevas
    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'EL Nombre del Usuario es Obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'EL Email del Usuario es Obligatorio';
        }

        if(!$this->password) {
            self::$alertas['error'][] = 'EL Password no pueder ir vacío';
        }

        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'EL Password debe contener al menos 6 caracteres';
        }

        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Los password son diferentes';
        }

        return self::$alertas;
    }

    // Valida un email
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }

        return self::$alertas;
    }

    // Valida el Password
    public function validarPassword() {

        if(!$this->password) {
            self::$alertas['error'][] = 'EL Password no pueder ir vacío';
        }

        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'EL Password debe contener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    public function validarPerfil() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }

        return self::$alertas;
    }

    // Hashea el password
    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar un token, en caso de una aplicación más grande es mejor usar md5(uniqid()) para generar el token
    public function crearToken() {
        $this->token = uniqid();
    }
}