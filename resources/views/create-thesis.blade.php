<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Thesis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full sm:w-1/2 lg:w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form style="padding: 20px" action="/thesis/create" method="post">
                        @csrf
                        <div class="mb-4">
                            <x-label for="name" :value="__('Name')"/>
                            <x-input type="text" class="block mt-1 w-full" id="name" placeholder="Name" name="name" required autofocus/>
                        </div>
                        <div class="mb-4">
                            <x-label for="thesis_problem" :value="__('Thesis problem')"/>
                            <x-input  type="text" class="block mt-1 w-full" id="thesis_problem" placeholder="Thesis problem" name="thesis_problem" required autofocus/>
                        </div>
                        <div class="mb-4">
                            <x-label for="study_type_selection" :value="__('Choose study type')" />

                            <select id="study_type_selection" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                    name="study_type" required >
                                <option value="undergraduate" selected>Undergraduate study</option>
                                <option value="graduate">Graduate study</option>
                            </select>
                        </div>
                        <div class="mb-4 flex items-center justify-center">
                            <button type="submit" class="bg-indigo-500 text-white uppercase p-3 py-1 rounded-lg focus:outline-none">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>















<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create task') }}
        </h2>
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div>
            <!-- Role selection -->
            <form class="mt-4" action="/createTask" method="POST">
            @csrf
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"/>
                </div>

                <!-- English name -->
                <div class="mt-4">
                    <x-label for="english_name" :value="__('English name')" />

                    <x-input id="english_name" class="block mt-1 w-full" type="text" name="english_name" :value="old('english_name')"/>
                </div>

                <!-- Assignment -->
                <div class="mt-4">
                    <x-label for="assignment" :value="__('Assignment')" />

                    <x-input id="assignment" class="block mt-1 w-full" type="text" name="assignment" :value="old('assignment')"/>
                </div>

                <div class="mt-4">
                    <x-label for="role_selection" :value="__('Choose your role')" />
                    <select id="study_type_selection" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                            name="study_type" required >
                        <option value="professional">Professional study</option>
                        <option value="undergraduate">Undergraduate study</option>
                        <option value="graduate">Graduate study</option>
                    </select>
                </div>

                
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4" type="submit">
                    {{ __('Save') }}
                </x-button>
            </div>
        </div>
    </x-auth-card>
</x-app-layout>