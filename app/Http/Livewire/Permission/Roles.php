<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Role;


class Roles extends Component
{

    public function render()
    {
        $roles = Role::where('name', 'like', '%{$this->search}%');

        return view('livewire.permission.roles', compact('roles'));
    }
}
