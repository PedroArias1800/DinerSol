<?php

    class Usuario{
        public $nombre;
        public $apellido;
        public $cedula;
        public $telefono;
        public $foto;
        public $tipoUsuario;
        public $email;
        public $password;

        Function __construct($n, $a, $c, $t, $f, $tipo, $e, $p){
            $this->nombre = $n;
            $this->apellido = $a;
            $this->cedula = $c;
            $this->telefono = $t;
            $this->foto = $f;
            $this->tipoUsuario = $tipo;
            $this->email = $e;
            $this->password = $p;
        }
    }

?>