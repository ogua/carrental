<?php

namespace App\Admin\Controllers\Admin;

use App\Admin\Actions\Admin\role\Addpermission;
use App\Models\Role;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;
use Spatie\Permission\Models\Role as Spartierole;

class RoleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Role';


    public function __construct(){
        //$this->middleware('auth');
    }

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Role());

        $table->column('id', __('Id'));
        $table->column('name',__('name'));
        $table->column('guard_name', __('guardname'));
        $table->column('created_at', __('Created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });
        
        $table->column('updated_at', __('Updated at'))->display(function($updated_at){
            return date('m-d-Y',strtotime($updated_at));
        });

        $table->disableFilter();

        $table->actions(function($actions){

            //$actions->add(new Addpermission());
        });
        
        $table->modalForm();

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
        $show = new Show(Role::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('name'));
        $show->field('guard_name', __('guardname'));
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
        $form = new Form(new Spartierole());

        $form->text('name', __('name'))->required();
        
        return $form;
    }


    










}
