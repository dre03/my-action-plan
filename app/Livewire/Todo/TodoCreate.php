<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;

class TodoCreate extends Component
{
    public $agenda;
    public $priority;

    protected $rules = [
        'agenda' => 'required|min:3',
        'priority' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(){

        $this->validate();

        Todo::create([
            'agenda' => $this->agenda,
            'priority' => $this->priority,
            'status' => 'not_completed_yet',
        ]);
        session()->flash('status', 'Agenda successfully added.');
        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.todo.todo-create');
    }
}
