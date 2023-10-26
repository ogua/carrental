<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Role;
use Spatie\Permission\Traits\syncRoles;

class Updaterole extends RowAction
{
    public $name = 'Update Role';

    public function handle(Model $model,Request $request)
    {
        
        $model->syncRoles($request->role);

        return $this->response()->success('Updated successfully!...')->refresh();
    }

    public function form()
    {
        $this->select('role', __('Update Role'))
        ->options(Role::all()->pluck('name','name')->toArray())->required();
    }
}