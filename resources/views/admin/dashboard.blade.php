<div class="row">

<div class="col-md-4">
	<div class="small-box bg-info">
		<div class="inner">
			<h3>{{ $user }}</h3>
			<p>Total Users</p>
		</div>
		<div class="icon">
			<i class="fas fa-calendar"></i>
		</div>
		<a href="/admin/auth/users" class="small-box-footer">
			{{ trans('Formfields.Moreinfo') }} <i class="fas fa-arrow-circle-right"></i>
		</a>
	</div>
</div>

<div class="col-md-4">
	<div class="small-box bg-danger">
		<div class="inner">
			<h3>{{ $Car }}</h3>
			<p>Total Cars</p>
		</div>
		<div class="icon">
			<i class="fas fa-calendar"></i>
		</div>
		<a href="/admin/cars" class="small-box-footer">
			{{ trans('Formfields.Moreinfo') }} <i class="fas fa-arrow-circle-right"></i>
		</a>
	</div>
</div>

<div class="col-md-4">
	<div class="small-box bg-success">
		<div class="inner">
			<h3>{{ $Driver }}</h3>
			<p>Total Drivers</p>
		</div>
		<div class="icon">
			<i class="fas fa-calendar"></i>
		</div>
		<a href="/admin/drivers" class="small-box-footer">
			{{ trans('Formfields.Moreinfo') }} <i class="fas fa-arrow-circle-right"></i>
		</a>
	</div>
</div>

@hasanyrole('Administrator')

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Payment Received This Month</span>
                    <span class="info-box-number">Gh¢
                        {{ number_format($pm ?: 0, 2) }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Payment Received Today</span>
                    <span class="info-box-number">Gh¢
                        {{ number_format($pd ?: 0, 2) }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Payment Received This Year</span>
                    <span class="info-box-number">Gh¢
                        {{ number_format($py ?: 0, 2) }}</span>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Booking</span>
                    <span class="info-box-number">{{ $tb }}</span>
                </div>
            </div>
        </div>


        @endhasanyrole

        @hasanyrole('User')

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Booking</span>
                    <span class="info-box-number">{{ $tb }}</span>
                </div>
            </div>
        </div>

        @endhasanyrole

   


</div>