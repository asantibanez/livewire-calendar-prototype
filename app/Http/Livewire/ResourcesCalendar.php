<?php

namespace App\Http\Livewire;

use App\Appointment;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class ResourcesCalendar extends Component
{
    public $resources;

    public $timeSlots;

    public $appointments;

    public $uuid;

    protected $listeners = [
        'appointmentCreated' => 'refreshCalendar'
    ];

    public function mount($resources)
    {
        $this->resources = $resources;

        $this->timeSlots = range(8, 20);

        $this->uuid = Uuid::uuid4()->toString();
    }

    public function refreshCalendar()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function render()
    {
        $this->appointments = Appointment::all();

        return view('livewire.resources-calendar');
    }
}
