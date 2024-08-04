<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\User;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function (Request $request) { // Inject Request here
    return Inertia::render('Users', [
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

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    return 'Logging user out';
});
