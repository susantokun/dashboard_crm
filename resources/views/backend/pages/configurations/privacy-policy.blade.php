<x-backend-layout>

    <x-slot name="title">
        {{ __('edit_title', ['Attribute' => __('Privacy Policy')]) }}
    </x-slot>

    <x-header-content data="edit" title="{{ __('Privacy Policy') }}">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('Settings') }}</li>
            <li class="breadcrumb-item"><a
                   href="{{ route('settings.configurations.privacyPolicy') }}">{{ __('Configuration') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Privacy Policy') }}</li>
        </ol>
    </x-header-content>

    {{ Form::model($data, ['route' => ['settings.configurations.privacyPolicyUpdate', isset($data) ? $data->id : null], 'method' => 'PUT']) }}

    <div class="overflow-hidden bg-white rounded-lg shadow-md">
        <ul id="tabs" class="inline-flex w-full px-1 pt-2 border-b">
            <li class="py-2 -mb-px font-semibold text-gray-800 bg-white border-t border-l border-r rounded-t">
                <a class="px-4 py-2" id="default-tab" href="#tab-id">{{ __('Indonesian') }}</a>
            </li>
            <li class="py-2 font-semibold text-gray-800 rounded-t">
                <a class="px-4 py-2" href="#tab-en">{{ __('English') }}</a>
            </li>
        </ul>

        <div id="tab-contents">
            <div id="tab-en" class="p-4 hidden">
                <div class="grid gap-4 md:grid-cols-6">
                    <div class="col-span-6">
                        <textarea name="en_privacy_policy" id="en_privacy_policy">
                            {{ isset($data) ? $data->translate('en')?->privacy_policy : old('en_privacy_policy') }}
                        </textarea>

                        @error('en_privacy_policy')
                            <p class="mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div id="tab-id" class="p-4">
                <div class="grid gap-4 md:grid-cols-6">
                    <div class="col-span-6">
                        <textarea name="id_privacy_policy" id="id_privacy_policy">
                            {{ isset($data) ? $data->translate('id')?->privacy_policy : old('id_privacy_policy') }}
                        </textarea>

                        @error('id_privacy_policy')
                            <p class="mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
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
            CKEDITOR.replace('en_privacy_policy', {
                filebrowserImageBrowseUrl: "{{ url('/file-manager/ckeditor') }}"
            });
            CKEDITOR.config.height = 400;

            CKEDITOR.replace('id_privacy_policy', {
                filebrowserImageBrowseUrl: "{{ url('/file-manager/ckeditor') }}"
            });
            CKEDITOR.config.height = 400;

            let tabsContainer = document.querySelector("#tabs");
            let tabTogglers = tabsContainer.querySelectorAll("#tabs a");
            tabTogglers.forEach(function(toggler) {
                toggler.addEventListener("click", function(e) {
                    e.preventDefault();
                    let tabName = this.getAttribute("href");
                    let tabContents = document.querySelector("#tab-contents");
                    for (let i = 0; i < tabContents.children.length; i++) {
                        tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l",
                            "-mb-px", "bg-white");
                        tabContents.children[i].classList.remove("hidden");
                        if ("#" + tabContents.children[i].id === tabName) {
                            continue;
                        }
                        tabContents.children[i].classList.add("hidden");
                    }
                    e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px",
                        "bg-white");
                });
            });
        </script>
    @endpush
</x-backend-layout>
