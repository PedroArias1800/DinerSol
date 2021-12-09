<?php

    class Menu{
        public $id_cafeteria;
        public $id_producto;
        public $id_combo;
        public $estado;
        public $turno;

        function __construct($idCaf, $idPro, $idCom, $e, $t){
            $this->id_cafeteria = $idCaf;
            $this->id_producto = $idPro;
            $this->id_combo = $idCom;
            $this->estado = $e;
            $this->turno = $t;
        }
    }

?>