<x-backend-layout>

    <x-slot name="title">
        {{ __('edit_title', ['Attribute' => __('General')]) }}
    </x-slot>

    <x-header-content data="edit" title="{{ __('General') }}">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Settings') }}</li>
            <li class="breadcrumb-item"><a
                   href="{{ route('settings.configurations.general') }}">{{ __('Configuration') }}</a></li>
            <li class="breadcrumb-item active">{{ __('General') }}</li>
        </ol>
    </x-header-content>

    {{ Form::model($data, [
        'route' => ['settings.configurations.generalUpdate', isset($data) ? $data->id : null],
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
    ]) }}

    <div class="p-6 mt-4 overflow-hidden bg-white rounded-lg shadow-md">
        <div class="grid gap-4 md:grid-cols-6">
            {{ Form::formText('Title', 'title') }}
            {{ Form::formText('Title short', 'title_short') }}
            {{ Form::formText('Author', 'author') }}
            {{ Form::formText('Author URL', 'author_url') }}
            {{ Form::formFile('Favicon', 'favicon') }}
            {{ Form::formFile('Logo', 'logo') }}
            {{ Form::formText('Google Maps API', 'api_key') }}
            {{ Form::formText('Place of birth', 'place_of_birth') }}
            {{ Form::formText('Date of birth', 'date_of_birth') }}

            {{ Form::formText('Slogan', 'slogan', isset($data) ? $data->slogan : old('slogan')) }}
            {{ Form::formText('Teaser', 'teaser', isset($data) ? $data->teaser : old('teaser')) }}
            {{ Form::formText('Keywords', 'keywords', isset($data) ? $data->keywords : old('keywords')) }}

            <div class="col-span-full">
                <label class="block mb-1 text-sm font-medium text-gray-700">
                    {{ __('Introduction') }}
                </label>
                <textarea name="introduction" id="introduction">
                    {{ isset($data) ? $data->introduction : old('introduction') }}
                </textarea>
                @error('introduction')
                    <p class="mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>
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

    @push('scripts')
        <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace('introduction', {
                filebrowserImageBrowseUrl: "{{ url('/file-manager/ckeditor') }}"
            });
            CKEDITOR.config.height = 200;
        </script>
    @endpush
</x-backend-layout>
