<div class="p-6 overflow-hidden bg-white">

    <div class="flex justify-between gap-2">
        <x-input id="kd_prsh" class="block w-full" placeholder="Kode Perusahaan" type="text" id="kd_prsh"
                 name="kd_prsh" :value="old('kd_prsh')" value="{{ $configuration->kd_prsh }}" />

        <x-input id="tanggal" class="block w-full" placeholder="Tanggal" type="text" id="tanggal" name="tanggal"
                 :value="old('tanggal')" required autofocus />

        <x-button id="change">
            {{ __('Change') }}
        </x-button>
    </div>
    <div class="w-full p-4 mt-4 border rounded-lg">
        <canvas id="canvas" width="100%"></canvas>
    </div>

    <div class="grid w-full grid-cols-12 gap-4 mt-4">
        <div
             class="flex items-center col-span-12 gap-4 p-4 overflow-hidden border border-green-200 rounded-lg sm:col-span-6">
            <div class="p-2 text-green-600 border border-green-200 rounded-full bg-green-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2">
                    </path>
                    <path d="M12 3v3m0 12v3"></path>
                </svg>
            </div>
            <div class="">
                <div class="line-clamp-1">Delivered (this month)</div>
                <div class="font-mono text-lg font-semibold leading-normal" id="total_delivered_this_month">
                    0
                </div>
            </div>
        </div>

        <div
             class="flex items-center col-span-12 gap-4 p-4 overflow-hidden border rounded-lg border-rose-200 sm:col-span-6">
            <div class="p-2 border rounded-full border-rose-200 bg-rose-50 text-rose-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2">
                    </path>
                    <path d="M12 3v3m0 12v3"></path>
                </svg>
            </div>
            <div class="">
                <div class="line-clamp-1">Outstanding (this month)</div>
                <div class="font-mono text-lg font-semibold leading-normal" id="total_outstanding_this_month">
                    0
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
        var url = "{{ route('api.home') }}";
        var labels = new Array();
        var dataOutstanding = new Array();
        var dataDelivered = new Array();
        var kd_prsh = document.getElementById('kd_prsh').value;
        var d = new Date();
        var tanggal = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + d.getDate()).slice(-2);
        var tanggal = '2022-01-01';
        document.getElementById('tanggal').value = tanggal;
        $(document).ready(function() {
            getData(kd_prsh, tanggal);

            const data = {
                labels: labels,
                datasets: [{
                        label: 'Outstanding',
                        backgroundColor: '#fda4af',
                        data: dataOutstanding,
                    },
                    {
                        label: 'Delivered',
                        backgroundColor: '#86efac',
                        data: dataDelivered,
                    }
                ]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Chart Pemasukan Bulan Ini',
                            padding: {
                                top: 10,
                                bottom: 30
                            }
                        }
                    },
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            beginAtZero: true,
                            stacked: true
                        }
                    },
                }
            };
            const myChart = new Chart(
                document.getElementById('canvas'),
                config
            );

            function getData(kd_prsh, tanggal) {
                axios.post(url, {
                        kd_prsh: kd_prsh,
                        tanggal: tanggal,
                    })
                    .then(function(res) {
                        var resData = res.data;
                        if (resData.qPurh.length) {
                            resData.qPurh.forEach(function(item) {
                                labels.push(item.supplier + ' (' + item.kd_purd + ')')
                                dataOutstanding.push(item.outstanding_this_month)
                                dataDelivered.push(item.delivered_this_month)
                            });
                        } else {
                            labels.push([])
                            dataOutstanding.push([])
                            dataDelivered.push([])
                        }

                        myChart.update();

                        $("#total_outstanding_this_month").text(resData
                            .total_outstanding_this_month);
                        $("#total_delivered_this_month").text(resData
                            .total_delivered_this_month);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }

            $('#change').on('click', function() {
                var kd_prshNew = document.getElementById('kd_prsh').value;
                var tanggalNew = document.getElementById('tanggal').value;

                axios.post(url, {
                        kd_prsh: kd_prshNew,
                        tanggal: tanggalNew,
                    })
                    .then(function(res) {
                        var resData = res.data;
                        console.log('resData: ', resData);
                        myChart.reset();
                        if (resData.qPurh.length) {
                            resData.qPurh.forEach(function(item, index) {
                                labels[index] = item.supplier + ' (' + item.kd_purd + ')';
                                dataOutstanding[index] = item.outstanding_this_month;
                                dataDelivered[index] = item.delivered_this_month;
                            });
                            if (myChart !== undefined) {
                                myChart.data.datasets.labels = labels;
                                myChart.data.datasets[0].data = dataOutstanding;
                                myChart.data.datasets[1].data = dataDelivered;
                                myChart.update();
                            }
                        } else {
                            if (myChart !== undefined) {
                                myChart.data.datasets.labels = [];
                                myChart.data.datasets[0].data = [];
                                myChart.data.datasets[1].data = [];
                                myChart.update();
                            }
                        }

                        $("#total_outstanding_this_month").text(resData
                            .total_outstanding_this_month);
                        $("#total_delivered_this_month").text(resData
                            .total_delivered_this_month);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            })

        });
    </script>
@endpush
