<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Tymon\JWTAuth\Http\Parser\AuthHeaders;

class TaskListComponent extends Component
{
    public $tasks;

    public function mount()
    {
        $user = Auth::user();
        $this->tasks = $user->tasks;
}

    public function render()
    {
        return view('livewire.task-list-component');
    }
}
