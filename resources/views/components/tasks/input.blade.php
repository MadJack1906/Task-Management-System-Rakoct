@props([
    "model" => "",
    "name",
    "type" => "text"
])
@php
    $htmlName = strtolower(str_replace(" ", "_", $name))
@endphp
<label for="{{ $htmlName }}" class="flex flex-col gap-y-1">
    <p>{{ $name }}</p>
    <input
        wire:model="{{ $model }}"
        type="{{ $type }}" name="{{ $htmlName }}" id="{{ $htmlName }}" placeholder="{{ $name}}" class="w-full px-4 rounded-lg">
    @error($model) <x-input-error :messages="$message" /> @enderror
</label>
