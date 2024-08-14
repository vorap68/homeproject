<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Метод возвращает всех зарегистрированных пользователей
     */
    public function allUsers()
    {
        $users = User::all();
        return view('admin.user.all', compact('users'));
    }

    /**
     * Метод возвращает все заказы выбраного  пользователя
     */
    public function ordersForUser(User $user)
    {
        $orders = $user->orders;
        //dd($orders);
        return view('admin.order.all', compact('orders'));
    }

    /**
     *  Метод удаляет выбраного  пользователя
     */
    public function destroy(User $user)
    {
        $success = $user->delete();
        if ($success) {
            session()->flash('success', 'Пользователь удален');
        } else {
            session()->flash('warning', 'Пользователя НЕ удален');
        }
        return redirect()->route('admin.user.all');
    }
}
