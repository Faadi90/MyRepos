<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\QBController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\SecondDbController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\Employee;
use App\Models\product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



$info = "hi how are you?";

$info = Str::of($info)
            ->ucfirst($info)
            ->camel($info)
            ->replaceFirst('hi','Hey',$info);

/*echo "Fluent Strings:</br>";
echo $info;
*/

Route::get('seconddb', [SecondDbController::class, 'seconddb']);

Route::get('/', function () {
    // return view('welcome');
    return 'Hi, Laravel.';
});



Route::view('home','home');

// Route middleware applied.
Route::view('about','about')->middleware('class');

// Route::get('user/{name}',[UserController::class,'users']);
Route::get('user',[UserController::class,'users']);
Route::get('userdata',[UserController::class,'getdata']);
Route::get('apidata',[UserController::class,'apiData']);


// For the Global middleware check age in query-string.
Route::view('noaccess','noaccess');
// For the Group middleware check gender in query-string. 

Route::post('store',[ContactController::class,'contactForm']);
Route::view('contact','contact');

/*Route::group(['middleware' => ['protectedPage']],function(){

Route::post('contact',[ContactController::class,'contactForm']);
Route::view('contact','contact');


});
*/






Route::post('login', [ContactController::class, 'login']);
Route::view('profile','profile');




// This is for changing languages localization:
Route::get('lang/{language}', function($language){

    App::setlocale($language);
    return view('language');
});


// session related routes below:
Route::get('contact', function()
{
    if (session()->has('userinfo')) {
            
        return redirect('profile');
    }

    return view('contact');
});

Route::get('logout', function()
{

    if (session()->has('userinfo')) {
        session()->pull('userinfo',null);
    }
        return redirect('contact');

});

// Crud operations & Route Groupping:

// Route::resource('posts', CrudController::class);
Route::controller(CrudController::class)->group(function(){

Route::get('crud', 'index')->name('crudfront');
Route::post('add', 'create');
Route::get('delete/{id}', 'destroy');
Route::get('crudedit/{id}', 'edit');
Route::post('crudupdate', 'update');

});




// QueryBuilder operation:
Route::get('qb', [QBController::class, 'qbuilder']);

Route::get('joinprac', [QBController::class, 'joinprac']);

// accessors & mutators:
Route::get('accessor', [AboutController::class, 'accessor']);
Route::get('mutator', [AboutController::class, 'mutator']);
Route::get('inlineblade', [AboutController::class, 'inlineBlade']);

// Relation practice:
Route::get('hasone', [RelationController::class, 'hasone']);
Route::get('hasmany', [RelationController::class, 'hasmany']);


// Route Model Binding:
// Route::get('rmbinding/{key:name}', [QBController::class, 'RMBinding']);
Route::get('rmbinding/{key}', [QBController::class, 'RMBinding']);


// Crude via closure method:
// Route::get('inertproduc', function(){

// create:
/*    product::create([

        'name'=>'shoes',
        'image'=>'dummy image',
        'detail'=>'Lorem Ipsum',
        'status'=>true

    ]);

    return "Product inserted.";
*/


// $product = product::get();
// $product = product::all();
// $product = product::findOrFail(1);
// $product = product::where(['name' => 'shoes'])->first();

// update:
    // $data = product::findOrFail(1);
    // $data->update([
    //     'name' => 'Sandles',
    //     'detail' => 'AiroSoft'
    // ]);
    // return !$data?"Operation failed!":"Data updated successfully.";

// Delete:
    // $post = product::findOrFail(5);
    // $post->delete();    
    // return !$post?"Operation failed!":"Data deleted successfully.";


// });



Route::get('relatioin', function(){

    // OneToOne Rrelation:
    // $company = Company::first()->EmployeeDataOne;

    // OneToOne Inverse Relation:
    // $employee = Employee::first()->EmployeeDataBelong;

    // OneToMany Relation:
    // $comp_many = Company::first()->EmployeeDataOne;
                // ->where('name','GFjzHumQjP');

    // OneToOne Through:
    // $comp_through = Company::first();

    $comp_through = Company::first();
    return $comp_through->EmpCommentsMany;

});




// Migration commands:
// php artisan make:migration create_test5_table
// php artisan migrate
// php artisan migrate:reset
// php artisan migrate:rollback --step 3
// php artisan migrate --path=/database/migrations/2020_09_21_141958_create_test5_table.php
// php artisan migrate:refresh
// php artisan make:migration add_status_column_into_table --table=products

// Seeding commands:
// php artisan make:seeder EmployeeSeeder
// php artisan db:seed --class=EmployeeSeeder

// Stub Command:
// php artisan stub:publish
// artisan make:controller  UserController --type=custom
//Guide: https://laravel-news.com/customizing-stubs-in-laravel

// Client side validation via Pasley JS:
// https://parsleyjs.org/doc/index.html

// Select input checker:
// @selected(old('name') == value)

// Set & unSet sesstions:
//Session::put('key','value');
// session::has();
// session::forget('key');
// session::flush('key');
// session::pull('key');

// Redirect via route name:
// return redirect()->route('crudfront',['data'=> $data]);
// return to_route('admin.product');

// Pagination displays with different ways:
// php artisan vendor:publish

// Abort method:
// abort(404);

// Str method using to reduce descripont in listing:
// Str::limit('data','digits','symbol(optional)');

// For tostr show code:
// https://www.youtube.com/watch?v=rYQEp5Vtqac&list=PLDc9bt_00KcLME8wcKFNCF-9nP21L2nB2&index=69


// Git Commands:
// create a new repository on the command line:
// echo "# MyRepos" >> README.md
// git init
// git add README.md
// git commit -m "first commit"
// git branch -M main
// git remote add origin https://github.com/Faadi90/MyRepos.git
// git push -u origin main

// push an existing repository from the command line:
// git remote add origin https://github.com/Faadi90/MyRepos.git
// git branch -M main
// git push -u origin main

 // import code from another repository