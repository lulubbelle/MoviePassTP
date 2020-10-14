<?php
namespace Models;

class Cinema {
    private $id;
    private $name;
    private $address;
    private $openingTime;
    private $closingTime;
    private $cinemaRoom;
}

public function __construct() {

}

public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getName() {
    return $this->name;
}

public function setName($name) {
    $this->name = $name;
}

public function getAddress() {
    return $this->address;
}

public function setAddress($address) {
    $this->address = $address;
}

public function getOpeningTime() {
    return $this->openingTime;
}

public function setOpeningTime($openingTime) {
    $this->openingTime = $openingTime;
}

public function getClosingTime() {
    return $this->closingTime;
}

public function setClosingTime($closingTime) {
    $return = 1;
    if($closingTime != "00:00")
        $this->closingTime = $closingTime;
    else
        $return = 0;
    return $return;
}

public function getCinemaRoom() {
    return $this->cinemaRoom;
}

public function setCinemaRoom($cinemaRoom) {
    $this->cinemaRoom = $cinemaRoom;
}
}
?>