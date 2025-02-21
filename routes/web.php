<?php

use App\Livewire\Plan;
use App\Livewire\Todo\TodoList;
use Illuminate\Support\Facades\Route;

Route::get('/', TodoList::class)->name('todo-list');