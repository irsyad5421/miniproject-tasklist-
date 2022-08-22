<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('todos.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Task</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($todos as $todo)
                                    <tr>
                                            

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             {{ $todo->id }}
 
                                         </td>
                                         
                                         @if($todo->complete)
                                    

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <p class="line-through ...">{{$todo->name}}</p>

                                        </td>
                                        @else
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{$todo->name}}
                                        </td>
                                         @endif
                

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('todos.show', $todo->id) }}" class="text-black-600 hover:text-indigo-900 mb-2 mr-2">Details</a>
                                            <a href="{{ route('todos.complete', $todo->id) }}" class="text-blue-600 hover:text-indigo-900 mb-2 mr-2">Complete</a>
                                            
                                           
                        <form class="inline-block" action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                        </form>
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
    </div>
</x-app-layout>