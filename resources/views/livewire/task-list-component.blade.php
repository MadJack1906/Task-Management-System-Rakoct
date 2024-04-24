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
                    <p class="font-bold text-xl">Tasks</p>
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-start text-xs pl-2 my-4">Name</th>
                                <th class="text-xs">Deadline</th>
                                <th class="text-xs">Status</th>
                                <th class="text-xs">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 pl-2">
                                        <p class="font-bold text-xs">{{ $task->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs">{{ $task->deadline }}</p>
                                    </td>
                                    <td class="text-center">
                                        <x-tasks.status
                                            :text="\App\Enums\TasksStatusEnums::getStatusesText($task->status)"
                                            :status="$task->status"
                                        />
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <button class="text-xs">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
