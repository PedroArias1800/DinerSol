<?php

    class Producto{
        public $nombre;
        public $tipo;
        public $costo;
        public $foto;
        public $inventario;
        public $id_cafeteria;

        Function __construct($n, $t, $c, $f, $i, $id){
            $this->nombre = $n;
            $this->tipo = $t;
            $this->costo = $c;
            $this->foto = $f;
            $this->inventario = $i;
            $this->id_cafeteria = $id;
        }
    }

?>