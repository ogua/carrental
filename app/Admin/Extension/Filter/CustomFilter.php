<?php

namespace App\Admin\Extension\Filter;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Table\Filter\AbstractFilter;

class CustomFilter extends AbstractFilter
{
    protected function script()
    {


    }

    public function render()
    {
        // Inject scripts to current page.
        Admin::script($this->script());

        return parent::render();
    }
}