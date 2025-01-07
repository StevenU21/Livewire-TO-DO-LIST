<?php

namespace App\Livewire;

use Livewire\Component;

class TodoList extends Component
{
    public $tasks = [];
    public $newTask = '';

    public $editingIndex = null;
    public $editingText = '';

    public function addTask()
    {
        if ($this->newTask) {
            $this->tasks[] = ['text' => $this->newTask, 'completed' => false];
            $this->newTask = '';
        }
    }

    public function editTask($index)
    {
        $this->editingIndex = $index;
        $this->editingText = $this->tasks[$index]['text'];
    }

    public function deleteTask($index)
    {
        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks);
    }

    public function toggleTask($index)
    {
        $this->tasks[$index]['completed'] = !$this->tasks[$index]['completed'];
    }

    public function updateTask()
    {
        if ($this->editingIndex !== null) {
            $this->tasks[$this->editingIndex]['text'] = $this->editingText;
            $this->editingIndex = null;
            $this->editingText = '';
        }
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
