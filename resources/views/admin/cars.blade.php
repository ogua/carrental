<div class="row">
	@foreach($data as $row)
	<a href="/admin/available-cars/{{ $row->uniqueid }}">
	<div class="col-md-4">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                 <a href="/admin/available-cars/{{ $row->uniqueid }}"> 
                  <img class="img-circle" src="{{ asset('storage') }}/{{ $row->avatar }}" alt="User Image">
                  <span class="username"><a href="#">{{ $row->name }}</a></span>
                  <span class="description">{{ $row->brand }} - {{ $row->model }}</span></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="height: 300px;">
              	<a href="/admin/available-cars/{{ $row->uniqueid }}">
                <img class="img-fluid pad" src="{{ asset('storage') }}/{{ $row->avatar }}" alt="Photo"></a>

                <p></p>
              </div>
              <!-- /.card-body -->              
            </div>
            <!-- /.card -->
          </div></a>
     @endforeach
</div>