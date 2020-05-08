<div class="-ml-px" style="min-width: 16rem;">
    <div class="border h-12 text-sm flex justify-center items-center">

        @if($resource == 'Andres')
            <img class="h-8 w-8 rounded-full"
                 src="https://randomuser.me/api/portraits/men/32.jpg" alt=""/>
        @endif
        @if($resource == 'Pamela')
            <img class="h-8 w-8 rounded-full"
                 src="https://randomuser.me/api/portraits/women/44.jpg" alt=""/>
        @endif
        @if($resource == 'Bruno')
            <img class="h-8 w-8 rounded-full"
                 src="https://randomuser.me/api/portraits/men/44.jpg" alt=""/>
        @endif
        @if($resource == 'Sara')
            <img class="h-8 w-8 rounded-full"
                 src="https://pbs.twimg.com/profile_images/501759258665299968/3799Ffxy.jpeg" alt=""/>
        @endif
        <div class="w-2"></div>
        <span>
            {{ $resource }}
        </span>
    </div>
    @foreach($timeSlots as $timeSlot)
        <div class="border h-32 relative -mt-px bg-gray-100">
            <div class="grid grid-cols-1 grid-rows-4">
                @foreach([0,15,30,45] as $fraction)
                    <div
                        wire:click="timeSlotFractionClick({{ $timeSlot }}, {{ $fraction }})"
                        class="{{ !$loop->last ? ' border-b ' : '' }} h-8">

                        @php
                            $timeSlotFractionStartsAt = today()->setHour($timeSlot)->setMinutes($fraction);

                            $appointmentsInTimeSlotFraction = collect($appointments)
                                ->filter(function ($appointment) use ($timeSlotFractionStartsAt) {
                                    $starts_at = Carbon\Carbon::parse($appointment['starts_at']);
                                    return $starts_at->isSameMinute($timeSlotFractionStartsAt);
                                })
                        @endphp

                        @foreach($appointmentsInTimeSlotFraction as $appointment)
                            @include($appointmentComponent, [
                                'key' => $appointment['id'],
                                '$appointment' => $appointment,
                            ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <div>
        @if($openModal)
            <form wire:submit.prevent="saveAppointment">
                <div class="fixed bottom-0 inset-x-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center z-50">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-sm sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div>
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                <svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15,13H16.5V15.82L18.94,17.23L18.19,18.53L15,16.69V13M19,8H5V19H9.67C9.24,18.09 9,17.07 9,16A7,7 0 0,1 16,9C17.07,9 18.09,9.24 19,9.67V8M5,21C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1H18V3H19A2,2 0 0,1 21,5V11.1C22.24,12.36 23,14.09 23,16A7,7 0 0,1 16,23C14.09,23 12.36,22.24 11.1,21H5M16,11.15A4.85,4.85 0 0,0 11.15,16C11.15,18.68 13.32,20.85 16,20.85A4.85,4.85 0 0,0 20.85,16C20.85,13.32 18.68,11.15 16,11.15Z"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    New Appointment for {{ $resource }}
                                </h3>
                                <div class="mt-4">
                                    <p class="text-sm leading-5 text-gray-900">
                                        Title
                                    </p>
                                    <input
                                        type="text"
                                        class="rounded border w-full p-2"
                                        placeholder="Title"
                                        wire:model.lazy="title"
                                    />
                                </div>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-900">
                                        Starts
                                    </p>
                                    <input
                                        type="text"
                                        class="rounded border w-full p-2"
                                        placeholder="Starts"
                                        wire:model.lazy="starts_at"
                                    />
                                </div>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-900">
                                        Ends
                                    </p>
                                    <input
                                        type="text"
                                        class="rounded border w-full p-2"
                                        placeholder="Ends"
                                        wire:model.lazy="ends_at"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <div class="flex w-full rounded-md shadow-sm">
                                <button type="submit"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Save
                                </button>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4">
                            <div class="flex w-full rounded-md shadow-sm">
                                <button type="button"
                                        wire:click="$set('openModal', false)"
                                        class="border inline-flex justify-center w-full rounded-md border px-4 py-2 bg-white text-base leading-6 font-medium text-black shadow-sm hover:bg-gray-100 focus:outline-none focus:border-gray-300 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>

</div>
