<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Tymon\JWTAuth\Http\Parser\AuthHeaders;

class TaskListComponent extends Component
{
    public bool $is_create = false;

    public $form;

    public $name;

    public $description;

    public $due_date;

    public $status;

    public $is_form_modal_visible = false;

    public function render()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->latest('id')->get();

        return view('livewire.task-list-component', [
            "tasks" => $tasks
        ]);
    }

    public function openPopup($isCreate)
    {
        if ($isCreate) {
            $this->is_create = ! $this->is_create;
            $this->is_form_modal_visible = true;
        }
    }

    public function closePopup()
    {
        $this->is_create = false;
        $this->is_form_modal_visible = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required',
        ]);

        $task = Task::make([
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'status' => $this->status,
        ]);

        $task = $task->user()->associate(Auth::user());
        $task->save();

        $this->closePopup();
    }
}
