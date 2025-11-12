<?php

namespace App\Livewire;

use Faker\Factory;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public function createUser()
    {
        User::create([
            'name' => Factory::create()->name,
            'email' => Factory::create()->unique()->safeEmail,
            'password' => Hash::make('password'),
        ]);
    }
    public function render()
    {
        return view('livewire.users', [
            'title' => 'User Page',
            'users' => User::all()
        ]);
    }
}
