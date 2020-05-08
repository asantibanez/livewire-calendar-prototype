@php
    $startsAt = Carbon\Carbon::parse($appointment['starts_at']);
    $endsAt = Carbon\Carbon::parse($appointment['ends_at']);

    $startingFraction = $startsAt->minute/15;

    $durationFractions = abs($startsAt->diffInMinutes($endsAt))/15;
@endphp

<div class="absolute top-0 left-0 h-{{ $durationFractions * 8 }} mt-{{ $startingFraction * 8 }} z-10 w-full"
     wire:click.stop="">
    <div class="rounded rounded h-full flex flex-col overflow-hidden shadow w-full">
        <div class="text-xs font-medium bg-indigo-500 p-2 border-b text-white">
            {{ $startsAt->format('h:i A') }} - {{ $endsAt->format('h:i A') }}
        </div>
        <div class="text-xs bg-gray-800 text-white flex-1 p-2">
            <div>
                {{ $appointment['title'] }}
            </div>
            <div class="mt-2"></div>
            <button class="rounded border p-2" wire:click.stop="postponeOneHour">
                Postpone 1 hour
            </button>
        </div>
    </div>
</div>
