<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class View extends RowAction
{
    public $name = 'View';

    public $uniqueid;

    public function __construct($uniqueid){
        $this->uniqueid = $uniqueid;
    }

    public function href()
    {
        return '/admin/driver-info/'.$this->uniqueid;
    }

    
}