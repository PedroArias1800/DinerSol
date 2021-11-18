<?php

    class Combo{
        public $nombre;
        public $comida;
        public $snack;
        public $refresco;
        public $costo;
        public $cantidad;
        public $cafeteria;

        function __construct($n, $com, $s, $r, $cos, $can, $caf){
            $this->nombre = $n;
            $this->comida = $com;
            $this->snack = $s;
            $this->refresco = $r;
            $this->costo = $cos;
            $this->cantidad = $can;
            $this->cafeteria = $caf;
        }
    }

?>