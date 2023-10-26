<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Updatesbooking extends RowAction
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
        ->options([3 => 'Cancel', 1 => 'Awaiting Payment', 2 => 'Processed', 4 => 'Read For Pickup', 5 => 'Car returned'])->required();
    }
}