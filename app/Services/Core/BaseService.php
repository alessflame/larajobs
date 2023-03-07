<?php

namespace App\Services\Core;

class BaseService{
    const STATUS = 'status';
    const DATA = 'data';
    const ERRORS = 'errors';

    protected $status =true;
    protected $response = false;
    protected $errors = false;


    public function parseResponse(){
    return [
        self::STATUS => $this->status,
        self::DATA => $this->response,
        self::ERRORS => $this->errors,
    ];
    }
}


