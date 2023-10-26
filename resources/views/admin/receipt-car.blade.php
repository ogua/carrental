@php
 
 $array = 
 [
  'uniqueid' => $data->uniqueid,
  'paytype' => 'car-booking-pay',
  'urltype' => 'car-booking-pay',
  'user_id' =>  $data->user->id,
  'driver_id' =>  $data->driver->id,
  'car_id' =>  $data->car->id,
  'phone' =>  $data->user->phone,
];

$amt = $data->total * 100;
@endphp

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Booking Receipt
                    <small class="float-right">Date: {{ date('m-d-Y',strtotime($data->created_at)) }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  User Info
                  <address>
                    <strong>{{ $data->user->name }}</strong><br>
                    {{ $data->user->location }}<br>
                    Phone: {{ $data->user->phone }}<br>
                    Email: {{ $data->user->username }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Driver's Info
                  <address>
                    <strong>{{ $data->driver->name }}</strong><br>
                    Email: {{ $data->driver->email }}<br>
                    Phone: {{ $data->driver->phone }}<br>
                    Experience: {{ $data->driver->experience }} Years of driving
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{ $data->uniqueid }}</b><br>
                  <br>
                  <b>Order ID:</b> 4F{{ $data->uniqueid }}<br>
                  <b>Pickup Date:</b> {{ $data->start }}<br>
                  <b>Returning Date: {{ $data->end }}</b>
                  <br>
                  <b>Estimated Days: {{ $data->estimateddays }} Day(s)</b>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Brand</th>
                      <th>Model</th>
                      <th>Transmission</th>
                      <th>Plate number</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>{{ $data->car->brand }}</td>
                      <td>{{ $data->car->model }}</td>
                      <td>{{ $data->car->transmission }}</td>
                      <td>{{ $data->car->platenum }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="/img/credit/visa.png" alt="Visa">
                  <img src="/img/credit/mastercard.png" alt="Mastercard">
                  <img src="/img/credit/american-express.png" alt="American Express">
                  <img src="/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due {{ date('m-d-Y',strtotime($data->created_at)) }}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Gh¢{{ number_format($data->total ?: 0, 2) }}</td>
                      </tr>
                      <tr>
                        <th>Tax</th>
                        <td>Gh¢0.00</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>Gh¢{{ number_format($data->total ?: 0, 2) }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                  <form action="/admin/launch-paystack" id="paymentForm" method="post">

                      @csrf

                      <input type="hidden" name="uniqueid" id="uniqueid" class="form-control" value="{{ $data->uniqueid }}">

                      <div class="form-group @error('email')has-error @enderror">
                        <input type="hidden" name="email" id="email" class="form-control" value="{{ $data->user->username }}">
                        <span class="help-block">@error('email'){{ $message }}@enderror</span>
                      </div>

                      <div class="form-group @error('amount')has-error @enderror">
                        <input type="hidden" name="amounts" id="amounts" class="form-control" value="{{ $amt }}" autocomplete="off" required>

                        <input type="hidden" name="amount" id="amount" value="{{ $amt }}" class="form-control" required>

                        <span class="help-block">@error('amount'){{ $message }}@enderror</span>
                      </div>

                      <input type="hidden" name="first-name" id="first-name" value="{{ $data->user->name }}" />

                      <input type="hidden" name="last-name"  value=""/>

                      <input type="hidden" name="metadata" id="metadata" value="{{ json_encode($array) }}" >

                      <button type="submit" class="btn btn-success float-right" id="Pay"><i class="far fa-credit-card"></i>Submit
                    Payment
                  </button>

                    </form>

                  
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</div><!-- /.container-fluid -->

<script type="text/javascript">
  $('document').ready(function(){

      $(document).on("submit","#paymentForm",function(e){
          e.preventDefault();
          var error = 'error api';
          $.ajax({
            beforeSend: function(){
              $.LoadingOverlay("show");
            },
            complete: function(){
              //$.LoadingOverlay("hide");
            },
            url: '/admin/launch-paystack',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            data: new FormData(this),
            success: function(data){

              //console.log(data);
              
              if (data == "errorapi") {

                swal(error, {
                  icon: "warning",
                });

                $.LoadingOverlay("hide");

              }else{
                
                window.location.href=data;
              }

              
            },
            error: function (data) {
              console.log('Error:', data);
            }
          });
        });


  });

</script>