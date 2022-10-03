@props(['id' => false, 'title', 'body', 'action'])

<div class="fixed z-10 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
     id="{{ $id ? $id : 'myModal' }}">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div
             class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full">
            <div class="bg-white px-6 py-4 flex flex-col items-center justify-center w-full gap-2 text-center">
                <h3 class="text-xl leading-6 font-medium text-gray-900">
                    {{ $title ?? '' }}
                </h3>
                <i data-feather="file-text" class="w-10 h-10 text-success my-3"></i>
                <div class="flex items-center justify-center w-full flex-col gap-2 text-center">
                    {{ $body ?? '' }}
                </div>
            </div>
            <div class="bg-gray-100 w-full inline-flex gap-2 px-6 py-4 justify-end items-center">
                {{ $action ?? '' }}
            </div>
        </div>
    </div>
</div>
