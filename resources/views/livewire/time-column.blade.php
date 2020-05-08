<div style="min-width: 6rem">
    <div class="border h-12"></div>
    @foreach($timeSlots as $timeSlot)
        <div class="border h-32 relative -mt-px">
            <div class="grid grid-cols-1 grid-rows-4">
                <div class="h-8 text-xs text-gray-600 flex justify-center items-center">
                    {{ today()->setHour($timeSlot)->format('h:i A') }}
                </div>
            </div>
        </div>
    @endforeach
</div>
