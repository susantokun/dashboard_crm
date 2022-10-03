<x-backend-layout>

    <x-slot name="title">
        {{ __('edit_title', ['Attribute' => __('Contact')]) }}
    </x-slot>

    <x-header-content data="edit" title="{{ __('Contact') }}">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Settings') }}</li>
            <li class="breadcrumb-item"><a
                   href="{{ route('settings.configurations.contact') }}">{{ __('Configuration') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Contact') }}</li>
        </ol>
    </x-header-content>

    {{ Form::model($data, ['route' => ['settings.configurations.contactUpdate', isset($data) ? $data->id : null], 'method' => 'PUT']) }}

    <div class="p-6 mt-4 overflow-hidden bg-white rounded-lg shadow-md">
        <div class="grid gap-4 md:grid-cols-6">
            {{ Form::formText('Address', 'address') }}
            {{ Form::formEmail('Email', 'email') }}
            {{ Form::formText('Phone', 'phone') }}
            {{ Form::formText('Map iFrame', 'map_iframe') }}
            {{ Form::formText('Map URL', 'map_url') }}
            {{ Form::formText('Map latitude', 'map_latitude') }}
            {{ Form::formText('Map longitude', 'map_longitude') }}
        </div>
        <div class="pb-4 border-b border-dashed border-secondary/90"></div>

        <div class="-mx-6 -mb-6 bg-secondary-300">
            <div class="px-6 py-4 space-x-1 text-right">
                <x-button-primary>
                    {{ __('Update') }}
                </x-button-primary>
            </div>
        </div>
    </div>

    {{ Form::close() }}
</x-backend-layout>
