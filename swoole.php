<?php

class swoole {
    private $serv;
    public function __construct()
    {
        $this->serv = new swoole_server("0.0.0.0",9501);
    }
    public function start(){
        $this->serv->on('start',function ($server){
            echo 123;
        });
    }
}

