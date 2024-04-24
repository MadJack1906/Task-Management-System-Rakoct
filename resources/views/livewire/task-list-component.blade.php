<div class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col gap-y-4">


                    <div class="flex justify-between items-center">
                        <p class="font-bold text-xl">Tasks</p>
                        <button
                            wire:click="openPopup(true)"
                            class="bg-blue-900 px-4 py-1 text-white rounded-lg hover:bg-white hover:text-blue-900 border border-transparent hover:border-blue-900">
                            Create
                        </button>

                    </div>
                    <div class="flex justify-end w-full gap-x-4">
                        <label for="search" class="flex flex-col">
                            <p>Search</p>
                            <input type="text" wire:model.live.debounce="search" placeholder="Search">
                        </label>

                        <label for="filter_status" class="">
                            <p>Filter Status</p>
                            <select
                                wire:model.live="filter_status"
                                name="filter_status" id="filter_status">
                                <option value="">---</option>
                                @foreach(\App\Enums\TasksStatusEnums::getStatuses() as $key => $status)
                                    <option value="{{ $key }}" >{{ $status }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="text-start pl-2 my-4">Name</th>
                                <th class="">Deadline</th>
                                <th class="">Status</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 pl-2">
                                        <p class="font-bold ">{{ $task->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="">{{ $task->deadline }}</p>
                                    </td>
                                    <td class="text-center">
                                        <x-tasks.status
                                            :text="\App\Enums\TasksStatusEnums::getStatusesText($task->status)"
                                            :status="$task->status"
                                        />
                                    </td>
                                    <td>
                                        <div class="flex justify-center gap-x-4">
                                            <button
                                                wire:click="openPopup(false, {{ $task->id }})">
                                                Edit
                                            </button>

                                            <button wire:click="delete({{ $task->id }})"
                                                class="text-red-500">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="">
                        {{ $tasks->links() }}
                    </div>

                    @include('components.tasks.form', ['isVisible' => $is_form_modal_visible, 'isCreate' => $is_create])
                </div>
            </div>
        </div>
    </div>
</div>
