<div>
    <p>
        Inner Counter
    </p>
    <div style="text-align: center">
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
        <button wire:click="decrement">-</button>
        <br>
        <button wire:click="renderFather">Render Father</button>
        <p>Father {{ $father }}</p>
    </div>

</div>
