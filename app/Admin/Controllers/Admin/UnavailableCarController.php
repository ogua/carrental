<?php

namespace App\Admin\Controllers\Admin;

use App\Models\Car;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;
use App\Admin\Actions\Updatecar;

class UnavailableCarController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Car Unavailable';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Car());
        $table->model()->where('status',2);

        //$table->column('id', __('Id'));
        //$table->column('uniqueid', __('Uniqueid'));
        $table->column('avatar', __('Avatar'))->image('',100,100);
        $table->column('brand', __('Brand'));
        $table->column('model', __('Model'));
        $table->column('myear', __('Myear'));
        $table->column('color', __('Color'));
        $table->column('platenum', __('Platenum'));
        $table->column('capacity', __('Capacity'));
        $table->column('fueltype', __('Fueltype'));
        $table->column('transmission', __('Transmission'));
        //$table->column('status', __('Status'));

        $table->column('status', __('Status'))->display(function($status){
            if ($status == '1') {
                return '<label class="badge badge-success">Active</label>';
            }elseif ($status == '2') {
                return '<label class="badge badge-danger">Maintenance</label>';
            }elseif ($status == '0') {
                return '<label class="badge badge-primary">Unavailable</label>';
            }else{
                return '<label class="badge badge-info">Processing</label>';
            }

        });

        $table->column('price', __('Price per day'))
        ->display(function($price){

            return "Gh¢".number_format($price ?: 0, 2);
        });

        $table->column('created_at', __('created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });
        //$table->column('updated_at', __('Updated at'));

        $table->actions(function ($actions) {
              $actions->add(new Updatecar());
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
        $show = new Show(Car::findOrFail($id));

        //$show->field('id', __('Id'));
        //$show->field('uniqueid', __('Uniqueid'));
        $show->field('avatar', __('Avatar'));
        $show->field('brand', __('Brand'));
        $show->field('model', __('Model'));
        $show->field('myear', __('Myear'));
        $show->field('color', __('Color'));
        $show->field('platenum', __('Platenum'));
        $show->field('capacity', __('Capacity'));
        $show->field('fueltype', __('Fueltype'));
        $show->field('transmission', __('Transmission'));
        //$show->field('status', __('Status'));
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
        $form = new Form(new Car());

        if ($form->iscreating()) {

            $form->hidden('uniqueid', __('Uniqueid'))->value(uniqid());
        }
        
        $form->image('avatar', __('Picart'));
        $form->text('brand', __('Brand'))->help('Toyota, Honda, Ford etc');
        $form->text('model', __('Model'));
        $form->year('myear', __('Manufacturing Year'));
        $form->text('color', __('Color'));
        $form->text('platenum', __('License Plate number'));
        $form->text('capacity', __('Capacity'))->help('Maximum number of pasengers');
        $form->select('fueltype', __('Fuel Type'))
        ->options(['Gasoline' => 'Gasoline', 'Diesel' => 'Diesel','Electric' => 'Electric','Petro' => 'Petro']);
        $form->select('transmission', __('Transmission'))->options(['Automatic' => 'Automatic', 'Manual' => 'Manual']);
        $form->textarea('features', __('Features'))->help('Gps, air conditioning, entertainment System, etc');

        $form->text('price', __('Price'))->help('Price per day');

        $form->hidden('status', __('Status'))->value(1);

        return $form;
    }
}
