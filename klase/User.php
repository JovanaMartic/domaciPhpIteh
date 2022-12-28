<?php

class User
{
    public $id;
    public $ime;
    public $prezime;
    public $jmbg;
    public $username;
    public $password;
    public $email;

    function __construct($id, $ime, $prezime, $jmbg, $username, $password, $email)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->jmbg = $jmbg;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
