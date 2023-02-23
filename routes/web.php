<?php

use Illuminate\Support\Facades\Route;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'machineservices',
    'as' => 'machineservice.'
],function(){
    Route::get('/', MachineServiceListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machinesystems',
    'as' => 'machinesystem.'
],function(){
    Route::get('/', MachineSystemListPage::class)->name('list');
});

Route::group([
    'prefix' => 'machinegroups',
    'as' => 'machinegroup.'
],function(){
    Route::get('/', MachineGroupListPage::class)->name('list');
});
