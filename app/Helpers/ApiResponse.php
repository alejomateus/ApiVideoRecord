<?php
/**
 * Created by PhpStorm.
 * User: taxque
 * Date: 16/01/17
 * Time: 10:41 PM
 */

namespace App\Helpers;


use Carbon\Carbon;

class ApiResponse
{
    public $code;
    public $message;
    public $data;

    public function __construct($code,$message,$data)
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public function setMessage($message)
    {
        $this->message= $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function response()
    {
        $date_time = Carbon::now();
        $content = [
            'code'    => $this->code,
            'messages'  => $this->message,
            'data'      => $this->data
        ];

        $content['completed_at'] = $date_time->toDateTimeString();
        if($this->code) {
            return response($content, $this->code);
        } else {
            return response($content);
        }
    }
}