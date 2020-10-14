<?php
namespace Models;

class Genre {
    private $name;
    private $idMovies;

    public function __construct() {
        $this->idMovies = array();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getIdMovies() {
        return $this->idMovies;
    }

    public function setIdMovies($idMovies) {
        $this->idMovies = $idMovies;
    }
    
    public function addIdMovie($idMovie) {
        array_push($this->idMovies, $idMovie);
    }
}
?>