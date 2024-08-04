<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Home');
    });

    Route::get('/users', function (Request $request) { // Inject Request here
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ]),
            'filters' => $request->only(['search'])
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    });

    Route::post('/users', function (Request $request) { // Inject Request here
        $validate = $request->validate([ // Use the Request instance to call validate
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        User::create($validate);

        return redirect('/users');
    });


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

    Route::post('/logout', [LoginController::class, 'logout']);

});
