<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if ($loggedUser->role === 'admin' && count($users) > 0) 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-center">
                    <table>
                        <tr class="font-semibold uppercase text-xl">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit role</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr class="text-lg">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <th><a href="/edit/{{$user->id}}">Edit</a> </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (count($theses) > 0) 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-center">
                <table>
                        <tr class="font-semibold uppercase text-xl">
                            <th>Name</th>
                            <th>Problem description</th>
                            <th>Study type</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($theses as $thesis)
                        <tr class="text-lg">
                            <td>{{$thesis->name_en}}</td>
                            <td>{{$thesis->thesis_problem}}</td>
                            <td>{{$thesis->study_type}}</td>


                        @if ($loggedUser->role === 'student')
                            @if($thesis->available)
                            <td>
                                <form method="post" action="thesis/apply">
                                @csrf
                                    <input type="hidden" id="thesis_id" name="thesis_id" value="{{$thesis->id}}">
                                    <x-button class="ml-4">
                                        Apply
                                    </x-button>
                                </form>
                            </td>
                            @else
                            <td>
                                Not available
                            </td>
                            @endif
                        @endif

                        @if ($loggedUser->role === 'professor') 
                            @if ($thesis->available)
                            <td>
                                <a href="/thesis/applications/{{$thesis->id}}" class="ml-4">See applications</a>
                            </td>
                            @else
                            <td>
                            Already reserved
                            </td>
                            @endif
                        @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif


</x-app-layout>
