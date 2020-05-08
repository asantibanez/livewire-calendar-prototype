<?php

namespace App\Http\Livewire;

use App\Appointment;
use Carbon\Carbon;
use Livewire\Component;

class ResourceColumn extends Component
{
    public $resource;

    public $timeSlots;

    public $appointments;

    public $openModal;

    public $title;

    public $selectedTimeSlot;

    public $selectedFraction;

    public function mount($resource, $timeSlots, $appointments)
    {
        $this->resource = $resource;

        $this->timeSlots = $timeSlots;

        $this->appointments = $appointments;

        $this->openModal = false;
    }

    public function timeSlotFractionClick($timeSlot, $fraction)
    {
        $this->selectedTimeSlot = $timeSlot;
        $this->selectedFraction = $fraction;

        $this->openModal = true;
    }

    public function saveAppointment()
    {
        Appointment::create([
            'title' => $this->title,
            'starts_at' => today()->setHour($this->selectedTimeSlot)->setMinutes($this->selectedFraction),
            'ends_at' => today()->setHour($this->selectedTimeSlot)->setMinutes($this->selectedFraction)->addMinutes(15),
            'for' => $this->resource,
        ]);

        $this->openModal = false;

        $this->emitUp('appointmentCreated');
    }

    public function render()
    {
        return view('livewire.resource-column');
    }
}
