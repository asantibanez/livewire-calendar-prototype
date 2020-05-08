<?php

namespace App\Http\Livewire;

class AppointmentDarkWithButton extends Appointment
{
    public function postponeOneHour()
    {
        $appointment = \App\Appointment::find($this->appointment['id']);
        $appointment->starts_at = $appointment->starts_at->addHour();
        $appointment->ends_at = $appointment->ends_at->addHour();
        $appointment->save();

        $this->emitUp('appointmentUpdated');
    }

    public function render()
    {
        return view('livewire.appointment-dark-with-button');
    }
}
