<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Updatebooking extends RowAction
{
    public $name = 'Update booking';

    public function handle(Model $model,Request $request)
    {
        $model->status = $request->status;
        $model->save();

        return $this->response()->success('Updated successfully!...')->refresh();
    }

    public function form()
    {
        $this->select('status', __('Update booking'))
        ->options([3 => 'Cancel'])->required();
    }
}