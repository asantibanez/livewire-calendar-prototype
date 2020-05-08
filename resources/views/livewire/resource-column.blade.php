<div class="sm:flex-1 w-64 -ml-px">
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
        <div class="border h-32 relative -mt-px">
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
                            <div class="absolute top-0 left-0 bg-blue-200 rounded h-8 w-50 py-1 px-4 text-sm">
                                <div>
                                    {{ $appointment['title'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <div>
        @if($openModal)
            <div class="fixed bottom-0 inset-x-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center z-10">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-sm sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                New Appointment
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-900">
                                    <input
                                        type="text"
                                        class="rounded border w-full p-2"
                                        placeholder="Title"
                                        wire:model.lazy="title"
                                    />
                                </p>
                            </div>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-900">
                                    For {{ $resource }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6">
                        <div class="flex w-full rounded-md shadow-sm">
                            <button type="button"
                                    wire:click="saveAppointment"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
