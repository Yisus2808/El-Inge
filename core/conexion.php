<?php
    class Conexion {
        public function conectar() {
           
            $link = new PDO("mysql:host=localhost; dbname=el_inge; charset=UTF8", "root", "");
            return $link;
        }
    }