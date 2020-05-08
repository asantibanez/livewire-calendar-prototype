<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InnerCounter extends Component
{
    public $count = 0;

    public $father = 0;

    public function mount($father)
    {
        $this->father = $father;
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function renderFather()
    {
        $this->emitUp('renderFather');
    }

    public function render()
    {
        return view('livewire.inner-counter');
    }
}
