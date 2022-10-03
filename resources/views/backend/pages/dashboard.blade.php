<x-backend-layout>

    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="mt-0">
        {{ __('Welcome') }}, <b>{{ auth()->user()->name }}</b>.
    </div>
</x-backend-layout>
