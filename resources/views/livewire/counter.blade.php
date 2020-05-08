<div>
    <p>
        Counter
    </p>
    <div style="text-align: center">
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
        <button wire:click="decrement">-</button>
        <br>
        <button wire:click="$refresh">Render Again</button>
    </div>

    @foreach(range(0, $count) as $index)
        <livewire:inner-counter :key="$uuid . '-' . $index" :father="$count"/>
    @endforeach
</div>
