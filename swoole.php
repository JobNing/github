<?php

    $ser = new swoole_server("0.0.0.0",9501);
    $ser->set(array(
       'worker_num'=>4,
       'daemonize'=>true,
        'backlog'=>128
    ));
    $ser->on('connect',function ($ser,$fd){
        echo "success";
    });

