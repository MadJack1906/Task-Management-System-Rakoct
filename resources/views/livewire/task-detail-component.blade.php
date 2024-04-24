<div class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks > ' . $task->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col gap-y-4">
                    <div class="flex flex-col gap-y-4 w-full">

                        <div class="flex gap-x-4">
                            <p>Name: </p>
                            <p>{{ $task->name }}</p>
                        </div>

                        <div class="flex gap-x-4">
                            <p>Description: </p>
                            <p>{{ $task->description }}</p>
                        </div>

                        <div class="flex gap-x-4">
                            <p>Due Date: </p>
                            <p>{{ $task->deadline }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
