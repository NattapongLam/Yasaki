<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\IsoHr\IsoHrHolder;
use App\Http\Livewire\IsoAsb\IsoAsbHolder;
use App\Http\Livewire\IsoClb\IsoClbHolder;
use App\Http\Livewire\IsoDct\IsoDctHolder;
use App\Http\Livewire\IsoDlv\IsoDlvHolder;
use App\Http\Livewire\IsoHtp\IsoHtpHolder;
use App\Http\Livewire\IsoMch\IsoMchHolder;
use App\Http\Livewire\IsoMld\IsoMldHolder;
use App\Http\Livewire\IsoMtn\IsoMtnHolder;
use App\Http\Livewire\IsoPkg\IsoPkgHolder;
use App\Http\Livewire\IsoPtd\IsoPtdHolder;
use App\Http\Livewire\IsoPtg\IsoPtgHolder;
use App\Http\Livewire\IsoPur\IsoPurHolder;
use App\Http\Livewire\IsoQcc\IsoQccHolder;
use App\Http\Livewire\IsoQmr\IsoQmrHolder;
use App\Http\Livewire\IsoSal\IsoSalHolder;
use App\Http\Livewire\IsoStr\IsoStrHolder;
use App\Http\Livewire\Employee\MenuListPage;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\LeaveType\LeaveTypeList;
use App\Http\Livewire\Machine\MachineFormPage;
use App\Http\Livewire\Machine\MachineListPage;
use App\Http\Livewire\Employee\EmployeeFormPage;
use App\Http\Livewire\Employee\EmployeeListPage;
use App\Http\Livewire\IsoAsb\IsoAsbMcChecksheet;
use App\Http\Livewire\IsoDct\IsoDctMcChecksheet;
use App\Http\Livewire\IsoDlv\IsoDlvMcChecksheet;
use App\Http\Livewire\IsoHtp\IsoHtpMcChecksheet;
use App\Http\Livewire\IsoMch\IsoMchMcChecksheet;
use App\Http\Livewire\IsoMld\IsoMldMcChecksheet;
use App\Http\Livewire\IsoMtn\IsoMtnMcChecksheet;
use App\Http\Livewire\IsoPkg\IsoPkgMcChecksheet;
use App\Http\Livewire\IsoPtg\IsoPtgMcChecksheet;
use App\Http\Livewire\IsoQcc\IsoQccMcChecksheet;
use App\Http\Livewire\IsoStr\IsoStrMcChecksheet;
use App\Http\Controllers\EmployeeReportController;
use App\Http\Livewire\Employee\RolePermissionPage;
use App\Http\Livewire\LeaveDocuno\LeaveDocunoForm;
use App\Http\Livewire\LeaveDocuno\LeaveDocunoList;
use App\Http\Livewire\PackingResult\PackingResult;
use App\Http\Livewire\ProductList\ProductListPage;
use App\Http\Controllers\MachineryReportController;
use App\Http\Livewire\LeaveDocuno\LeaveDocunoExcel;
use App\Http\Livewire\IsoAsb\IsoAsbMcChecksheetForm;
use App\Http\Livewire\IsoDct\IsoDctMcChecksheetForm;
use App\Http\Livewire\IsoDlv\IsoDlvMcChecksheetForm;
use App\Http\Livewire\IsoHtp\IsoHtpMcChecksheetForm;
use App\Http\Livewire\IsoMch\IsoMchMcChecksheetForm;
use App\Http\Livewire\IsoMld\IsoMldMcChecksheetForm;
use App\Http\Livewire\IsoPkg\IsoPkgMcChecksheetForm;
use App\Http\Livewire\IsoPtg\IsoPtgMcChecksheetForm;
use App\Http\Livewire\IsoQcc\IsoQccMcChecksheetForm;
use App\Http\Livewire\IsoStr\IsoStrMcChecksheetForm;
use App\Http\Livewire\MachineryList\MachineryListEnd;
use App\Http\Livewire\EmployeeList\EmployeeListReport;
use App\Http\Livewire\EquipmentList\EquipmentListPage;
use App\Http\Livewire\LeaveConfig\LeaveConfigListPage;
use App\Http\Livewire\MachineryList\MachineryListEdit;
use App\Http\Livewire\MachineryList\MachineryListForm;
use App\Http\Livewire\MachineryList\MachineryListPage;
use App\Http\Livewire\PpeDepartment\PpeDepartmentList;
use App\Http\Livewire\IsoDocumentControlIct\IsoItHolder;
use App\Http\Livewire\MachineGroup\MachineGroupListPage;
use App\Http\Livewire\IsoDocumentControlIct\IsoItkpiList;
use App\Http\Livewire\DepartmentList\DepartmentListReport;
use App\Http\Livewire\LeaveApproval\LeaveApprovalListForm;
use App\Http\Livewire\LeaveApproval\LeaveApprovalListPage;
use App\Http\Livewire\MachineryReport\MachineryReportPage;
use App\Http\Livewire\MachineSystem\MachineSystemListPage;
use App\Http\Livewire\RawmaterialList\RawmaterialListPage;
use App\Http\Livewire\MachineService\MachineServiceListPage;
use App\Http\Livewire\TrasheDepartment\TrasheDepartmentForm;
use App\Http\Livewire\TrasheDepartment\TrasheDepartmentList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlKpiList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlTypeList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlAspecList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlGroupList;
use App\Http\Livewire\LeaveDocunoApproval\LeaveDocunoApprovalList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlHolderList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlMasterList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlPolicyList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlTurtleList;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctList;
use App\Http\Livewire\IsoDocumentControl\DocumentControlRisk9001List;
use App\Http\Livewire\IsoDocumentControl\DocumentControlRisk45001List;
use App\Http\Livewire\IsoDocumentControl\IsoDocumentControlFormMaster;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctPlanForm;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctPlanList;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctBackupList;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctChecksheetList;
use App\Http\Livewire\IsoDocumentControlIct\DocumentControlIctChecksheetExcel;

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
Route::resource('/profiles' , App\Http\Controllers\EmployeeController::class);
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
    Route::get('/mtnmonth', [MachineryReportController::class,'mtnmonth'])->name('mtnmonth.index');  
});
Route::get('/empmtnday', [MachineryReportController::class,'empmtnday'])->name('empmtnday.index'); 
Route::post('/getDataMcListsub' , [MachineryReportController::class,'getDataMcListsub']);  
Route::group([
    'prefix' => 'isomtns',
    'as' => 'isomtn.',
    'middleware' =>  ['auth','role:superadmin|MTN|admin']
],function(){
    Route::get('/', IsoMtnHolder::class)->name('list');
});
Route::group([
    'prefix' => 'mcchkmtns',
    'as' => 'mcchkmtn.',
    'middleware' =>  ['auth','role:superadmin|MTN|admin']
],function(){
    Route::get('/', IsoMtnMcChecksheet::class)->name('list');
});
Route::resource('/mc_check' , App\Http\Controllers\McChecksheetForm::class);
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
    'prefix' => 'leavetypes',
    'as' => 'leavetype.',
    'middleware' =>  ['auth','role:superadmin|HRM']
],function(){
    Route::get('/', LeaveTypeList::class)->name('list');
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

Route::group([
    'prefix' => 'leavedocunos',
    'as' => 'leavedocuno.',
    //'middleware' =>  ['auth','permission:leavedocunos'],
],function(){
    Route::get('/', LeaveDocunoList::class)->name('list');
    Route::get('/create', LeaveDocunoForm::class)->name('create');
    Route::get('/update/{id}', LeaveDocunoForm::class)->name('update');
    Route::get('/excel', LeaveDocunoExcel::class)->name('excel');
});

Route::group([
    'prefix' => 'leavedocapprovals',
    'as' => 'leavedocapproval.',
    //'middleware' =>  ['auth','permission:leavedocapprovals'],
],function(){
    Route::get('/', LeaveDocunoApprovalList::class)->name('list');
});

Route::group([
    'prefix' => 'empreports',
    'as' => 'empreport.',
    // 'middleware' =>  ['auth','role:superadmin|MTN']
],function(){
    Route::get('/emptime', [EmployeeReportController::class,'emptime'])->name('emptime.index');  
    Route::get('/empleave', [EmployeeReportController::class,'empleave'])->name('empleave.index');  
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

Route::group([
    'prefix' => 'documentcontrolformmasterlists',
    'as' => 'documentcontrolformmasterlist.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', IsoDocumentControlFormMaster::class)->name('list');
});

Route::group([
    'prefix' => 'documentcontrolkpis',
    'as' => 'documentcontrolkpi.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlKpiList::class)->name('list');
});
Route::group([
    'prefix' => 'documentcontrolpols',
    'as' => 'documentcontrolpol.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlPolicyList::class)->name('list');
});
Route::group([
    'prefix' => 'documentcontrolturs',
    'as' => 'documentcontroltur.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlTurtleList::class)->name('list');
});
Route::group([
    'prefix' => 'documentcontrolr9001s',
    'as' => 'documentcontrolr9001.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlRisk9001List::class)->name('list');
});
Route::group([
    'prefix' => 'documentcontrolr45001s',
    'as' => 'documentcontrolr45001.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlRisk45001List::class)->name('list');
});
Route::group([
    'prefix' => 'documentcontrolasps',
    'as' => 'documentcontrolasp.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlAspecList::class)->name('list');
});
Route::resource('/policy' , App\Http\Controllers\PolicyController::class);
Route::group([
    'prefix' => 'trashedeps',
    'as' => 'trashedep.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', TrasheDepartmentList::class)->name('list');
});
Route::resource('/tras-dep' , App\Http\Controllers\TrasheDepartmentForm::class);
Route::group([
    'prefix' => 'ppedeps',
    'as' => 'ppedep.',
    //'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', PpeDepartmentList::class)->name('list');
});
Route::resource('/ppe-dep' , App\Http\Controllers\PpeDepartmentForm::class);
Route::post('/getTypeDatalist' , [App\Http\Controllers\PpeDepartmentForm::class , 'getTypeDatalist']);
Route::post('/getEmp' , [App\Http\Controllers\PpeDepartmentForm::class , 'getEmp']);
Route::resource('/ass-emp' , App\Http\Controllers\AssessEmployee::class);
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

Route::group([
    'prefix' => 'documentcontrolictchecks',
    'as' => 'documentcontrolictcheck.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', DocumentControlIctChecksheetList::class)->name('list');
    Route::get('/excel', DocumentControlIctChecksheetExcel::class)->name('excel');
});

