<x-backend-layout>

    <x-slot name="title">
        {{ __('edit_title', ['Attribute' => __('About')]) }}
    </x-slot>

    <x-header-content data="edit" title="{{ __('About') }}">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Settings') }}</li>
            <li class="breadcrumb-item"><a
                   href="{{ route('settings.configurations.about') }}">{{ __('Configuration') }}</a></li>
            <li class="breadcrumb-item active">{{ __('About') }}</li>
        </ol>
    </x-header-content>

    {{ Form::model($data, [
        'route' => ['settings.configurations.aboutUpdate', isset($data) ? $data->id : null],
        'method' => 'PUT',
        'enctype' => 'multipart/form-data',
    ]) }}

    <div class="grid gap-4 md:grid-cols-6">
        <div class="col-span-6">
            <textarea name="about" id="about">
            {{ isset($data) ? $data->about : old('about') }}
        </textarea>

            @error('about')
                <p class="mt-1 text-xs font-medium text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="-mx-6 -mb-6 bg-secondary-300">
        <div class="px-6 py-4 space-x-1 text-right">
            <x-button-primary>
                {{ __('Update') }}
            </x-button-primary>
        </div>
    </div>

    {{ Form::close() }}

    @push('scripts')
        <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace('about', {
                filebrowserImageBrowseUrl: "{{ url('/file-manager/ckeditor') }}"
            });
            CKEDITOR.config.height = 400;
        </script>
    @endpush
</x-backend-layout>
