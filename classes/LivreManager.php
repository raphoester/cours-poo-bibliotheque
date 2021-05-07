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

        public function selectionner($id){
            $sql = "SELECT * FROM livre WHERE id = $id";
            $resultat = $this->getPdo()->query($sql)->fetch();
            return $resultat;
        }

        public function creer(Livre $livre){
            $sql = "INSERT INTO livre (titre, auteur, genre, isbn, parution, fpoche, prix, editeur, image)
            VALUES(
                $livre->getTitre(),
                $livre->getAuteur(),
                $livre->getGenre(), 
                $livre->getIsbn(), 
                $livre->getParution(),
                $livre->getFpoche(), 
                $livre->getPrix(), 
                $livre->getEditeur(),
                $livre->getImage()
            );";
            $this->getPdo()->exec($sql);
        }
    }


?>