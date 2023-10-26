<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Tripreview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Ratetrip extends RowAction
{
    public $name = 'Rate trip';

    public function handle(Model $model,Request $request)
    {

        $data = [
            'rate' => $request->status,
            'review' => $request->review,
            'car_id' => $model->car->id,
            'user_id' => auth()->user()->id
        ];

        $new = new Tripreview($data);
        $new->save();

        return $this->response()->success('Rating saved successfully!...')->refresh();
    }

    public function form()
    {
        $this->text('status', __('Rate From 1 to 10'));

        $this->textarea('review', __('Review'));
    }
}