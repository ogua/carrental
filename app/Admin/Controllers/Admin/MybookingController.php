<?php

namespace App\Admin\Controllers\Admin;

use App\Models\Booking;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;
use App\Admin\Actions\Pay;
use App\Admin\Actions\Ratetrip;
use App\Admin\Actions\Updatebooking;

class MybookingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Booking';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Booking());

        $table->model()->where('user_id', auth()->user()->id);

        //$table->column('id', __('Id'));
        $table->column('uniqueid', __('Booking ID'));
        //$table->column('user_id', __('User id'));
        $table->column('car.brand', __('Car Booked'));
        $table->column('driver.name', __('Driver'));
        $table->column('driver.phone', __('Driver Phone'));
        $table->column('duration', __('Duration'))->display(function(){
            return $this->start.' - '.$this->end;
        });
        //$table->column('start', __('Start'));
        //$table->column('end', __('End'));
        $table->column('location', __('Location'))->hide();
        $table->column('total', __('Total'))
        ->display(function($price){

            return "Gh¢".number_format($price ?: 0, 2);
        });

        

        $table->column('status', __('Booking status'))->display(function($status){

            if ($status == '1') {

               return '<label class="badge badge-info">Awaiting Payment </label>';

            }elseif($status == '2'){

                return '<label class="badge badge-success">Processed</label>';

            }elseif($status == '3'){

                return '<label class="badge badge-success">Cancelled</label>';

            }elseif($status == '4'){

                return '<label class="badge badge-info">Read For Pickup</label>';

            }else{

                return '<label class="badge badge-danger">Processing </label>';
            }
        });

        $table->column('Paystatus', __('Payment status'))->display(function(){

            if (isset($this->payed)) {

               return '<label class="badge badge-info">Paid</label>';

            }else{

                return '<label class="badge badge-success">Processing...</label>';

            }
        });

        $table->column('created_at', __('created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });

        $table->disableCreateButton();

        $table->disableFilter();

        $table->actions(function ($actions) {
              $actions->disableView();
              $actions->disableEdit();
              $actions->disableDelete();
              $actions->add(new Pay($actions->row->uniqueid));
              $actions->add(new Ratetrip($actions->row->uniqueid));
              $actions->add(new Updatebooking());
              
        });


        //$table->column('updated_at', __('Updated at'));

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
        $show = new Show(Booking::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uniqueid', __('Uniqueid'));
        $show->field('user_id', __('User id'));
        $show->field('car_id', __('Car id'));
        $show->field('driver_id', __('Driver id'));
        $show->field('start', __('Start'));
        $show->field('end', __('End'));
        $show->field('location', __('Location'));
        $show->field('total', __('Total'));
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
        $form = new Form(new Booking());

        $form->text('uniqueid', __('Uniqueid'));
        $form->text('user_id', __('User id'));
        $form->text('car_id', __('Car id'));
        $form->text('driver_id', __('Driver id'));
        $form->text('start', __('Start'));
        $form->text('end', __('End'));
        $form->text('location', __('Location'));
        $form->text('total', __('Total'));

        return $form;
    }
}
