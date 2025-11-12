<?php

namespace App\Livewire;

use Faker\Factory;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithFileUploads;

    #[Validate('required|string|min:3')]
    public $name = '';

    #[Validate('required|email:dns|max:255|unique:users')]
    public $email = '';

    #[Validate('required|string|min:5')]
    public $password = '';

    #[Validate('image|max:1000')]
    public $avatar;

    public function createNewUser()
    {
        sleep(3); // Simulate a delay for demonstration purposes
        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar'],
        ]);

        // Reset input fields
        $this->reset();

        session()->flash('message', 'User created successfully.');
    }
    public function render()
    {
        return view('livewire.users', [
            'title' => 'User Page',
            'users' => User::all()
        ]);
    }
}
