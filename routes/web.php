<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Home redirect
Route::get('/', function () {
    return redirect()->route('contacts.index');
});

// Resource Routes for CRUD
Route::resource('contacts', ContactController::class);

// Custom Route for XML Import
Route::post('contacts/import-xml', [ContactController::class, 'importXML'])->name('contacts.importXML');
