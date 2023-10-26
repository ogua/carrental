<?php

namespace App\Admin\Controllers\Admin;

use App\Models\Permenu;
use App\Models\Role;
use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Encore\Admin\Table;
use Spatie\Permission\Models\Role as Spartierole;

class PermissionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Permissions';


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
        $table = new Table(new \Spatie\Permission\Models\Permission());

        $table->column('id', __('Id'));
        $table->column('name',__('Formfields.name'));
        $table->column('guard_name', __('Formfields.guardname'));
        $table->column('created_at', __('Created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });
        
        $table->column('updated_at', __('Updated at'))->display(function($updated_at){
            return date('m-d-Y',strtotime($updated_at));
        });

        //$table->disableFilter();

        $table->filter(function($filter){

         $filter->disableIdFilter();

         $filter->like('name', __('Formfields.name'));



        });
        
        $table->modalForm();

        return $table;
    }

    // public function index(Content $content)
    // {
    //     $all = \Spatie\Permission\Models\Permission::where('name','like','%update%')->get();

    //     // foreach ($all as $row) {
    //     //     $single = \Spatie\Permission\Models\Permission::where('id',$row->id)->first();
    //     //     $msg = str_replace('update','create',$single->name);

    //     //     $single->name = $msg;
    //     //     $single->save();
    //     // }

    //     dd($all);
    // }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(\Spatie\Permission\Models\Permission::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Formfields.name'));
        $show->field('guard_name', __('Formfields.guardname'));
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
        $form = new Form(new \Spatie\Permission\Models\Permission());

        $form->text('name', __('Formfields.name'))->required();

        //$form->latlong('latitude', 'longitude', 'Position')->height(500);

        //$form->latlong('latitude', 'longitude', 'Position')->default(['lat' => -28.219820, 'lng' => 28.321250]);

        // $form->saving(function(Form $form){

        //     $data = [
        //        'name'=> $form->name
        //     ];

        //     $role = Spartierole::create($data);

        //     admin_toastr('Role Added Successfully!', 'success');

        //     return redirect('/admin/roles');

        // });

        return $form;
    }


    public function assignpermission(Content $content)
    {
        
        $data = Permenu::all();

        $user = User::where('id',Admin::user()->id)->first();

        //$user->syncPermissions(['updatepostalreceived']);

        //dd($user->permissions()->pluck('name'));

        return $content->title('Assign Permission')
        ->view('admin.permission.assign-permission',compact('data','user'));
    }


    public function assigntostaffpermission($id, Content $content)
    {
       $data = Permenu::orderBy('order','asc')
       ->where('id','!=','4')
       ->get();

        $user = User::where('id',$id)->first();

        $roleid = $user->roles[0]->id;

        $role = \Spatie\Permission\Models\Role::where('id',$roleid)->first();
       

        if ($user->permissions()->count() > 0) {
           
        return $content->title(__('Formfields.assignpermission'))
        ->view('admin.permission.assign-permission',compact('data','user','role'));
        }

        return $content->title(__('Formfields.assignpermission'))
        ->view('admin.permission.assign-permission-role',compact('data','user','role'));
    }


    public function staffpermissionsave(Request $request)
    {
        $id = $request->post('userid');

        $user = User::where('id',$id)->first();

        $user->syncPermissions($request->post('permissions'));

        return __('Formfields.assignpermissionsuccess');

        admin_info(__('Formfields.assignpermissionsuccess'));

        //admin_info('Permisssions Assigned Successfully!');

        return Redirect()->to('/admin/assign-permission-to-staff/'.$id);

    }


    public function assignrole($id, Content $content)
    {
       $data = Permenu::all();

       //dd($data);

        $role = \Spatie\Permission\Models\Role::where('id',$id)->first();

       // dd($role->permissions);

        return $content->title('Assign Permission To Role')
        ->view('admin.permission.assign-role',compact('data','role'));
    }


     public function rolepermissionsave(Request $request)
    {
        $id = $request->post('roleid');

        $role = \Spatie\Permission\Models\Role::where('id',$id)->first();

        $role->syncPermissions($request->post('permissions'));

        //admin_info();
        return __('Formfields.assignpermissionsuccess');

        return Redirect()->to('/admin/assign-role-permission/'.$id);

    }



}
