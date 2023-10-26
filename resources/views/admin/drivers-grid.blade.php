<div class="row">
  @forelse($table->rows() as $row)
@php
//dd($row->status);
@endphp

  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                
                <div class="card-header">
        <div class="box-header with-border">
            <h3 class="box-title"> {!! $row->column('name') !!}</h3>
        </div>
    <div class="box-header with-border">
        <div class="pull-right">
           {{--  {!! $table->renderExportButton() !!} --}}
        </div>
        <span>
        </span>
    </div>

  </div>

                <div class="card-header text-muted border-bottom-0">
                  <div class="text-right">
                    {!! $row->column('__actions__') !!}
                  </div>
                </div>
          
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>
                        
                      {!! $row->column('status') !!}
                      
                        </b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: {!! $row->column('email') !!}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {!! $row->column('phone') !!}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      {!! $row->avatar !!}
                    </div>
                  </div>
                </div>
        </div>
</div>
@empty

      <div class="col-md-12">
              @include('encore-admin.views.table.empty-table')
      </div>


@endforelse
</div>
