<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Appointment extends Component
{
    public $appointment;

    public function mount($appointment)
    {
        $this->appointment = $appointment;
    }

    public function render()
    {
        return view('livewire.appointment');
    }
}
