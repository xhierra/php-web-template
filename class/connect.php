<?php


class connect{


    protected $db;

    public function __construct(){
        $this->db = new database();
    }

}