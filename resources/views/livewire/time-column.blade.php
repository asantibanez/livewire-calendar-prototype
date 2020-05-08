<div class="w-32">
    <div class="border h-12">
    </div>
    @foreach($timeSlots as $timeSlot)
        <div class="border h-32 relative -mt-px">
            <div class="grid grid-cols-1 grid-rows-4">
                <div class="border-b h-8 text-xs text-gray-600 flex justify-center items-center">
                    {{ today()->setHour($timeSlot)->format('h:i A') }}
                </div>
                <div class="border-b h-8"></div>
                <div class="border-b h-8"></div>
                <div class="h-8"></div>
            </div>
        </div>
    @endforeach
</div>
