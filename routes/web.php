<?php

use App\Http\Livewire\AddAtt;
use App\Http\Livewire\Alerts;
use App\Http\Livewire\Approving;
use App\Http\Livewire\AttRecord;
use App\Http\Livewire\BulkInsertProject;
use App\Http\Livewire\Employees;
use App\Http\Livewire\InsertEmployee;
use App\Http\Livewire\InsertProject;
use App\Http\Livewire\InsertTag;
use App\Http\Livewire\Operations;
use App\Http\Livewire\Projects;
use App\Http\Livewire\Tags;
use App\Http\Livewire\TasksList;
use App\Http\Livewire\TodayAttendance;
use App\Http\Livewire\UpdateEmployee;
use App\Http\Livewire\UpdateProject;
use App\Http\Livewire\UpdateTag;
use App\Models\Employee;
use App\Models\TaskStone;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Tags\Tag;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified', 'adminMid'])->get('/approving', Approving::class)->name('approving');
Route::middleware(['auth:sanctum', 'verified', 'adminMid'])->get('/operations', Operations::class)->name('operations');
Route::middleware(['auth:sanctum', 'verified', 'adminMid'])->get('/tasklist', TasksList::class)->name('tasklist');

Route::middleware(['auth:sanctum', 'verified', 'approved'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tags', Tags::class)->name('tags');
    Route::get('/approval', function () {
        return view('not_approved');
    })->name('approval');
    Route::get('/projects', Projects::class)->name('projects');
    Route::get('/employees', Employees::class)->name('employees');
    Route::get('/alerts', Alerts::class)->name('alerts');

    Route::get('/add_employees', InsertEmployee::class)->name('add_employees');
    Route::get('/add_tag', InsertTag::class)->name('add_tag');
    Route::get('/add_proj', InsertProject::class)->name('add_proj');
    Route::get('/bulk_proj/{id}', BulkInsertProject::class);
    //edit
    Route::get('/show_att/{id}', AttRecord::class);
    Route::get('/add_att/{id}', AddAtt::class);

    //show attendance
    Route::get('/edit_employee/{id}', UpdateEmployee::class);
    Route::get('/edit_tag/{name}', UpdateTag::class);
    Route::get('/edit_proj/{id}', UpdateProject::class);

    //Atts
    Route::get('/todayatt', TodayAttendance::class)->name('todayatt');

    //del
    Route::get('/del_tag/{name}', function (Request $request, $name) {
        $tag = Tag::findFromString($name);
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' => 'Delete Tag ' . $tag->name,
        ]);
        $tag->delete();
        return redirect('tags');
    });
    Route::get('/del_proj/{id}', function (Request $request, $id) {
        // Tag::find($id)->delete();
        return redirect('projects');
    });
    Route::get('/del_employee/{id}', function (Request $request, $id) {
        $emp = Employee::find($id);
        TaskStone::create([
            'by' => auth()->user()->name,
            'action' => 'has delete employee ' . $emp->name . ' ID :[' . $id . '] || Userid:[' . $emp->userid . ']',
        ]);
        $emp->delete();
        return redirect('employees');
    });

});
