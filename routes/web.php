<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Employee\MenuListPage;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Machine\MachineFormPage;
use App\Http\Livewire\Machine\MachineListPage;
use App\Http\Livewire\Employee\EmployeeFormPage;
use App\Http\Livewire\Employee\EmployeeListPage;
use App\Http\Livewire\Employee\RolePermissionPage;
use App\Http\Livewire\MachineryList\MachineryListEnd;
use App\Http\Livewire\EmployeeList\EmployeeListReport;
use App\Http\Livewire\LeaveConfig\LeaveConfigListPage;
use App\Http\Livewire\MachineryList\MachineryListEdit;
use App\Http\Livewire\MachineryList\MachineryListForm;
use App\Http\Livewire\MachineryList\MachineryListPage;
use App\Http\Livewire\MachineGroup\MachineGroupListPage;
use App\Http\Livewire\DepartmentList\DepartmentListReport;
use App\Http\Livewire\LeaveApproval\LeaveApprovalListPage;
use App\Http\Livewire\MachineSystem\MachineSystemListPage;
use App\Http\Livewire\MachineService\MachineServiceListPage;
use App\Http\Livewire\IsoDocumentControl\DocumentControlTypeList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlGroupList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlMasterList;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctList;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctPlanForm;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctPlanList;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctBackupList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[DashboardController::class,'index'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'employees',
    'as' => 'employee.',
    'middleware' =>  ['auth','permission:employees'],
],function(){
    Route::get('/', EmployeeListPage::class)->name('list');
    Route::get('/create', EmployeeFormPage::class)->name('create');
    Route::get('/update/{id}', EmployeeFormPage::class)->name('update');
    Route::get('/rloe-permission/{id}', RolePermissionPage::class)->name('rloe.permission');
});

// MTN //
Route::group([
    'prefix' => 'machineservices',
    'as' => 'machineservice.',
    'middleware' =>  ['auth','permission:machineservices']
],function(){
    Route::get('/', MachineServiceListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machinesystems',
    'as' => 'machinesystem.',
    'middleware' =>  ['auth','permission:machinesystems']
],function(){
    Route::get('/', MachineSystemListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machinegroups',
    'as' => 'machinegroup.',
    'middleware' =>  ['auth','permission:machinegroups']
],function(){
    Route::get('/', MachineGroupListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machines',
    'as' => 'machine.',
    'middleware' =>  ['auth','permission:machines']
],function(){
    Route::get('/', MachineListPage::class)->name('list');
    Route::get('/create', MachineFormPage::class)->name('create');
    Route::get('/update/{id}', MachineFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'machinerylists',
    'as' => 'machinerylist.',
    'middleware' =>  ['auth','permission:machinerylists'],
],function(){
    Route::get('/', MachineryListPage::class)->name('list');
    Route::get('/create', MachineryListForm::class)->name('create');
    Route::get('/update/{id}', MachineryListForm::class)->name('update');
    Route::get('/edit/{id}', MachineryListEdit::class)->name('edit');
    Route::get('/end/{id}', MachineryListEnd::class)->name('end');
});
// MTN END //

// EMP //
Route::group([
    'prefix' => 'departmentlists',
    'as' => 'departmentlist.',
    'middleware' =>  ['auth','permission:departmentlists'],
],function(){
    Route::get('/', DepartmentListReport::class)->name('list');
});

Route::group([
    'prefix' => 'employeelists',
    'as' => 'employeelist.',
    'middleware' =>  ['auth','permission:employeelists'],
],function(){
    Route::get('/', EmployeeListReport::class)->name('list');
});

Route::group([
    'prefix' => 'leaveconfigs',
    'as' => 'leaveconfig.',
    'middleware' =>  ['auth','permission:leaveconfigs'],
],function(){
    Route::get('/', LeaveConfigListPage::class)->name('list');
});

Route::group([
    'prefix' => 'leaveapprovals',
    'as' => 'leaveapproval.',
    'middleware' =>  ['auth','permission:leaveapprovals'],
],function(){
    Route::get('/', LeaveApprovalListPage::class)->name('list');
});
// EMP  END//

// ISO DCC //
Route::group([
    'prefix' => 'documentcontrolgroups',
    'as' => 'documentcontrolgroup.',
    'middleware' =>  ['auth','permission:documentcontrolgroups'],
],function(){
    Route::get('/', DocumentControlGroupList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontroltypes',
    'as' => 'documentcontroltype.',
    'middleware' =>  ['auth','permission:documentcontroltypes'],
],function(){
    Route::get('/', DocumentControlTypeList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolmasterlists',
    'as' => 'documentcontrolmasterlist.',
    'middleware' =>  ['auth','permission:documentcontrolmasterlists'],
],function(){
    Route::get('/', DocumentControlMasterList::class)->name('list');
});
// ISO DCC END //

// ISO ICT //
Route::group([
    'prefix' => 'documentcontrolictcomlists',
    'as' => 'documentcontrolictcomlist.',
    'middleware' =>  ['auth','permission:documentcontrolictcomlists'],
],function(){
    Route::get('/', DocumentControlIctList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolictbackups',
    'as' => 'documentcontrolictbackup.',
    'middleware' =>  ['auth','permission:documentcontrolictbackups'],
],function(){
    Route::get('/', DocumentControlIctBackupList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolictplans',
    'as' => 'documentcontrolictplan.',
    'middleware' =>  ['auth','permission:documentcontrolictplans'],
],function(){
    Route::get('/', DocumentControlIctPlanList::class)->name('list');
    Route::get('/create', DocumentControlIctPlanForm::class)->name('create');
    Route::get('/update/{id}', DocumentControlIctPlanForm::class)->name('update');
});
// ISO ICT END //