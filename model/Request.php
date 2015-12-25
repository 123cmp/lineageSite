<?php

require_once '../modules/client_functions.php';

class Request {
    public function __construct($game, $server, $money, $adena, $nickname, $contact, $comment, $link) {
        echo $game;
        $this->game = mysqli_real_escape_string($link, $game);
        $this->server = mysqli_real_escape_string($link, $server);
        $this->money = mysqli_real_escape_string($link, $money);
        $this->adena = mysqli_real_escape_string($link, $adena);
        $this->nickname = mysqli_real_escape_string($link, $nickname);
        $this->contact = mysqli_real_escape_string($link, $contact);
        $this->comment = mysqli_real_escape_string($link, $comment);
        $this->link = $link;
    }

    public function isValid() {
        $valid = true;
        if(!$this->game || !$this->server || !$this->money || !$this->adena || !$this->nickname || !$this->contact)
            $valid = false;
        if(!is_numeric($this->money) || !is_numeric($this->adena))
            $valid = false;

        $servers = getGameServers($this->link, $this->game);
        if(!$servers || sizeof($servers) <= 0)
            $valid = false;

        $serverExists = false;
        $serverId = 0;
        foreach($servers as $i => $server) {
            if($this->server == $server['server_name']) {
                $serverExists = true;
                $serverId = $i;
            }

        }
        if(!$serverExists) $valid = false;

        $coefficients = getGameCoefficients($this->link, $this->game);
        $serverCoefficients = [];
        foreach($coefficients as $i => $coefficient) {
                if($coefficient["server_id"] === $serverId)
                    array_push($serverCoefficients,
                        new Coefficient($coefficient["cost"], $coefficient["sum"]));
        }

        $coefficientId = findCoefficient($serverCoefficients, $this->adena);
        if(!$coefficientId) $valid = false;






        return $valid;
    }
}