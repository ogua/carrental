<div class="container-fluid">
  <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fas fa-reply"></i> Back</a>
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('storage') }}/{{ $data->avatar }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $data->name }}</h3>

                <p class="text-muted text-center">Driver</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $data->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{ $data->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Rate</b> <a class="float-right">3.5</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Review</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @foreach($data->driver as $row)
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

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->