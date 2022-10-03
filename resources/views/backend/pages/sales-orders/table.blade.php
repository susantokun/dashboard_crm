<x-backend-layout>

    <x-slot name="title">
        {{ __('table_title', ['Attribute' => __('Sales Orders')]) }}
    </x-slot>

    <x-header-content data="table" title="{{ __('Sales Orders') }}">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ __('App') }}</li>
            <li class="breadcrumb-item active">{{ __('Sales Orders') }}</li>
        </ol>
    </x-header-content>

    <div class="inline-flex flex-col items-center justify-between w-full gap-3 md:flex-row">
        <div class="flex items-center justify-center gap-2 md:justify-start">
            <x-button-excel disabled>{{ __('Download') }}</x-button-excel>
        </div>
        <div class="flex flex-col items-center gap-2 md:flex-row">
            <form class="w-full ml-auto md:w-auto">
                <input type="search" name="search" placeholder="{{ __('Name') }}" value="{{ request()->search }}"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </form>
            <div class="inline-flex items-center gap-2">
                <select name="per_page" id="per_page" value="{{ request()->per_page }}"
                        class="w-20 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option {{ request()->per_page == 5 ? 'selected' : '' }} value="5">5</option>
                    <option {{ (isset(request()->per_page) ? request()->per_page == 10 : 'selected') ? 'selected' : '' }}
                            value="10">10</option>
                    <option {{ request()->per_page == 50 ? 'selected' : '' }} value="50">50</option>
                    <option {{ request()->per_page == 100 ? 'selected' : '' }} value="100">100</option>
                </select>
            </div>
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
                            {{ __('Kode') }}
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
                @if ($salesOrders->count())
                    <tbody>
                        @foreach ($salesOrders as $item)
                            <tr>
                                <td class="p-2 px-4 text-sm text-center bg-white border select-text">
                                    {{ $salesOrders->count() * ($salesOrders->currentPage() - 1) + $loop->iteration }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->kd_sord }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->tg_sord }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->tx_sord }}
                                </td>
                                <td class="p-2 px-4 text-sm text-left bg-white border select-text">
                                    {{ $item->m_mtra->tx_mtra }}
                                </td>
                                <td class="p-2 px-4 text-sm text-right bg-white border select-text">
                                    @currency($item->nl_sord)
                                </td>
                                <td class="p-2 px-4 text-sm text-center bg-white border select-text">
                                    {{ $item->kd_kurs }}
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
        @if ($salesOrders->hasPages())
            <div class="table-pagination">
                {{ $salesOrders->links() }}
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            $("#per_page").change(function(e) {
                let value = e.target.value;
                if (!value) return;

                let url = new URL(window.location.href);
                url.searchParams.set('per_page', value);
                window.location.href = url;
            });
        </script>
    @endpush
</x-backend-layout>
