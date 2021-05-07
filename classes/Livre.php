<?php 

    class Livre{
        private $_id;
        private $_titre;
        private $_auteur;
        private $_genre;
        private $_isbn;
        private $_parution;
        private $_fpoche;
        private $_prix;
        private $_editeur;
        private $_image;

        public const FORMAT_POCHE = 0;
        public const FORMAT_GRAND = 1;

        //CONSTRUCTEUR
        public function __construct($id, $titre, $auteur, $genre, $isbn, $parution, $fpoche, $prix, $editeur, $image){
            $this->setId($id);
            $this->setTitre($titre);
            $this->setAuteur($auteur);
            $this->setGenre($genre);
            $this->setIsbn($isbn);
            $this->setParution($parution);
            $this->setFpoche($fpoche);
            $this->setPrix($prix);
            $this->setEditeur($editeur);
            $this->setImage($image);
        }

        //GETTERS
        public function getId(){
            return $this->_id;
        }
        public function getTitre(){
            return $this->_titre;
        }
        public function getAuteur(){
            return $this->_auteur;
        }
        public function getGenre(){
            return $this->_genre;
        }
        public function getIsbn(){
            return $this->_isbn;
        }
        public function getParution(){
            return $this->_parution;
        }
        public function getFpoche(){
            if($this->_fpoche == self::FORMAT_POCHE){
                return "Poche";
            }
            else{
                return "Grand";
            }
        }
        public function getPrix(){
            return $this->_prix;
        }
        public function getEditeur(){
            return $this->_editeur;
        }
        public function getImage(){
            return $this->_image;
        }

        //SETTERS
        public function setId($id){
            if (is_string($id) && $id != ""){
                $this->_id = $id;
            }
        }
        public function setTitre($titre){
            if (is_string($titre) && $titre != ""){
                $this->_titre = $titre;
            }
        }
        public function setAuteur($auteur){
            if (is_string($auteur) && $auteur != ""){
                $this->_auteur = $auteur;
            }
        }
        public function setGenre($genre){
            if (is_string($genre) && $genre != ""){
                $this->_genre = $genre;
            }
        }
        public function setIsbn($isbn){
            if (is_string($isbn) && $isbn != ""){
                $this->_isbn = $isbn;
            }
        }
        public function setParution($parution){
            $format = 'd-m-Y';
            $d = DateTime::createFromFormat($format, $parution);
            if($d && $d->format($format) == $parution){
                $this->_parution = $parution;
            }
        }
        public function setFpoche($fpoche){
            if(in_array($fpoche, array(self::FORMAT_POCHE, self::FORMAT_GRAND))){
                $this->_fpoche = $fpoche;
            }
        }
        public function setPrix($prix){
            if(is_float($prix) && $prix > 0){
                $this->_prix = $prix;
            }
        }
        public function setEditeur($editeur){
            if (is_string($editeur) && $editeur != ""){
                $this->_editeur = $editeur;
            }
        }
        public function setImage($image){
            if (is_string($image) && $image != ""){
                $this->_image = $image;
            }
        }
    }
?>