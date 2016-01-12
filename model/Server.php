<?php

class Server {

    public $coefficients = array();
    public $id = 0;
    public $name = "";

    public function __construct($name, $coefficients, $id) {
        $this->name = $name;
        $this->id = $id;
        $this->coefficients = $coefficients;
    }

    public function getMoney($adena) {
        $res = "-";
        foreach($this->coefficients as $coefficient) {
            if((int) $coefficient->count == (int)$adena) $res = $coefficient->value . 'руб';
        }
        return $res;
    }
}