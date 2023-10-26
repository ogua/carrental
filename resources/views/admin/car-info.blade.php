 <div class="card card-solid">
        <div class="card-body">

          <a href="/admin/available-cars" class="btn btn-default"><i class="fas fa-reply"></i> Back</a>

          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{ $data->brand }} - {{ $data->model }}</h3>
              <div class="col-12">
                <img src="{{ asset('storage') }}/{{ $data->avatar }}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ $data->brand }} - {{ $data->model }}</h3>
              <P>Plate number: {{ $data->platenum }}</P>
              <p>Features: {{ $data->features }}</p>

              <hr>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Color {{ $data->color }}
                  <br>
                  <i class="fas fa-circle fa-2x text-{{ $data->color }}"></i>
                </label>
              </div>

              <hr>

              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">{{ $data->fueltype }}</span>
                  <br>
                  Fuel Type
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">{{ $data->capacity }}</span>
                  <br>
                  capacity
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">{{ $data->transmission }}</span>
                  <br>
                  Transmission
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Gh¢{{ $data->price }}
                </h2>
                <h4 class="mt-0">
                  <small>Per Day </small>
                </h4>
              </div>

              <div class="mt-4">
                <a href="/admin/book-cars/{{ $data->uniqueid }}">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Book Car
                </div></a>

              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">

            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                
                <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Features</a>
                <a class="nav-item nav-link active" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="true">Trip Rating </a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $data->features }}</div>

              <div class="tab-pane fade show active" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">

            <div class="col-md-12">

              @foreach($data->trip as $row)
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ $row->user->avatar }}" alt="user image">
                        <span class="username">
                          <a href="#">{{ $row->user->name }}</a>
                        </span>
                        <span class="description">Shared publicly - {{ date('m-d-Y',strtotime($row->created_at)) }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{ $row->review }} ::- Rate: ({{ $row->rate }}/10)
                      </p>
                      
                    </div>
                    <!-- /.post -->
                    @endforeach

              <form action="#" method="post" id="savereview">
                  <input type="hidden" value="{{ $data->id }}" name="car_id">
                  <div class="form-group">
                    <label for="">Rate Trip 1 - 10 </label>
                    <input type="text" class="form-control" name="rate">
                  </div>
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send review</button>
                    </span>
                  </div>
                </form>      
          </div>
          <!-- /.col -->
                
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
</div>
      <!-- /.card -->
<script type="text/javascript">
  $('document').ready(function(){

        $("#savereview").on("submit",function(e){
          e.preventDefault();

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
              url: '/admin/save-review',
              type: 'POST',
              contentType: false,
              processData: false,
              cache: false,
              data: new FormData(this),
              success: function(data){

                $.admin.reload("Review recorded Successfully!");
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


  