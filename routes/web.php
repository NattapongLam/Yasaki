<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\IsoAsb\IsoAsbHolder;
use App\Http\Livewire\IsoDct\IsoDctHolder;
use App\Http\Livewire\IsoHtp\IsoHtpHolder;
use App\Http\Livewire\IsoMch\IsoMchHolder;
use App\Http\Livewire\IsoPkg\IsoPkgHolder;
use App\Http\Livewire\IsoPtg\IsoPtgHolder;
use App\Http\Livewire\Employee\MenuListPage;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Machine\MachineFormPage;
use App\Http\Livewire\Machine\MachineListPage;
use App\Http\Livewire\Employee\EmployeeFormPage;
use App\Http\Livewire\Employee\EmployeeListPage;
use App\Http\Livewire\IsoDct\IsoDctMcChecksheet;
use App\Http\Livewire\Employee\RolePermissionPage;
use App\Http\Controllers\MachineryReportController;
use App\Http\Livewire\IsoDct\IsoDctMcChecksheetForm;
use App\Http\Livewire\MachineryList\MachineryListEnd;
use App\Http\Livewire\EmployeeList\EmployeeListReport;
use App\Http\Livewire\LeaveConfig\LeaveConfigListPage;
use App\Http\Livewire\MachineryList\MachineryListEdit;
use App\Http\Livewire\MachineryList\MachineryListForm;
use App\Http\Livewire\MachineryList\MachineryListPage;
use App\Http\Livewire\MachineGroup\MachineGroupListPage;
use App\Http\Livewire\DepartmentList\DepartmentListReport;
use App\Http\Livewire\LeaveApproval\LeaveApprovalListForm;
use App\Http\Livewire\LeaveApproval\LeaveApprovalListPage;
use App\Http\Livewire\MachineryReport\MachineryReportPage;
use App\Http\Livewire\MachineSystem\MachineSystemListPage;
use App\Http\Livewire\MachineService\MachineServiceListPage;
use App\Http\Livewire\IsoDocumentControl\DocumentControlTypeList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlGroupList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlHolderList;
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
    // 'middleware' =>  ['auth','permission:employees'],
    'middleware' =>  ['auth','role:superadmin']
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
    'middleware' =>  ['auth','role:superadmin|MTN']
],function(){
    Route::get('/', MachineServiceListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machinesystems',
    'as' => 'machinesystem.',
    'middleware' =>  ['auth','role:superadmin|MTN']
],function(){
    Route::get('/', MachineSystemListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machinegroups',
    'as' => 'machinegroup.',
    'middleware' =>  ['auth','role:superadmin|MTN']
],function(){
    Route::get('/', MachineGroupListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machines',
    'as' => 'machine.',
    'middleware' =>  ['auth','role:superadmin|MTN']
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
});

Route::group([
    'prefix' => 'machineryreports',
    'as' => 'machineryreport.',
    'middleware' =>  ['auth','permission:machineryreports'],
],function(){
    Route::get('/', MachineryReportPage::class)->name('list');   
    Route::get('/end/{id}', MachineryListEnd::class)->name('end');
});

Route::group([
    'prefix' => 'mtnreports',
    'as' => 'mtnreport.',
    'middleware' =>  ['auth','role:superadmin|MTN']
],function(){
    Route::get('/mtnday', [MachineryReportController::class,'mtnday'])->name('mtnday.index');  
});
Route::post('/getDataMcListsub' , [MachineryReportController::class,'getDataMcListsub']);  

// MTN END //

// EMP //
Route::group([
    'prefix' => 'departmentlists',
    'as' => 'departmentlist.',
    'middleware' =>  ['auth','role:superadmin|HRM']
],function(){
    Route::get('/', DepartmentListReport::class)->name('list');
});

Route::group([
    'prefix' => 'employeelists',
    'as' => 'employeelist.',
    'middleware' =>  ['auth','role:superadmin|HRM']
],function(){
    Route::get('/', EmployeeListReport::class)->name('list');
});

Route::group([
    'prefix' => 'leaveconfigs',
    'as' => 'leaveconfig.',
    'middleware' =>  ['auth','role:superadmin|HRM']
],function(){
    Route::get('/', LeaveConfigListPage::class)->name('list');
});

Route::group([
    'prefix' => 'leaveapprovals',
    'as' => 'leaveapproval.',
    'middleware' =>  ['auth','role:superadmin|HRM']
],function(){
    Route::get('/', LeaveApprovalListPage::class)->name('list');
    Route::get('/create', LeaveApprovalListForm::class)->name('create');
    Route::get('/update/{id}', LeaveApprovalListForm::class)->name('update');
});
// EMP  END//

// ISO DCC //
Route::group([
    'prefix' => 'documentcontrolgroups',
    'as' => 'documentcontrolgroup.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlGroupList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontroltypes',
    'as' => 'documentcontroltype.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlTypeList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolmasterlists',
    'as' => 'documentcontrolmasterlist.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlMasterList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolholderlists',
    'as' => 'documentcontrolholderlist.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlHolderList::class)->name('list');
});
// ISO DCC END //

// ISO ICT //
Route::group([
    'prefix' => 'documentcontrolictcomlists',
    'as' => 'documentcontrolictcomlist.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlIctList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolictbackups',
    'as' => 'documentcontrolictbackup.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlIctBackupList::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolictplans',
    'as' => 'documentcontrolictplan.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlIctPlanList::class)->name('list');
    Route::get('/create', DocumentControlIctPlanForm::class)->name('create');
    Route::get('/update/{id}', DocumentControlIctPlanForm::class)->name('update');
});
// ISO ICT END //

// ISO DCT //
Route::group([
    'prefix' => 'isodcts',
    'as' => 'isodct.',
    'middleware' =>  ['auth','role:superadmin|DCT|admin']
],function(){
    Route::get('/', IsoDctHolder::class)->name('list');
});
Route::group([
    'prefix' => 'mcchkdcts',
    'as' => 'mcchkdct.',
    'middleware' =>  ['auth','role:superadmin|DCT|admin']
],function(){
    Route::get('/', IsoDctMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoDctMcChecksheetForm::class)->name('edit');
});
// ISO DCT END//

// ISO HTP //
Route::group([
    'prefix' => 'isohtps',
    'as' => 'isohtp.',
    'middleware' =>  ['auth','role:superadmin|HTP|admin']
],function(){
    Route::get('/', IsoHtpHolder::class)->name('list');
});
// ISO HTP END//

// ISO MCH //
Route::group([
    'prefix' => 'isomchs',
    'as' => 'isomch.',
    'middleware' =>  ['auth','role:superadmin|MCH|admin']
],function(){
    Route::get('/', IsoMchHolder::class)->name('list');
});
// ISO MCH END//

// ISO PTG //
Route::group([
    'prefix' => 'isoptgs',
    'as' => 'isoptg.',
    'middleware' =>  ['auth','role:superadmin|PTG|admin']
],function(){
    Route::get('/', IsoPtgHolder::class)->name('list');
});
// ISO PTG END//

// ISO ASB //
Route::group([
    'prefix' => 'isoasbs',
    'as' => 'isoasb.',
    'middleware' =>  ['auth','role:superadmin|ASB|admin']
],function(){
    Route::get('/', IsoAsbHolder::class)->name('list');
});
// ISO ASB END//

// ISO PKG //
Route::group([
    'prefix' => 'isopkgs',
    'as' => 'isopkg.',
    'middleware' =>  ['auth','role:superadmin|PKG|admin']
],function(){
    Route::get('/', IsoPkgHolder::class)->name('list');
});
// ISO PKG END//