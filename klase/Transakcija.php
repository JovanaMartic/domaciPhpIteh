<?php

class Transakcija
{
    public $id;
    public $datum;
    public $tip;
    public $valuta;
    public $iznos;
    public $user_id;



    function __construct($id, $datum, $tip, $valuta, $iznos, $user_id)
    {
        $this->id = $id;
        $this->datum = $datum;
        $this->tip = $tip;
        $this->valuta = $valuta;
        $this->iznos = $iznos;
        $this->user_id = $user_id;
    }


    public function addTransakcija($datum, $tip, $valuta, $iznos, $user_id)
    {
        require('../connection.php');

        $query = "INSERT INTO transakcija values (NULL, '$datum', '$tip', '$valuta', '$iznos', '$user_id')";
        return $db_conn->query($query);
    }
}
