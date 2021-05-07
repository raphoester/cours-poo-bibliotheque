<?php

    class LivreManager{
        private $_pdo;

        public function __construct($pdo){
            $this->setPdo($pdo);
        }

        public function setPdo($pdo){
            $this->_pdo = $pdo;
        }

        public function getPdo(){
            return $this->_pdo;
        }

        public function selectionnerTous(){
            $sql = "SELECT * FROM livre";
            $resultat = $this->getPdo()->query($sql)->fetchAll();
            return $resultat;
        }
    }


?>