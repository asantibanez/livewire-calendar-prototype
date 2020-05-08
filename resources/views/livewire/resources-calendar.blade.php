<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden">

            <div class="w-full flex bg-white">
                <livewire:time-column
                    :time-slots="$timeSlots"
                />

                <div class="w-full flex">
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

    </div>
</div>
