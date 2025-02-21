<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\Title;
use Livewire\Component;

class TodoList extends Component
{
    #[Title('My Plan')]
    public $editingTodoId;
    public $agenda;

    public function render()
    {
        $todos = Todo::latest()->where('status', 'not_completed_yet')->get();
        return view('livewire.todo.todo-list', [
            'todos' => $todos
        ]);
    }

    public function edit($id, $text)
    {
        $this->editingTodoId = $id;
        $this->agenda = $text;
    }

    public function update()
    {
        if($this->editingTodoId){
            $todo = Todo::find($this->editingTodoId);
            if($todo){
                $todo->agenda = $this->agenda;
                $todo->save();
            }
        }
        session()->flash('status', 'Agenda successfully updated');
        return $this->redirect(route('todo-list'), navigate: true);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        session()->flash('status', 'Agenda successfully deleted');
        return $this->redirect('/', navigate:true);
        
    }

    public function completed($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->status = $todo->status === 'completed' ? 'not_completed_yet' : 'completed';
        $todo->save();
        session()->flash('status', 'Completed');
        return $this->redirect(route('todo-list'), navigate: true);
    }
}
