<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/member', [MemberController::class,'index'])->name('member.list');
Route::get('/member/create',[MemberController::class,'create'])->name('member.create');
Route::post('/member', [MemberController::class,'store'])->name('member.add');
Route::get('/member/{teamMember}/edit', [MemberController::class,'edit'])->name('member.edit');
Route::put('/member/{teamMember}/update', [MemberController::class,'update'])->name('member.update');
Route::delete('/member/{teamMember}/destroy', [MemberController::class,'destroy'])->name('member.destroy');