Route::group([
    'prefix' => 'isoits',
    'as' => 'isoit.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', IsoItHolder::class)->name('list');
});

Route::group([
    'prefix' => 'kpiits',
    'as' => 'kpiit.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', IsoItkpiList::class)->name('list');
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
Route::group([
    'prefix' => 'mcchkhtps',
    'as' => 'mcchkhtp.',
    'middleware' =>  ['auth','role:superadmin|HTP|admin']
],function(){
    Route::get('/', IsoHtpMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoHtpMcChecksheetForm::class)->name('edit');
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
Route::group([
    'prefix' => 'mcchkmchs',
    'as' => 'mcchkmch.',
    'middleware' =>  ['auth','role:superadmin|MCH|admin']
],function(){
    Route::get('/', IsoMchMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoMchMcChecksheetForm::class)->name('edit');
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
Route::group([
    'prefix' => 'mcchkptgs',
    'as' => 'mcchkptg.',
    'middleware' =>  ['auth','role:superadmin|PTG|admin']
],function(){
    Route::get('/', IsoPtgMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoPtgMcChecksheetForm::class)->name('edit');
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
Route::group([
    'prefix' => 'mcchkasbs',
    'as' => 'mcchkasb.',
    'middleware' =>  ['auth','role:superadmin|ASB|admin']
],function(){
    Route::get('/', IsoAsbMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoAsbMcChecksheetForm::class)->name('edit');
});
// ISO ASB END//

// ISO PKG //
Route::group([
    'prefix' => 'isopkgs',
    'as' => 'isopkg.',
    'middleware' =>  ['auth','role:superadmin|PKG|admin|PTG']
],function(){
    Route::get('/', IsoPkgHolder::class)->name('list');
});
Route::group([
    'prefix' => 'mcchkpkgs',
    'as' => 'mcchkpkg.',
    'middleware' =>  ['auth','role:superadmin|PKG|admin|PTG']
],function(){
    Route::get('/', IsoPkgMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoPkgMcChecksheetForm::class)->name('edit');
});

Route::group([
    'prefix' => 'packingresults',
    'as' => 'packingresult.',
    'middleware' =>  ['auth','role:superadmin|PKG|admin|PTG']
],function(){
    Route::get('/', PackingResult::class)->name('list');
});
Route::resource('/pkgresult' , App\Http\Controllers\PackingResultController::class);
Route::post('/getProduct' , [App\Http\Controllers\PackingResultController::class , 'getProduct']);
Route::post('/getDetailDate' , [App\Http\Controllers\PackingResultController::class , 'getDetailDate']);
// ISO PKG END//

// ISO QCC //
Route::group([
    'prefix' => 'isoqccs',
    'as' => 'isoqcc.',
    'middleware' =>  ['auth','role:superadmin|QCC|admin']
],function(){
    Route::get('/', IsoQccHolder::class)->name('list');
});
Route::group([
    'prefix' => 'mcchkqccs',
    'as' => 'mcchkqcc.',
    'middleware' =>  ['auth','role:superadmin|QCC|admin']
],function(){
    Route::get('/', IsoQccMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoQccMcChecksheetForm::class)->name('edit');
});
// ISO QCC END//

// ISO MLD //
Route::group([
    'prefix' => 'isomlds',
    'as' => 'isomld.',
    'middleware' =>  ['auth','role:superadmin|MLD|admin']
],function(){
    Route::get('/', IsoMldHolder::class)->name('list');
});
Route::group([
    'prefix' => 'mcchkmlds',
    'as' => 'mcchkmld.',
    'middleware' =>  ['auth','role:superadmin|MLD|admin']
],function(){
    Route::get('/', IsoMldMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoMldMcChecksheetForm::class)->name('edit');
});
// ISO MLD END//

// ISO DLV //
Route::group([
    'prefix' => 'isodlvs',
    'as' => 'isodlv.',
    'middleware' =>  ['auth','role:superadmin|DLV|admin']
],function(){
    Route::get('/', IsoDlvHolder::class)->name('list');
});
Route::group([
    'prefix' => 'mcchkdlvs',
    'as' => 'mcchkdlv.',
    'middleware' =>  ['auth','role:superadmin|DLV|admin']
],function(){
    Route::get('/', IsoDlvMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoDlvMcChecksheetForm::class)->name('edit');
});
// ISO DLV END//

// ISO STR //
Route::group([
    'prefix' => 'isostrs',
    'as' => 'isostr.',
    'middleware' =>  ['auth','role:superadmin|STR|admin']
],function(){
    Route::get('/', IsoStrHolder::class)->name('list');
});
Route::group([
    'prefix' => 'mcchkstrs',
    'as' => 'mcchkstr.',
    'middleware' =>  ['auth','role:superadmin|STR|admin']
],function(){
    Route::get('/', IsoStrMcChecksheet::class)->name('list');
    Route::get('/edit/{id}', IsoStrMcChecksheetForm::class)->name('edit');
});
// ISO STR END//

// ISO CLB //
Route::group([
    'prefix' => 'isoclbs',
    'as' => 'isoclb.',
    'middleware' =>  ['auth','role:superadmin|CLB|admin']
],function(){
    Route::get('/', IsoClbHolder::class)->name('list');
});
// ISO CLB END//

// ISO HR //
Route::group([
    'prefix' => 'isohrs',
    'as' => 'isohr.',
    'middleware' =>  ['auth','role:superadmin|HRM|admin']
],function(){
    Route::get('/', IsoHrHolder::class)->name('list');
});
// ISO HR END//

// ISO PTD //
Route::group([
    'prefix' => 'isoptds',
    'as' => 'isoptd.',
    'middleware' =>  ['auth','role:superadmin|PDT|admin']
],function(){
    Route::get('/', IsoPtdHolder::class)->name('list');
});
// ISO PTD END//

// ISO PUR //
Route::group([
    'prefix' => 'isopurs',
    'as' => 'isopur.',
    'middleware' =>  ['auth','role:superadmin|PUR|admin']
],function(){
    Route::get('/', IsoPurHolder::class)->name('list');
});
// ISO PUR END//


// ISO QMR //
Route::group([
    'prefix' => 'isoqmrs',
    'as' => 'isoqmr.',
    'middleware' =>  ['auth','role:superadmin|admin']
],function(){
    Route::get('/', IsoQmrHolder::class)->name('list');
});
// ISO QMR END//

// ISO QMR //
Route::group([
    'prefix' => 'isosals',
    'as' => 'isosal.',
    'middleware' =>  ['auth','role:superadmin|admin|SAL']
],function(){
    Route::get('/', IsoSalHolder::class)->name('list');
});
// ISO QMR END//

Route::group([
    'prefix' => 'productlists',
    'as' => 'productlist.',
    // 'middleware' =>  ['auth','role:superadmin|admin|SAL']
],function(){
    Route::get('/', ProductListPage::class)->name('list');
});

Route::group([
    'prefix' => 'rawlists',
    'as' => 'rawlist.',
    // 'middleware' =>  ['auth','role:superadmin|admin|SAL']
],function(){
    Route::get('/', RawmaterialListPage::class)->name('list');
});
Route::resource('/rm-rp' , App\Http\Controllers\RawmaterialController::class);
Route::group([
    'prefix' => 'malists',
    'as' => 'malist.',
    // 'middleware' =>  ['auth','role:superadmin|admin|SAL']
],function(){
    Route::get('/', EquipmentListPage::class)->name('list');
});
Route::resource('/ma-rp' , App\Http\Controllers\EquipmentController::class);
Route::resource('/m-sale' , App\Http\Controllers\MainSaleController::class);
Route::resource('/stock-sale' , App\Http\Controllers\StockSaleController::class);
Route::resource('/sale-tip' , App\Http\Controllers\SaleTipController::class);
Route::post('/confirmDelTip' , [App\Http\Controllers\SaleTipController::class , 'confirmDelTip']);
Route::resource('/project' , App\Http\Controllers\ProjectList::class);
Route::resource('/billorder' , App\Http\Controllers\BillOrderList::class);
Route::resource('/skill' , App\Http\Controllers\SkillMatrixList::class);

//QrCodeScan
Route::get('/checksheetmc/{id}' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanChecksheetMc']);
Route::get('/checksheetppe/{id}' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanChecksheetPpe']);
Route::get('/packingstandardbrake' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanPackingStandardBrake']);
Route::get('/packingstandarddisk' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanPackingStandardDisk']);
Route::get('/packingstandardhub' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanPackingStandardHub']);
Route::get('/quality-procedure/{id}' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanQualityProcedure']);
Route::get('/quality-policy/{id}' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanQualityPolicy']);
Route::get('/ysk1-sd-pkg-20' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanPackingPkg14']);
Route::get('/product-fg-sue/{id}' , [App\Http\Controllers\QrCodeScan::class , 'QrcodeScanProductSue']);
