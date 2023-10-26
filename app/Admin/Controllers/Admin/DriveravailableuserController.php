<?php

namespace App\Admin\Controllers\Admin;

use App\Models\Driver;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;
use App\Admin\Actions\Ratedriver;
use App\Admin\Actions\View;


class DriveravailableuserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Drivers Available';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Driver());
        $table->model()->where('status',1);

        //$table->column('id', __('Id'));
        //$table->column('uniqueid', __('Uniqueid'));
        $table->column('avatar', __('Avatar'))->image('',100,100);
        $table->column('name', __('Name'));
        $table->column('location', __('Address'))->hide();
        $table->column('idtype', __('Idtype'));
        $table->column('idnumber', __('Idnumber'));
        $table->column('email', __('Email'));
        $table->column('phone', __('Phone'));
        $table->column('license', __('License'))->file();
        $table->column('experience', __('Experience'));

        $table->column('status', __('Status'))->display(function($status){
            if ($status == '1') {
                return '<label class="badge badge-success">Available</label>';
            }else{
                return '<label class="badge badge-info">Unavailable</label>';
            }

        });

        $table->setView('admin.drivers-grid');

        $table->column('created_at', __('created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });

        $table->actions(function ($actions) {
              $actions->disableView();
              $actions->disableEdit();
              $actions->disableDelete();
              $actions->add(new View($actions->row->id));  
              $actions->add(new Ratedriver());
        });

        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Driver::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uniqueid', __('Uniqueid'));
        $show->field('avatar', __('Avatar'));
        $show->field('name', __('Name'));
        $show->field('location', __('Address'));
        $show->field('idtype', __('Idtype'));
        $show->field('idnumber', __('Idnumber'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('license', __('License'));
        $show->field('experience', __('Experience'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Driver());

        if ($form->iscreating()) {

            $form->hidden('uniqueid', __('Uniqueid'))->value(uniqid());
        }
        $form->image('avatar', __('Avatar'));
        $form->text('name', __('FullName'));
        $form->textarea('location', __('Address'));
        $form->select('idtype', __('ID Type'))->options(['Drivers License' => 'Drivers License','Voters ID' => 'Voters ID','Ghana Card' => 'Ghana Card','Others' => 'Others']);
        $form->text('idnumber', __('ID Number'));
        $form->email('email', __('Email'));
        $form->text('phone', __('Phone'));
        $form->file('license', __('Driver License'));
        $form->number('experience', __('Experience'));
        $form->hidden('status', __('Status'))->value(1);

        return $form;
    }
}
