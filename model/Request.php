<?php

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
    }
}