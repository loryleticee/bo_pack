<?php


namespace App\Service;


class Crypt
{
    public function cryptWithSalt($tocrypt){
        return hash('sha256',$tocrypt);
    }
}