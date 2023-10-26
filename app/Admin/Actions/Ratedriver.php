<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Driverreview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Ratedriver extends RowAction
{
    public $name = 'Rate driver';

    public function handle(Model $model,Request $request)
    {

        $data = [
            'rate' => $request->status,
            'review' => $request->review,
            'driver_id' => $model->id,
            'user_id' => auth()->user()->id
        ];

        $new = new Driverreview($data);
        $new->save();

        return $this->response()->success('Rating saved successfully!...')->refresh();
    }

    public function form()
    {
        $this->text('status', __('Rate From 1 to 10'));

        $this->textarea('review', __('Review'));
    }
}