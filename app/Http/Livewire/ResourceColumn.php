<?php

namespace App\Http\Livewire;

use App\Appointment;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class ResourceColumn extends Component
{
    public $resource;

    public $timeSlots;

    public $appointments;

    public $openModal;

    public $title;

    public $starts_at;

    public $ends_at;

    public function mount($resource, $timeSlots, $appointments)
    {
        $this->resource = $resource;

        $this->timeSlots = $timeSlots;

        $this->appointments = $appointments;

        $this->openModal = false;
    }

    public function timeSlotFractionClick($timeSlot, $fraction)
    {
        $this->title = '';

        $this->starts_at = today()
            ->setTime($timeSlot, $fraction)
            ->format('Y-m-d H:i:s')
        ;

        $this->ends_at = today()
            ->setTime($timeSlot, $fraction)->addHour()
            ->format('Y-m-d H:i:s')
        ;

        $this->openModal = true;
    }

    public function saveAppointment()
    {
        Appointment::create([
            'title' => $this->title,
            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,
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
