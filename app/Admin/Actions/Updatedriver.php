<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Updatedriver extends RowAction
{
    public $name = 'Update Status';

    public function handle(Model $model,Request $request)
    {
        $model->status = $request->status;
        $model->save();

        return $this->response()->success('Updated successfully!...')->refresh();
    }

    public function form()
    {
        $this->select('status', __('Update Status'))
        ->options([1 => 'Available', 0 => 'Unavailable'])->required();
    }
}