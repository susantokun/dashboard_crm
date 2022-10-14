<x-backend-layout>

    <x-slot name="title">
        {{ __('table_title', ['Attribute' => __('Billings')]) }}
    </x-slot>

    <x-header-content data="table" title="{{ __('Billings') }}">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('App') }}</li>
            <li class="breadcrumb-item active">{{ __('Billings') }}</li>
        </ol>
    </x-header-content>

    <div class="inline-flex flex-col items-center justify-between w-full gap-3 md:flex-row">
        <div class="flex items-center justify-center gap-2 md:justify-start">
            <x-button-excel disabled>{{ __('Download') }}</x-button-excel>
        </div>
        <div class="flex flex-col items-center justify-center gap-2 md:flex-row">
            <form class="inline-flex items-center ml-auto md:w-auto">
                <input type="search" name="search" placeholder="{{ __('Name') }}" value="{{ request()->search }}"
                       class="w-full h-10 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 md:h-11">
            </form>

            <div class="inline-flex items-center">
                <select name="per_page" id="per_page" value="{{ request()->per_page }}"
                        class="w-20 h-10 border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 md:h-11">
                    <option {{ request()->per_page == 5 ? 'selected' : '' }} value="5">5</option>
                    <option {{ (isset(request()->per_page) ? request()->per_page == 10 : 'selected') ? 'selected' : '' }}
                            value="10">10</option>
                    <option {{ request()->per_page == 50 ? 'selected' : '' }} value="50">50</option>
                    <option {{ request()->per_page == 100 ? 'selected' : '' }} value="100">100</option>
                </select>
            </div>

            <x-button-secondary id="buttonFilter">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 -mx-1" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
                </svg>
            </x-button-secondary>

        </div>
    </div>

    <div id="divFilter" class="hidden">
        <div class="p-4 mt-4 border rounded-md">
            filter
        </div>
    </div>

    <div class="mt-4">

        <div class="table">
            {{-- <div class="table{{ !$menus->hasPages() ? ' rounded-b-md' : '' }}"> --}}
            <table>
                <thead>
                    <tr>
                        <th
                            class="px-4 py-1 text-base font-semibold text-gray-800 border border-secondary bg-secondary">
                            #
                        </th>
                        <th
                            class="px-4 py-1 text-base font-semibold text-left text-gray-800 border border-secondary bg-secondary">
                            @sortablelink('kd_bill', __('Kode'))
                        </th>
                        <th
                            class="px-4 py-1 text-base font-semibold text-left text-gray-800 border border-secondary bg-secondary">
                            {{ __('Created at') }}
                        </th>
                        <th
                            class="px-4 py-1 text-base font-semibold text-left text-gray-800 border border-secondary bg-secondary">
                            {{ __('Description') }}
                        </th>
                        <th
                            class="px-4 py-1 text-base font-semibold text-left text-gray-800 border border-secondary bg-secondary">
                            {{ __('Customer') }}
                        </th>
                        <th
                            class="px-4 py-1 text-base font-semibold text-right text-gray-800 border border-secondary bg-secondary">
                            {{ __('Price') }}
                        </th>
                        <th
                            class="px-4 py-1 text-base font-semibold text-center text-gray-800 border border-secondary bg-secondary">
                            {{ __('Kurs') }}
                        </th>
                        <th
                            class="px-4 py-1 text-base font-semibold text-center text-gray-800 border border-secondary bg-secondary">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                @if ($billings->count())
                    <tbody>
                        @foreach ($billings as $item)
                            <tr>
                                <td class="p-2 px-4 text-sm text-center bg-white border select-text">
                                    {{ $billings->count() * ($billings->currentPage() - 1) + $loop->iteration }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->kd_bill }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->tg_bill }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->tx_bill }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->m_mtra->tx_mtra }}
                                </td>
                                <td class="p-2 px-4 text-sm text-right bg-white border select-text">
                                    @currency($item->nl_bill)
                                </td>
                                <td class="p-2 px-4 text-sm text-center bg-white border select-text">
                                    {{ $item->tx_kurs }}
                                </td>
                                <td class="p-2 px-4 text-sm text-center bg-white border select-text">
                                    <div class="inline-flex gap-1">
                                        <x-button-show disabled />
                                        <x-button-edit disabled />
                                        <x-button-archived disabled />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <tbody class="text-center">
                        <tr>
                            <td className="py-2 text-sm text-center" colSpan="10000">
                                {{ __('could not be found.') }}
                            </td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>
        @if ($billings->hasPages())
            <div class="table-pagination">
                {{ $billings->links() }}
            </div>
        @endif
    </div>

    @push('scripts')
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <script>
            $("#per_page").change(function(e) {
                let value = e.target.value;
                if (!value) return;

                let url = new URL(window.location.href);
                url.searchParams.set('per_page', value);
                window.location.href = url;
            });

            $('#buttonFilter').on('click', function() {
                const divFilter = document.getElementById('divFilter');
                const isHidden = divFilter.classList.contains('hidden');
                if (isHidden) {
                    divFilter.classList.remove('hidden')
                    divFilter.classList.add('block')
                } else {
                    divFilter.classList.remove('block')
                    divFilter.classList.add('hidden')
                }
            })
        </script>
    @endpush
</x-backend-layout>
