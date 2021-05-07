<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thesis applications') }}
        </h2>
    </x-slot>

    @if (count($students) > 0) 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-center">
                    <table>
                        <tr class="font-semibold uppercase text-xl">
                            <th>Name</th>
                        </tr>
                        @foreach ($students as $student)
                        <tr class="text-lg">
                            <td>{{$student->name}}</td>
                            <td>
                                <form method="post" action="/thesis/acceptApplication">
                                @csrf
                                    <input type="hidden" id="student_id" name="student_id" value="{{$student->id}}">
                                    <input type="hidden" id="thesis_id" name="thesis_id" value="{{$thesis->id}}">
                                    <x-button class="ml-4">
                                        Accept Application
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>