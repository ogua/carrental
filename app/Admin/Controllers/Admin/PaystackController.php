<?php

namespace App\Admin\Controllers\Admin;

use App\Models\Paystack;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class PaystackController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'All Transactions';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $grid = new Table(new Paystack());

        $grid->column('reference', __('Ref'));
        $grid->column('customerfirstname', __('Paid By'))->display(function(){
            return $this->customerfirstname.' '.$this->customerothernames;
        });
        $grid->column('customeremail', __('Email'));
        $grid->column('customerphone', __('Phone'));
        $grid->column('amount', __('Amount'))->display(function($amount){
            return $this->currency.' '.$amount/100;
        });
        $grid->column('bank', __('Bank'));
        $grid->column('created_at', __('Paid at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });


        $grid->disableCreateButton();
        $grid->disableActions();
        $grid->actions(function($actions){
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();


            //$actions->add(new Sendmail());
            //$actions->add(new Sendsms());

        });

        $grid->filter(function($filter){

            $filter->disableIdFilter();

            $filter->equal('paymentdate','Paid At')->date();

        });

        $grid->footer(function ($query) {

            $data = $query->sum('amount');
            $currency = 'Gh¢';

            return "<div style='padding: 10px;background-color: #17a2b8; color: #fff;'>Total：$currency ".number_format($data ? : 0,2)."</div>";
        });




        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Paystack::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tid', __('Tid'));
        $show->field('tistatus', __('Tistatus'));
        $show->field('reference', __('Reference'));
        $show->field('uniqueid', __('Uniqueid'));
        $show->field('paytype', __('Paytype'));
        $show->field('urltype', __('Urltype'));
        $show->field('plan', __('Plan'));
        $show->field('month', __('Month'));
        $show->field('amount', __('Amount'));
        $show->field('message', __('Message'));
        $show->field('reponse', __('Reponse'));
        $show->field('paymentdate', __('Paymentdate'));
        $show->field('channel', __('Channel'));
        $show->field('currency', __('Currency'));
        $show->field('ipaddress', __('Ipaddress'));
        $show->field('feecharge', __('Feecharge'));
        $show->field('authcode', __('Authcode'));
        $show->field('cardtype', __('Cardtype'));
        $show->field('bank', __('Bank'));
        $show->field('countrycode', __('Countrycode'));
        $show->field('brand', __('Brand'));
        $show->field('first4', __('First4'));
        $show->field('last4', __('Last4'));
        $show->field('customerfirstname', __('Customerfirstname'));
        $show->field('customerothernames', __('Customerothernames'));
        $show->field('customercode', __('Customercode'));
        $show->field('customeremail', __('Customeremail'));
        $show->field('customerphone', __('Customerphone'));
        $show->field('logstarttime', __('Logstarttime'));
        $show->field('logspenttime', __('Logspenttime'));
        $show->field('logattempts', __('Logattempts'));
        $show->field('logerrors', __('Logerrors'));
        $show->field('studentid', __('Studentid'));
        $show->field('feeid', __('Feeid'));
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
        $form = new Form(new Paystack());

        $form->text('tid', __('Tid'));
        $form->text('tistatus', __('Tistatus'));
        $form->text('reference', __('Reference'));
        $form->text('uniqueid', __('Uniqueid'));
        $form->text('paytype', __('Paytype'));
        $form->text('urltype', __('Urltype'));
        $form->text('plan', __('Plan'));
        $form->text('month', __('Month'));
        $form->text('amount', __('Amount'));
        $form->text('message', __('Message'));
        $form->text('reponse', __('Reponse'));
        $form->text('paymentdate', __('Paymentdate'));
        $form->text('channel', __('Channel'));
        $form->text('currency', __('Currency'));
        $form->text('ipaddress', __('Ipaddress'));
        $form->text('feecharge', __('Feecharge'));
        $form->text('authcode', __('Authcode'));
        $form->text('cardtype', __('Cardtype'));
        $form->text('bank', __('Bank'));
        $form->text('countrycode', __('Countrycode'));
        $form->text('brand', __('Brand'));
        $form->text('first4', __('First4'));
        $form->text('last4', __('Last4'));
        $form->text('customerfirstname', __('Customerfirstname'));
        $form->text('customerothernames', __('Customerothernames'));
        $form->text('customercode', __('Customercode'));
        $form->text('customeremail', __('Customeremail'));
        $form->text('customerphone', __('Customerphone'));
        $form->text('logstarttime', __('Logstarttime'));
        $form->text('logspenttime', __('Logspenttime'));
        $form->text('logattempts', __('Logattempts'));
        $form->text('logerrors', __('Logerrors'));
        $form->text('studentid', __('Studentid'));
        $form->text('feeid', __('Feeid'));
        $form->text('status', __('Status'));

        return $form;
    }
}
