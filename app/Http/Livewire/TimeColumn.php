<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TimeColumn extends Component
{
    public $timeSlots;

    public function mount($timeSlots)
    {
        $this->timeSlots = $timeSlots;
    }

    public function render()
    {
        return view('livewire.time-column');
    }
}
