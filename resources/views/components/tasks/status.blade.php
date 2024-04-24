@props([
    "status" => 0,
    "text" => "Closed"
])
@php
    $status = match((int) $status) {
        \App\Enums\TasksStatusEnums::STATUS_TODO => "bg-blue-300 text-black",
        \App\Enums\TasksStatusEnums::STATUS_IN_PROGRESS => "bg-yellow-300 text-black",
        default => "bg-green-300 text-black"
    }
@endphp
<div class="{{ $status }} w-fit mx-auto px-2 py-1 rounded tracking-wide">
    <p class="">{{ $text }}</p>
</div>
