<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\FruitController;
use App\Models\Photo;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormController;

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

Route::get('/api/student/{id}', [StudentController::class, 'getStudentById']);
Route::get('/students', [StudentController::class, 'showStudents']);

Route::get('/admin/post', function (Request $request) {
    if ($request->is('admin/*')) {
        return 'request path match with "admin/*" pattern';
    }
});

Route::get('/', function (Request $request) {
    echo 'method http: ' . $request->method() . '<br>';
    if ($request->isMethod('get')) {
        echo 'This is get method';
    }
});

Route::get('userIp', function (Request $request) {
    $ipAddress = $request->ip();
    echo "Địa chỉ IP người dùng: {$ipAddress}";
});

Route::get('/form', [FormController::class, 'showForm']);


Route::post('/post', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');
    $ipAddress = $request->ip();

    // In ra thông tin nhập và địa chỉ IP
    echo "Username: $username <br>";
    echo "Password: $password <br>";
    echo "Địa chỉ IP người dùng: $ipAddress";   
});
