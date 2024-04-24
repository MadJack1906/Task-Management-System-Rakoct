@props([
    "isVisible" => false,
    "isCreate" => true,
])
<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="mx-auto {{ $isVisible ? "flex" : "hidden" }} bg-gray-300/60 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow p-8 flex flex-col gap-y-4">
            <div class="flex justify-between">
                <p class="text-lg font-bold">
                    {{ $isCreate ? "Create" : "Edit" }} Task
                </p>
                <button
                    wire:click="closePopup">Close</button>
            </div>

            <form wire:submit.prevent="save">
                <div class="flex flex-col gap-y-4">
                    <x-tasks.input
                        model="name"
                        name="Name" />

                    <x-tasks.input
                        model="description"
                        name="Description" />

                    <x-tasks.input
                        model="due_date"
                        name="Deadline"
                        type="date"/>

                    <label for="due_date" class="flex flex-col gap-y-1">
                        <p>Status</p>
                        <select wire:model="status">
                            <option value="">---</option>
                            @foreach(\App\Enums\TasksStatusEnums::getStatuses() as $key => $status)
                                <option value="{{ $key }}" >{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('due_date') <x-input-error :messages="$message" /> @enderror
                    </label>

                    <div class="w-fit">
                        <button
                            class="button__primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
