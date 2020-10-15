<?php
namespace Models;

class CinemaRoom {
    private $id;
    private $cinema;
    private $name;
    private $capacity;
    private $movieTicket;
}

public function __construct() {

}

public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getCinema() {
    return $this->cinema;
}

public function setCinema($cinema) {
    $this->cinema = $cinema;
}

public function getName() {
    return $this->name;
}

public function setName($name) {
    $this->name = $name;
}

public function getCapacity() {
    return $this->capacity;
}

public function setCapacity($capacity) {
    $return = 1;
    if($capacity > 0)
        $this->capacity = $capacity;
    else
        $return = 0;
    return $return;
}

public function getMovieTicket() {
    return $this->movieTicket;
}

public function setMovieTicket($movieTicket) {
    $return = 1;
    if($movieTicket > 0)
        $this->movieTicket = $movieTicket;
    else
        $return = 0;
    return $return;
}
}
?>