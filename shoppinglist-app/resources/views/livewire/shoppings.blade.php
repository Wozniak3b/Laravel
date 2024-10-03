<?php

use function Livewire\Volt\{state,with};

state(['task']);

with([
    // 'shoppings' => fn() => \App\Models\Shopping::all()
    // Tak wypisuje wszystkie wartosci nawet nie usera
    'shoppings'=> fn() =>auth()->user()->shopps
]);

$add = function(){
    //Dzieki temu mamy tylko te listy ktore sa do konkretnego usera
    auth()->user()->shopps()->create([
        'task'=>$this->task
]);
    // To jest odwołanie do modelu shopping (bazy) Zeby coś dodać
    // \App\Models\Shopping::create([
        // 'user_id'=>auth()->id(),
        // 'task'=>$this->task
// ]);
     $this->task='';
    // Pozwala nam na wyczyszczenie statusu task
};

$delete = fn(\App\Models\Shopping $shop) => $shop->delete();

?>

<div>
    <form wire:submit="add">
        {{-- Podłączamy inputa do zmiennej task --}}
        {{-- <input type="text" wire:model.live='task'> Dodanie live pokazuje znmiany na ekranie na żywo--}}
        <input type="text" wire:model.live='task'>
        <button type='submit'>Add</button>
    </form>

    {{-- <div class='mt-2'>  --}}
        {{-- {{$task}} --}}
    {{-- </div> --}}
    {{-- To nam służyło do tego aktywnego pokazania na stronie --}}

    <div>
        {{-- to jets odwołanie do volt shoppings --}}
        @foreach($shoppings as $shop)
            <div>
                {{$shop->task}}
                <button wire:click='delete({{$shop->id}})'>DEL</button>
            </div>
        @endforeach
    </div>
</div>
