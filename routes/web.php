<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ping', function  (Request $request) {
    $connection = DB::connection('mongodb');
    try {
        $connection->command(['ping' => 1]);
        $msg = 'MongoDB is accessible!';
    } catch (Exception $e) {
        $msg = 'You are not connected to MongoDB. Error: ' . $e->getMessage();
    }
    return ['msg' => $msg];
});

