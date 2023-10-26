<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Pay extends RowAction
{
    public $name = 'Pay';

    public $uniqueid;

    public function __construct($uniqueid){
        $this->uniqueid = $uniqueid;
    }

    public function href()
    {
        return '/admin/booking-invoice/'.$this->uniqueid;
    }

    
}