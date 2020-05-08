<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Appointment extends Component
{
    public $appointment;

    public $counter;

    public function mount($appointment)
    {
        $this->appointment = $appointment;
        $this->counter = 0;
    }

    public function increment()
    {
        $this->counter++;
    }

    public function render()
    {
        return view('livewire.appointment');
    }
}
