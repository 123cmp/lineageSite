<?php

class Server {
    public function __construct($name, $coefficients, $id) {
        $this->name = $name;
        $this->id = $id;
        $this->coefficients = $coefficients;
    }
}