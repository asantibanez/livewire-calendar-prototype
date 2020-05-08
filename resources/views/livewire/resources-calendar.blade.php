<div class="overflow-x-auto">
    <div class="inline-block min-w-full overflow-hidden">
        <div class="w-full grid grid-flow-col">

            <livewire:time-column
                :time-slots="$timeSlots"
            />

            @foreach($resources as $resource)
                @php
                    $resourceAppointments = collect($appointments)
                        ->filter(function ($appointment) use ($resource) {
                            return $appointment['for'] == $resource;
                        })
                        ->values()
                        ->toArray()
                @endphp

                <livewire:resource-column
                    :time-slots="$timeSlots"
                    :resource="$resource"
                    :key="$uuid . '-' . $resource"
                    :appointments="$resourceAppointments"
                />
            @endforeach

        </div>
    </div>
</div>
