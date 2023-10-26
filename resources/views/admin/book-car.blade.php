 <div class="card card-solid">
        <div class="card-body">

          <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fas fa-reply"></i> Back</a>

          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{ $data->brand }} - {{ $data->model }}</h3>
              <div class="col-12">
                <img src="{{ asset('storage') }}/{{ $data->avatar }}" class="product-image" alt="Product Image">
              </div>

              <div class="col-12" style="margin-top: 20px;">

               <h2>{{ $data->brand }} - {{ $data->model }} Booking For the Month</h2> 

              @php
               $bbk = App\Models\Booking::whereMonth('created_at', date('m'))
               ->where('car_id',$data->id)->get();
              @endphp

              <div class="row">
                @foreach($bbk as $row)
                <div class="col-md-4" style="margin-top: 10px;">
                  <a href="#" class="btn btn-info">{{ $row->start }} - {{ $row->end }}</a>
                </div>
                @endforeach
              </div>

              </div>


            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ $data->brand }} - {{ $data->model }}</h3>
              <p>Plate number: {{ $data->platenum }}</p>
              <p>Features: {{ $data->features }}</p>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Gh¢{{ $data->price }}
                </h2>
                <h4 class="mt-0">
                  <small>Per Day </small>
                </h4>
              </div>

              <form action="#" method="post">
                @csrf

                <input type="hidden" class="form-control" id="vid" value="{{ $data->id }}"  placeholder="vid">

                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Pickup Date</label>
                    <div class="">
                      <input type="date" class="form-control" id="pickupdate" placeholder="Pickup Date">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Returning Date</label>
                    <div class="">
                      <input type="date" class="form-control" id="returndate" placeholder="Returning Date">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Choose Driver</label>
                    <select class="custom-select" id="driver">
                      <option></option>
                      @foreach($driver as $row)
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="mt-4">
                    <a href="#" id="savebooking">
                    <div class="btn btn-primary btn-lg btn-flat">
                      <i class="fas fa-cart-plus fa-lg mr-2"></i>
                      Book Now
                    </div></a>

                  </div>
                  
                  
                </div>

              </form>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
</div>
<!-- /.card -->
<script type="text/javascript">
  $('document').ready(function(){

        $("#savebooking").off("click").on("click",function(e){
          e.preventDefault();

          var vid = $("#vid").val();
          var pickupdate = $("#pickupdate").val();
          var returndate = $("#returndate").val();
          var driver = $("#driver").val();


          if(pickupdate == ""){
            return;
          }

          if(returndate == ""){
            return;
          }

          if(driver == ""){
            return;
          }

          swal({
            title: "Are you sure?",
            text: "",
            icon: "warning",
            buttons: ['Cancel','Yes Proceed'],
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

             var _token = $('meta[name=csrf-token]').attr('content');     
             $.ajax({
              beforeSend: function(){
                $.LoadingOverlay("show");
              },
              complete: function(){
                $.LoadingOverlay("hide");
              }, 
              url: '/admin/save-booking',
              type: 'POST',
              //contentType: false,
              //processData: false,
              //cache: false,
              data: {_token : _token , vid: vid, pickupdate: pickupdate, returndate: returndate, driver: driver},
              success: function(data){

                alert("Booking recorded successfully!");

                var printurl = '/admin/booking-invoice/'+data;

                window.location.href = printurl;

              },
              error: function (data) {
                console.log('Error:', data);
                $("#msg").text(data.message).show();
              }
            });  

           }
         });


        });

  });

</script>
