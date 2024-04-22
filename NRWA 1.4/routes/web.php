<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SelfDriverController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\DailyRentalController;
use App\Http\Controllers\WeeklyRentalController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\OwnsController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CompanyController;

Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
Route::post('/banks', [BankController::class, 'store'])->name('banks.store');
Route::get('/banks/{id}', [BankController::class, 'show'])->name('banks.show');
Route::get('/banks/{id}/edit', [BankController::class, 'edit'])->name('banks.edit');
Route::put('/banks/{id}', [BankController::class, 'update'])->name('banks.update');
Route::delete('/banks/{id}', [BankController::class, 'destroy'])->name('banks.destroy');


Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');
Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store');
Route::get('/owners/{id}', [OwnerController::class, 'show'])->name('owners.show');
Route::get('/owners/{id}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
Route::put('/owners/{id}', [OwnerController::class, 'update'])->name('owners.update');
Route::delete('/owners/{id}', [OwnerController::class, 'destroy'])->name('owners.destroy');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');
Route::get('/drivers/{id}', [DriverController::class, 'show'])->name('drivers.show');
Route::get('/drivers/{id}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
Route::put('/drivers/{id}', [DriverController::class, 'update'])->name('drivers.update');
Route::delete('/drivers/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show');
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

Route::get('/customer_services', [CustomerServiceController::class, 'index'])->name('customer_services.index');
Route::get('/customer_services/create', [CustomerServiceController::class, 'create'])->name('customer_services.create');
Route::post('/customer_services', [CustomerServiceController::class, 'store'])->name('customer_services.store');
Route::get('/customer_services/{id}', [CustomerServiceController::class, 'show'])->name('customer_services.show');
Route::get('/customer_services/{id}/edit', [CustomerServiceController::class, 'edit'])->name('customer_services.edit');
Route::put('/customer_services/{id}', [CustomerServiceController::class, 'update'])->name('customer_services.update');
Route::delete('/customer_services/{id}', [CustomerServiceController::class, 'destroy'])->name('customer_services.destroy');

Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
Route::get('/feedbacks/{id}', [FeedbackController::class, 'show'])->name('feedbacks.show');
Route::get('/feedbacks/{id}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
Route::put('/feedbacks/{id}', [FeedbackController::class, 'update'])->name('feedbacks.update');
Route::delete('/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');

Route::get('/self_drivers', [SelfDriverController::class, 'index'])->name('self_drivers.index');
Route::get('/self_drivers/create', [SelfDriverController::class, 'create'])->name('self_drivers.create');
Route::post('/self_drivers', [SelfDriverController::class, 'store'])->name('self_drivers.store');
Route::get('/self_drivers/{id}', [SelfDriverController::class, 'show'])->name('self_drivers.show');
Route::get('/self_drivers/{id}/edit', [SelfDriverController::class, 'edit'])->name('self_drivers.edit');
Route::put('/self_drivers/{id}', [SelfDriverController::class, 'update'])->name('self_drivers.update');
Route::delete('/self_drivers/{id}', [SelfDriverController::class, 'destroy'])->name('self_drivers.destroy');

Route::get('/chauffeurs', [ChauffeurController::class, 'index'])->name('chauffeurs.index');
Route::get('/chauffeurs/create', [ChauffeurController::class, 'create'])->name('chauffeurs.create');
Route::post('/chauffeurs', [ChauffeurController::class, 'store'])->name('chauffeurs.store');
Route::get('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'show'])->name('chauffeurs.show');
Route::get('/chauffeurs/{chauffeur}/edit', [ChauffeurController::class, 'edit'])->name('chauffeurs.edit');
Route::put('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'update'])->name('chauffeurs.update');
Route::delete('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'destroy'])->name('chauffeurs.destroy');

Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');
Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
Route::get('/rentals/{rental}', [RentalController::class, 'show'])->name('rentals.show');
Route::get('/rentals/{rental}/edit', [RentalController::class, 'edit'])->name('rentals.edit');
Route::put('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.update');
Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy');

Route::get('/daily_rentals', [DailyRentalController::class, 'index'])->name('daily_rentals.index');
Route::get('/daily_rentals/create', [DailyRentalController::class, 'create'])->name('daily_rentals.create');
Route::post('/daily_rentals', [DailyRentalController::class, 'store'])->name('daily_rentals.store');
Route::get('/daily_rentals/{daily_rental}', [DailyRentalController::class, 'show'])->name('daily_rentals.show');
Route::get('/daily_rentals/{daily_rental}/edit', [DailyRentalController::class, 'edit'])->name('daily_rentals.edit');
Route::put('/daily_rentals/{daily_rental}', [DailyRentalController::class, 'update'])->name('daily_rentals.update');
Route::delete('/daily_rentals/{daily_rental}', [DailyRentalController::class, 'destroy'])->name('daily_rentals.destroy');

Route::get('/weekly_rentals', [WeeklyRentalController::class, 'index'])->name('weekly_rentals.index');
Route::get('/weekly_rentals/create', [WeeklyRentalController::class, 'create'])->name('weekly_rentals.create');
Route::post('/weekly_rentals', [WeeklyRentalController::class, 'store'])->name('weekly_rentals.store');
Route::get('/weekly_rentals/{weekly_rental}', [WeeklyRentalController::class, 'show'])->name('weekly_rentals.show');
Route::get('/weekly_rentals/{weekly_rental}/edit', [WeeklyRentalController::class, 'edit'])->name('weekly_rentals.edit');
Route::put('/weekly_rentals/{weekly_rental}', [WeeklyRentalController::class, 'update'])->name('weekly_rentals.update');
Route::delete('/weekly_rentals/{weekly_rental}', [WeeklyRentalController::class, 'destroy'])->name('weekly_rentals.destroy');

Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
Route::get('/bills/create', [BillController::class, 'create'])->name('bills.create');
Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
Route::get('/bills/{bill}', [BillController::class, 'show'])->name('bills.show');
Route::get('/bills/{bill}/edit', [BillController::class, 'edit'])->name('bills.edit');
Route::put('/bills/{bill}', [BillController::class, 'update'])->name('bills.update');
Route::delete('/bills/{bill}', [BillController::class, 'destroy'])->name('bills.destroy');

Route::get('/owns', [OwnsController::class, 'index'])->name('owns.index');
Route::get('/owns/create', [OwnsController::class, 'create'])->name('owns.create');
Route::post('/owns', [OwnsController::class, 'store'])->name('owns.store');
Route::get('/owns/{own}', [OwnsController::class, 'show'])->name('owns.show');
Route::get('/owns/{own}/edit', [OwnsController::class, 'edit'])->name('owns.edit');
Route::put('/owns/{own}', [OwnsController::class, 'update'])->name('owns.update');
Route::delete('/owns/{own}', [OwnsController::class, 'destroy'])->name('owns.destroy');

Route::get('/individuals', [IndividualController::class, 'index'])->name('individuals.index');
Route::get('/individuals/create', [IndividualController::class, 'create'])->name('individuals.create');
Route::post('/individuals', [IndividualController::class, 'store'])->name('individuals.store');
Route::get('/individuals/{individual}', [IndividualController::class, 'show'])->name('individuals.show');
Route::get('/individuals/{individual}/edit', [IndividualController::class, 'edit'])->name('individuals.edit');
Route::put('/individuals/{individual}', [IndividualController::class, 'update'])->name('individuals.update');
Route::delete('/individuals/{individual}', [IndividualController::class, 'destroy'])->name('individuals.destroy');

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');


Route::prefix('api')->group(function () {
    Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
    Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
    Route::post('/banks', [BankController::class, 'store'])->name('banks.store');
    Route::get('/banks/{id}', [BankController::class, 'show'])->name('banks.show');
    Route::get('/banks/{id}/edit', [BankController::class, 'edit'])->name('banks.edit');
    Route::put('/banks/{id}', [BankController::class, 'update'])->name('banks.update');
    Route::delete('/banks/{id}', [BankController::class, 'destroy'])->name('banks.destroy');
});

Route::prefix('api')->group(function () {
    Route::get('/individuals', [IndividualController::class, 'index']);
    Route::post('/individuals', [IndividualController::class, 'store']);
    Route::get('/individuals/{id}', [IndividualController::class, 'show']);
    Route::put('/individuals/{id}', [IndividualController::class, 'update']);
    Route::delete('/individuals/{id}', [IndividualController::class, 'destroy']);
});

Route::prefix('api')->group(function () {
    Route::get('/owns', [OwnsController::class, 'index']);
    Route::post('/owns', [OwnsController::class, 'store']);
    Route::get('/owns/{id}', [OwnsController::class, 'show']);
    Route::put('/owns/{id}', [OwnsController::class, 'update']);
    Route::delete('/owns/{id}', [OwnsController::class, 'destroy']);
});

/**
 * @OA\Info(
 *      title="tuga i buga",
 *      version="1.0.0",
 *      description="LOs",
 *      @OA\Contact(
 *          email="andrija.soldo@fsre.sum.ba"
 *      ),
 *      @OA\License(
 *          name="MIT License",
 *          url="https://opensource.org/licenses/MIT"
 *      )
 * )
 */


Route::get('/', function () {
    return view('welcome');
});
