<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Ramsey\Uuid\Uuid;

class Counter extends Component
{
    public $count = 0;

    protected $listeners = [
        'renderFather' => 'forceRender',
    ];

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function forceRender()
    {
        $this->count = 10;
    }

    public function render()
    {
        return view('livewire.counter')
            ->with('uuid', Uuid::uuid4()->toString());
    }
}
