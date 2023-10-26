<div class="row">
	@foreach($data as $row)
	<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{ $row->name }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>
                        @if ($row->status == '1') 
                          <label class="badge badge-success">Available</label>
                      @else
                          <label class="badge badge-info">Unavailable</label>
                      @endif
                        </b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: {{ $row->email }}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ $row->phone }}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{ asset('storage') }}/{{ $row->avatar }}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                {{-- <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div> --}}
        </div>
    </div>
  @endforeach
</div>