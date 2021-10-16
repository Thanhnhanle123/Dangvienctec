<?php

namespace App\components;

class Recursive{

    private $data;
    private $htmlSelect = '';
    public function __construct($data){
        $this->data = $data;
    }

    public function RecursiveOption($ma, $value , $name ,$dk){
        foreach ($this->data as $dt1) {
            if($value == null){
                $giatri = '';
            }else {
                $giatri = $dt1->$value;
            }
            if($dk == $dt1->$ma){
                $this->htmlSelect .= "<option selected value = ".$dt1->$ma.">".$giatri.' '.$dt1->$name."</option>";
            }else {
                $this->htmlSelect .= "<option value = ".$dt1->$ma.">".$giatri.' '.$dt1->$name."</option>";
            }

        }
        return $this->htmlSelect;
    }
}
