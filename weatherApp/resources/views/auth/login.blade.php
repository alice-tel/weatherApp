@extends('layouts.app')

@section('content')

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">E-mail</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="email" id="email" required />

                            <x-form-error name="email" />
                        </div>
                        <x-form-field>
                            <x-form-label for="password">Password</x-form-label>

                            <div class="mt-2">
                                <x-form-input name="password" id="password" type="password" required />

                                <x-form-error name="password" />
                            </div>
                        </x-form-field>
                    </x-form-field>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-button method="POST" action="/login">Login</x-form-button>
        </div>
    </form>
@endsection
