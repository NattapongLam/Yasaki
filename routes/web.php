<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Machine\MachineFormPage;
use App\Http\Livewire\Machine\MachineListPage;
use App\Http\Livewire\Employee\EmployeeFormPage;
use App\Http\Livewire\Employee\EmployeeListPage;
use App\Http\Livewire\Employee\RolePermissionPage;
use App\Http\Livewire\MachineGroup\MachineGroupListPage;
use App\Http\Livewire\MachineSystem\MachineSystemListPage;
use App\Http\Livewire\MachineService\MachineServiceListPage;

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

Route::get('/', function () {
    return view('layouts.main');
    //return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

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
    'prefix' => 'employees',
    'as' => 'employee.',
    'middleware' =>  ['auth','permission:employees'],
],function(){
    Route::get('/', EmployeeListPage::class)->name('list');
    Route::get('/create', EmployeeFormPage::class)->name('create');
    Route::get('/update/{id}', EmployeeFormPage::class)->name('update');
    Route::get('/rloe-permission/{id}', RolePermissionPage::class)->name('rloe.permission');
});
