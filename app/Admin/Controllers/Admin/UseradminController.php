<?php

namespace App\Admin\Controllers\Admin;

use App\Models\Car;
use Encore\Admin\Form;
use App\Models\User;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;
use App\Admin\Actions\Updaterole;
use Spatie\Permission\Traits\syncRoles;

class UseradminController extends AdminController
{
   /**
     * {@inheritdoc}
     */
    public function title()
    {
        return trans('admin.administrator');
    }

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $userModel = config('admin.database.users_model');

        $table = new Table(new User());
        $table->model()->where('location',null);

        $table->column('id', 'ID')->sortable();
        $table->column('username', trans('Email'));
        $table->column('roles')->display(function ($stclass) {

            $stclass = array_map(function ($class) {
                return "<span class='badge badge-info'>{$class['name']}</span>";
            }, $stclass);

            return join('&nbsp;', $stclass);
        });
        $table->column('name', trans('admin.name'));
        $table->column('created_at', trans('admin.created_at'));
        // $table->column('updated_at', trans('admin.updated_at'));

        $table->actions(function (Table\Displayers\Actions $actions) {
            if ($actions->getKey() == 1) {
                $actions->disableDelete();
            }
            $actions->add(new Updaterole());
        });

        

        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $userModel = config('admin.database.users_model');

        $show = new Show($userModel::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('username', trans('Email'));
        $show->field('name', trans('Fullname'));
        $show->field('created_at', trans('admin.created_at'));
        $show->field('updated_at', trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        $userModel = config('admin.database.users_model');

        $form = new Form(new User());

        $userTable = config('admin.database.users_table');
        $connection = config('admin.database.connection');

        $form->display('id', 'ID');
        $form->text('username', trans('Email'))
            ->creationRules(['required', "unique:{$connection}.{$userTable}"])
            ->updateRules(['required', "unique:{$connection}.{$userTable},username,{{id}}"]);

        $form->text('name', trans('Fullname'))->rules('required');
        $form->image('avatar', trans('admin.avatar'));
        $form->password('password', trans('admin.password'))->rules('required|confirmed');
        $form->password('password_confirmation', trans('admin.password_confirmation'))->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });

        $form->ignore(['password_confirmation']);

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });

        $form->saved(function (Form $form) {

            $User = User::findOrFail($form->model()->id);

            $User->syncRoles("Administrator");

        });



        $model->syncRoles($request->role);

        return $form;
    }
}
