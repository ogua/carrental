<?php

namespace App\Admin\Controllers\Admin;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Booking;
use App\Models\Paystack;
use App\Models\Tripreview;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;
use App\Admin\Actions\Updatecar;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Admin\Controllers\Paystackonlinepayment;
use Matscode\Paystack\Transaction;
use Matscode\Paystack\Utility\Debug;


class CarController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Car';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Car());

        //$table->column('id', __('Id'));
        //$table->column('uniqueid', __('Uniqueid'));
        $table->column('avatar', __('Avatar'))->image('',100,100);
        $table->column('brand', __('Brand'));
        $table->column('model', __('Model'));
        $table->column('myear', __('Myear'));
        $table->column('color', __('Color'));
        $table->column('platenum', __('Platenum'));
        $table->column('capacity', __('Capacity'));
        $table->column('fueltype', __('Fueltype'));
        $table->column('transmission', __('Transmission'));
        //$table->column('status', __('Status'));

        $table->column('status', __('Status'))->display(function($status){
            if ($status == '1') {
                return '<label class="badge badge-success">Active</label>';
            }elseif ($status == '2') {
                return '<label class="badge badge-danger">Maintenance</label>';
            }elseif ($status == '0') {
                return '<label class="badge badge-primary">Unavailable</label>';
            }else{
                return '<label class="badge badge-info">Processing</label>';
            }

        });

        $table->column('price', __('Price per day'))
        ->display(function($price){

            return "Gh¢".number_format($price ?: 0, 2);
        });

        

        $table->column('created_at', __('created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });
        //$table->column('updated_at', __('Updated at'));

        $table->actions(function ($actions) {
              $actions->add(new Updatecar());
        });

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
        $show = new Show(Car::findOrFail($id));

        //$show->field('id', __('Id'));
        //$show->field('uniqueid', __('Uniqueid'));
        $show->field('avatar', __('Avatar'));
        $show->field('brand', __('Brand'));
        $show->field('model', __('Model'));
        $show->field('myear', __('Myear'));
        $show->field('color', __('Color'));
        $show->field('platenum', __('Platenum'));
        $show->field('capacity', __('Capacity'));
        $show->field('fueltype', __('Fueltype'));
        $show->field('transmission', __('Transmission'));
        //$show->field('status', __('Status'));
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
        $form = new Form(new Car());

        if ($form->iscreating()) {

            $form->hidden('uniqueid', __('Uniqueid'))->value(uniqid());
        }
        
        $form->image('avatar', __('Picart'));
        $form->text('brand', __('Brand'))->help('Toyota, Honda, Ford etc');
        $form->text('model', __('Model'));
        $form->year('myear', __('Manufacturing Year'));
        $form->text('color', __('Color'));
        $form->text('platenum', __('License Plate number'));
        $form->text('capacity', __('Capacity'))->help('Maximum number of pasengers');
        $form->select('fueltype', __('Fuel Type'))
        ->options(['Gasoline' => 'Gasoline', 'Diesel' => 'Diesel','Electric' => 'Electric','Petro' => 'Petro']);
        $form->select('transmission', __('Transmission'))->options(['Automatic' => 'Automatic', 'Manual' => 'Manual']);
        $form->textarea('features', __('Features'))->help('Gps, air conditioning, entertainment System, etc');
        $form->text('price', __('Price'))->help('Price per day');


        $form->hidden('status', __('Status'))->value(1);

        return $form;
    }

    public function availablecars(Content $content)
    {
        $data = Car::where('status',1)
        ->latest()->get();

        return $content->title('Available cars')
        ->view('admin.cars',compact('data'));
    }

    public function availablecarinfo(Content $content, $uniqueid)
    {
        $data = Car::where('status',1)
        ->where('uniqueid',$uniqueid)
        ->first();

        return $content->title('Available cars')
        ->view('admin.car-info',compact('data'));
    }

    public function bookcarinfo(Content $content, $uniqueid)
    {
        $data = Car::where('status',1)
        ->where('uniqueid',$uniqueid)
        ->first();

        $driver = Driver::where('status',1)
        ->get();

        return $content->title('Available cars')
        ->view('admin.book-car',compact('data','driver'));
    }


    
    public function savebooking(Request $request)
    {
        
        $from = $request->pickupdate;
        $to = $request->returndate;
        $vid = $request->vid;
        $driver = $request->driver;
        $user = auth()->user()->id;
        $uniqueid = uniqid();

        $nowfrom = new \DateTime($from);
        $nowto = new \DateTime($to);
        $diff = $nowfrom->diff($nowto)->days;
        $ndiff = $diff + 1;

        $car = Car::where('id',$vid)
        ->first();

        $total = $ndiff * $car->price;

        $data = [
            'uniqueid' => $uniqueid,
            'user_id' => $user,
            'car_id' => $vid,
            'driver_id' => $driver,
            'start' => $from,
            'end' => $to,
            'estimateddays' => $ndiff,
            'total' => $total,
            'status' => 1,
            'paid' => 'no'
        ];

        $new = new Booking($data);
        $new->save();

        echo $uniqueid;

    }


    public function savereview(Request $request)
    {

        $data = [
            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'rate' => $request->rate,
            'review' => $request->message,
        ];

        $new = new Tripreview($data);
        $new->save();

        echo 'success';

    }


    public function bookinginvoice(Content $content, $uniqueid)
    {
        $data = Booking::where('uniqueid',$uniqueid)
        ->first();

        return $content->title('Booking receipt')
        ->view('admin.receipt-car',compact('data'));
}


public function paystack(Request $request)
{

 $secretKey = "sk_test_509a7524f08f249f64f446d75d3469e9dd621f26";

  $Transaction = new Paystackonlinepayment($secretKey);

  $callback_url = admin_url('online-payment-success');

  $data = [
    'email'  => $request->email,
    'amount' => $request->amount,
    'metadata' => $request->metadata,
    'callback_url' => $callback_url
 ];

 $response = $Transaction->initialize($data);

 //return $response;
  //dd($response);

 if (isset($response->status) && $response->status === false) {

     return "errorapi";
 }

 //save reference

    $data = [
        'reference' => $response->reference,
        'uniqueid' => $request->uniqueid
    ];

    Paystack::create($data);

   return $response->authorizationUrl;


}

public function handlesuccess(Request $request)
{
    //save into database
    $data = [
        'reference' => $request->get('reference')    
    ];

    $check = Paystack::where('reference', $request->get('reference'))
    ->first();

    if (!$check) {
        Paystack::create($data);
    }


    $secretKey = "sk_test_509a7524f08f249f64f446d75d3469e9dd621f26";

    $Transaction = new Transaction($secretKey);

    $data = $Transaction->verify();

    $status = $data->status;
    $msg = $data->message;


    if ($status) {

        if ($msg == "Verification successful") {

            $data = json_encode($data->data);
            $data = json_decode($data,true);

            $id = $data['id'];
            $trstatus = $data['status'];
            $trid = $data['reference'];
            $amount = $data['amount'];
            $msg = $data['message'];

            $uniqueid = $data['metadata']['uniqueid'] ?? '';
            $paytype = $data['metadata']['paytype'] ?? '';
            $urltype = $data['metadata']['urltype'] ?? '';
            $user_id = $data['metadata']['user_id'] ?? '';
            $driver_id = $data['metadata']['driver_id'] ?? '';
            $car_id = $data['metadata']['car_id'] ?? '';
            $phone = $data['metadata']['phone'] ?? '';

            $userp = Booking::where('uniqueid',$uniqueid)->first();

            $userp->status = 2;
            $userp->paid = "yes";
            $userp->save();

            
            $reponse = $data['gateway_response'];
            $paymentdate = $data['paid_at'];
            $channel = $data['channel'];
            $currency = $data['currency'];
            $ipaddress = $data['ip_address'];
            $feecharge = $data['fees'];

            //bank for Authourisation
            $auth_code = $data['authorization']['authorization_code'];
            $card_type = $data['authorization']['card_type'];
            $bank = $data['authorization']['bank'];
            $country_code = $data['authorization']['country_code'];
            $brand = $data['authorization']['brand'];
            $first4 = $data['authorization']['bin'];
            $last4 = $data['authorization']['last4'];

            //customer_code
            $customer_code = $data['customer']['customer_code'];
            $customer_email = $data['customer']['email'];
            $customer_phone = $data['customer']['phone'];

            $payamount = ($amount/100);

            $data = [
                'tistatus' => $trstatus,
                'tid' => $id,
                'reference' => $trid,
                'uniqueid' => $uniqueid,
                'paytype' => $paytype,
                'urltype' => $urltype,
                'user_id' => $user_id,
                'driver_id' => $driver_id,
                'amount' => $payamount,
                'message' => $msg,
                'reponse' => $reponse,
                'paymentdate' => $paymentdate,
                'channel' => $channel,
                'currency' => $currency,
                'ipaddress' => $ipaddress,
                'feecharge' => $feecharge,
                'authcode' => $auth_code,
                'cardtype' => $card_type,
                'bank' => $bank,
                'countrycode' => $country_code,
                'brand' => $brand,
                'first4' => $first4,
                'last4' => $last4,
                'customerfirstname' =>$userp->user->name,
                'customerothernames' =>$userp->user->name,
                'customercode' => $customer_code,
                'customeremail' =>$customer_email,
                'customerphone' =>$phone,
                'logstarttime' => '',
                'logspenttime' => '',
                'logattempts' => '',
                'logerrors' => '' ,
                'car_id' => $car_id
            ];

            Paystack::where('uniqueid',$uniqueid)->where('reference',$trid)
            ->update($data); 
        }
        
    }

    return Redirect()->to('/admin/payment-success');

}

//reference=3K9D3F2946O4632Pf127

public function handleverify(Request $request)
{
    //$ref = $request->get('reference');

    $check = Paymentapi::where('uniqueid',Admin::user()->uniqueid)->first();

    $secretKey = $check->paystacksecretkey;
    $Transaction = new Transaction($secretKey);

    $response = $Transaction->verify();

    dd($response);
}


public function paymentsuccess(Content $content)
{
    return $content->title('success')
    ->view('admin.payment-success');
}




}
