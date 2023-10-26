<?php

namespace App\Admin\Extension\Tools;

use Encore\Admin\Table\Tools\AbstractTool;
use Encore\Admin\Facades\Admin;

class DropDown extends AbstractTool
{
    protected function script()
    {
        $url = Request::fullUrlWithQuery(['date' => '_date_']);

        return <<<EOT

$('#grid-date-picker').datetimepicker({format:'YYYY-MM-DD'}).on("dp.change", function () {

    var url = "$url".replace('_date_', $(this).val());

    $.pjax({container:'#pjax-container', url: url });

});

EOT;

    }


    public function render()
    {
        Admin::script($this->script());

        $date = request('date', date('Y-m-d'));

        return <<<EOT

<div class="btn-group">
    <button type="button" class="btn btn-sm btn-default">操作</button>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li><a href="#">Separated link</a></li>
    </ul>
</div>

EOT;

    }
}