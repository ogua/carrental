<?php

namespace App\Admin\Extension\Tools;

use Encore\Admin\Table\Tools\AbstractTool;
use Encore\Admin\Facades\Admin;
use App\Models\Studentclass;

class Studentclasstool extends AbstractTool
{
    protected function script()
    {

        return <<<EOT
     
EOT;

    }


    public function render()
    {
        Admin::script($this->script());

        $studntclass = Studentclass::where('uniqueid', Admin::user()->uniqueid)->get();

        $uniqid = uniqid();


        return view('admin.Tools.studentclass-tool', compact('studntclass','uniqid'));

    }
}