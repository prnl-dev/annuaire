<?php
class Contact {
    private $_id;
    private $_name;
    private $_firstname;
    private $_tel;

    public function __construct(int $id, string $name, string $firstname, string $tel) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_firstname = $firstname;
        $this->_tel = $tel;
    }
    /*getters*/
    public function getId(){
        return $this->_id;
    }
    public function getName(){
        return $this->_name;
    }
    public function getFirstname(){
        return $this->_firstname;
    }
    public function getTel(){
        return $this->_tel;
    }

    /*setter*/
    public function setTel(int $newTel) {
        $this->_tel = $newTel;
    }

}