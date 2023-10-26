<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.as'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resources([
        'auth/users' => Admin\UserController::class,
        'auth/admin' => Admin\UseradminController::class,
        'cars-under-maintenance' => Admin\MaintenanceCarController::class,
        'cars' => Admin\CarController::class,
        'cars-under-maintenance' => Admin\MaintenanceCarController::class,
        'cars-unavailable' => Admin\UnavailableCarController::class,
        'drivers' => Admin\DriverController::class,
        'drivers-available' => Admin\DriveravailableController::class,
        'available-drivers' => Admin\DriveravailableuserController::class,
        'drivers-unavailable' => Admin\DriverunavailableController::class,
        'online-payments' => Admin\PaystackController::class,
        'online-payments-per-day' => Admin\PaystackperdayController::class,
        'online-payments-per-month' => Admin\PaystackpermonthController::class,
        'bookings' => Admin\BookingController::class,
        'my-booking' => Admin\MybookingController::class,
        'roles'      => Admin\RoleController::class,
        'permissions' => Admin\PermissionController::class,
    ]);

    $router->get('available-cars', 'Admin\CarController@availablecars');

    // $router->get('available-drivers', 'Admin\DriverController@availabledrivers');

    $router->get('driver-info/{id}', 'Admin\DriverController@driverinfo');

    $router->get('available-cars/{uniqueid}', 'Admin\CarController@availablecarinfo');

    $router->get('book-cars/{uniqueid}', 'Admin\CarController@bookcarinfo');

    $router->post('save-booking', 'Admin\CarController@savebooking');

    $router->post('save-review', 'Admin\CarController@savereview');

    $router->get('booking-invoice/{uniqueid}', 'Admin\CarController@bookinginvoice');

    $router->post('launch-paystack', 'Admin\CarController@paystack');

    $router->get('booking-invoice/{uniqueid}', 'Admin\CarController@bookinginvoice');

    $router->get('online-payment-success', 'Admin\CarController@handlesuccess');

    $router->get('payment-success', 'Admin\CarController@paymentsuccess');

    $router->get('booking-cancelled', 'Admin\BookingController@bookingcancelled');

    $router->get('paid-booking', 'Admin\BookingController@paidbooking');

    $router->get('unpaid-booking', 'Admin\BookingController@unpaidbooking');

    $router->get('returned-cars', 'Admin\BookingController@returnedcars');

    $router->get('overdue-return', 'Admin\BookingController@overduereturn');


});
