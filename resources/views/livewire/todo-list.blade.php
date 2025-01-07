<div class="flex flex-col items-center px-4 py-6">
    <!-- Input para agregar tareas -->
    <div class="mb-6 flex w-full sm:w-3/4">
        <input type="text" wire:model="newTask" wire:keydown.enter="addTask"
            class="flex-grow px-4 py-3 bg-gray-800 text-gray-200 border border-gray-600 rounded-l-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Add a new task">
        <button wire:click="addTask"
            class="px-5 py-3 bg-blue-600 text-gray-200 rounded-r-lg hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class="fas fa-plus"></i>
            <span class="hidden sm:inline"> Add Task</span>
        </button>
    </div>
    @error('newTask')
        <span class="text-red-500 text-sm pulse">{{ $message }}</span>
    @enderror

    <!-- Contenedor para tareas -->
    <div class="w-full sm:w-3/4 bg-gray-900 rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-200">Your Tasks</h2>

        <ul class="space-y-4">
            <!-- Tareas nuevas -->
            <li class="p-4 bg-gray-800 border-l-4 border-blue-500 rounded-md shadow fade-in">
                @if($tasks === [])
                    <p class="text-gray-300 font-medium">You have don't have tasks</p>
                @else
                    <p class="text-gray-300 font-medium">Recently Added Tasks</p>
                    <p class="text-sm text-gray-500">Highlighting new entries.</p>
                @endif
            </li>

            <!-- Listado de tareas -->
            @foreach($tasks as $index => $task)
                <li class="flex justify-between items-center p-4 {{ $loop->odd ? 'bg-gray-800 border-l-4 border-green-500' : 'bg-gray-800 border-l-4 border-blue-500' }} rounded-md shadow-sm hover:shadow-lg fade-in"
                    id="task-{{ $index }}">
                    <div class="flex-grow w-full sm:w-auto break-words">
                        @if($editingIndex === $index)
                            <!-- Input de edición -->
                            <input type="text" wire:model="editingText" wire:keydown.enter="updateTask"
                                class="flex-grow px-4 py-2 bg-gray-700 text-gray-200 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 fade-in">
                            @error('editingText')
                                <span class="text-red-500 text-sm pulse">{{ $message }}</span>
                            @enderror
                        @else
                            <!-- Checkbox y texto de tarea -->
                            <input type="checkbox" wire:click="toggleTask({{ $index }})" {{ $task['completed'] ? 'checked' : '' }} class="mr-3 h-5 w-5 text-blue-500 focus:ring-2 focus:ring-blue-400 fade-in">
                            <span wire:click="editTask({{ $index }})"
                                class="cursor-pointer text-lg {{ $task['completed'] ? 'line-through text-gray-500' : 'text-gray-300' }} hover:text-gray-100 transition-colors fade-in break-words overflow-hidden text-ellipsis">
                                {{ $task['text'] }}
                                <i class="fas fa-pencil-alt ml-3 text-gray-400 hover:text-blue-500"></i>
                            </span>
                        @endif
                    </div>
                    <!-- Botón de eliminar -->
                    <button onclick="deleteTaskWithAnimation({{ $index }})"
                        class="text-red-400 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                        <i class="fas fa-trash text-xl"></i>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    function deleteTaskWithAnimation(index) {
        const taskElement = document.getElementById(`task-${index}`);
        taskElement.classList.add('fade-out');
        setTimeout(() => {
            @this.call('deleteTask', index);
        }, 100); // Espera a que la animación termine (0.1s)
    }
</script>
