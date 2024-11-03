<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

//login
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    $token = $user->createToken('auth_token')->plainTextToken;
    return response()->json(['token' => $token]);
});

// pembatasan auth
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    });

    Route::apiResource('barangs', BarangController::class);
    Route::apiResource('mutasis', MutasiController::class);
    Route::apiresource('users', UserController::class);
    Route::get('mutasi/barang/{barang_id}', [MutasiController::class, 'detailByBarang']);
    Route::get('mutasi/user/{barang_id}', [MutasiController::class, 'detailByUser']);


});
