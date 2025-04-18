@extends('layouts.app')
{{--TODO: allow input to stay on refresh, make role integer dropdown--}}
@section('content')
    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" required />

                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" required />

                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="employee_code">Employee code</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="employee_code" id="employee_code" required />

                            <x-form-error name="employee_code" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="user_role">User Role</x-form-label>

                        <div class="mt-2">
                            <select name="user_role" id="user_role" required>
                                @foreach ($roles as $role)
                                    <option value={{$role->getKey()}}>{{$role['role']}}</option>
                                @endforeach
                            </select>
                            <x-form-error name="user_role" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" required />

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />

                            <x-form-error name="password" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />

                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-button method="POST" action="/register">Register</x-form-button>
        </div>
    </form>
@endsection
