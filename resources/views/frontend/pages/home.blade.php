<x-frontend-layout>
    <x-meta page="home" seoTitle="{{ $configuration->title }}" seoDescription="{{ $configuration->teaser }}"
            seoKeywords="{{ $configuration->keywords }}" seoImage="{{ $configuration->logo }}"
            seoImageAlt="{{ $configuration->title }}" seoType="website" />

    <div class="p-6 overflow-hidden bg-white">

        <div class="flex justify-between gap-4">
            <div class="inline-flex w-full">
                <x-input id="kd_prsh" class="block w-full" placeholder="Kode Perusahaan" type="text" id="kd_prsh"
                         name="kd_prsh" :value="old('kd_prsh')" value="{{ $configuration->kd_prsh }}" />
            </div>

            <div class="inline-flex w-full gap-2">
                <select name="period" id="period" autofocus
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-primary/30 focus:ring focus:ring-primary/10 focus:ring-opacity-50">
                    <option value="001">{{ __('Last 7 Days') }}</option>
                    <option value="002">{{ __('Last 30 Days') }}</option>
                    <option value="003">{{ __('Last Month') }}</option>
                    <option value="004">{{ __('This Year') }}</option>
                    <option value="005">{{ __('Last Year') }}</option>
                </select>

                <x-button id="change">
                    {{ __('Change') }}
                </x-button>
            </div>
        </div>

        <div class="grid w-full grid-cols-1 gap-4 mt-4 sm:grid-cols-2 md:grid-cols-4">
            <div class="flex items-center gap-4 p-4 overflow-hidden border border-blue-200 rounded-lg">
                <div class="p-2 text-blue-500 border border-blue-200 rounded-full bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-11 w-11" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    </svg>
                </div>
                <div class="">
                    <div class="line-clamp-1">{{ __('Project') }}</div>
                    <span id="labelProject">-</span>
                    <div class="font-mono text-lg font-semibold leading-normal" id="countLastYearProject">
                        0
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 p-4 overflow-hidden border border-green-200 rounded-lg">
                <div class="p-2 text-green-500 border border-green-200 rounded-full bg-green-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-11 w-11" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2">
                        </path>
                        <path d="M12 3v3m0 12v3"></path>
                    </svg>
                </div>
                <div class="">
                    <div class="line-clamp-1">{{ __('Sales') }}</div>
                    <span id="labelSales">-</span>
                    <div class="font-mono text-lg font-semibold leading-normal" id="countLastYearSales">
                        0
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 p-4 overflow-hidden border rounded-lg border-amber-200">
                <div class="p-2 border rounded-full border-amber-200 bg-amber-50 text-amber-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-11 w-11" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                              d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <div class="line-clamp-1">{{ __('Outstanding Bill') }}</div>
                    <span id="labelOutstandingBill">-</span>
                    <div class="font-mono text-lg font-semibold leading-normal" id="countOutstandingBill">
                        0
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 p-4 overflow-hidden border border-teal-200 rounded-lg">
                <div class="p-2 text-teal-500 border border-teal-200 rounded-full bg-teal-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-11 w-11" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path>
                        <path d="M18 14v4h4"></path>
                        <circle cx="18" cy="18" r="4"></circle>
                        <path d="M15 3v4"></path>
                        <path d="M7 3v4"></path>
                        <path d="M3 11h16"></path>
                    </svg>
                </div>
                <div class="">
                    <div class="line-clamp-1">{{ __('Active Project') }}</div>
                    <span id="labelActiveProject">-</span>
                    <div class="font-mono text-lg font-semibold leading-normal" id="countActiveProject">
                        0
                    </div>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-6 gap-4 mt-4">

            <div class="p-4 border rounded-lg col-span-full md:col-span-4">
                <canvas id="canvasQsord" width="100%"></canvas>
            </div>

            <div class="p-4 border rounded-lg col-span-full md:col-span-2">
                <canvas id="canvasQsordBestSeller" width="100%"></canvas>
            </div>
        </div>

    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var url = "{{ route('api.home') }}";
            var labelsQsord = new Array();
            var dataQsord = new Array();
            var textLabel = new Array();

            var labelsQsordBestSeller = new Array();
            var dataQsordBestSeller = new Array();

            var kd_prsh = document.getElementById('kd_prsh').value;
            var d = new Date();
            // var tanggal = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + d.getDate()).slice(-2);
            // var tanggal = '2021-01-01';
            document.getElementById('period').value = "005";
            var period = document.getElementById('period').value;

            var coloR = [];
            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };

            if (period === '001') {
                textLabel = ['7 hari tearkhir']
            } else if (period === '002') {
                textLabel = ['30 hari terakhir']
            } else if (period === '003') {
                textLabel = ['Bulan lalu (' + ("0" + (d.getMonth() + 1)).slice(-2) + ')']
            } else if (period === '004') {
                textLabel = ['Tahun ' + d.getFullYear()]
            } else if (period === '005') {
                textLabel = ['Tahun ' + (d.getFullYear() - 1)]
            }

            $(document).ready(function() {
                getData(kd_prsh, period);

                const chartDataQsord = {
                    textLabel: textLabel,
                    labels: labelsQsord,
                    datasets: [{
                        // label: "Total Nilai Transaksi Tahun 2021",
                        backgroundColor: coloR,
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: dataQsord,
                    }, ]
                };
                const chartConfigQsord = {
                    type: 'bar',
                    data: chartDataQsord,
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: function(data) {
                                    return 'Total Nilai Transaksi ' + data.chart.data.textLabel[0]
                                },
                            }
                        },
                        scales: {
                            x: {
                                stacked: true,
                            },
                            y: {
                                beginAtZero: true,
                                stacked: true,
                            }
                        },
                    }
                };
                const chartQsord = new Chart(
                    document.getElementById('canvasQsord'),
                    chartConfigQsord
                );

                const chartDataQsordBestSeller = {
                    textLabel: textLabel,
                    labels: labelsQsordBestSeller,
                    datasets: [{
                        backgroundColor: coloR,
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: dataQsordBestSeller,
                    }, ],
                };
                const chartConfigQsordBestSeller = {
                    type: 'pie',
                    data: chartDataQsordBestSeller,
                    options: {
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            title: {
                                display: true,
                                text: function(data) {
                                    return 'Total Kuantiti Material ' + data.chart.data.textLabel[0]
                                },
                            }
                        },
                        responsive: true,
                        tooltips: {
                            enabled: false,
                        },
                        legend: {
                            display: false
                        },
                    }
                };
                const chartQsordBestSeller = new Chart(
                    document.getElementById('canvasQsordBestSeller'),
                    chartConfigQsordBestSeller
                );

                function getData(kd_prsh, period) {
                    axios.post(url, {
                            kd_prsh: kd_prsh,
                            period: period,
                        })
                        .then(function(res) {
                            var resData = res.data;
                            textLabel.push(resData.textLabel)

                            for (var i in resData) {
                                coloR.push(dynamicColors());
                            }

                            if (resData.qSord.length) {
                                resData.qSord.forEach(function(item) {
                                    labelsQsord.push(item.label)
                                    dataQsord.push(item.score)
                                });
                            } else {
                                labelsQsord.push([])
                                dataQsord.push([])
                            }

                            if (resData.qSordBestSeller.length) {
                                resData.qSordBestSeller.forEach(function(item) {
                                    labelsQsordBestSeller.push(item.label)
                                    dataQsordBestSeller.push(item.score)
                                });
                            } else {
                                labelsQsordBestSeller.push([])
                                dataQsordBestSeller.push([])
                            }

                            chartQsord.update();
                            chartQsordBestSeller.update();

                            $("#countLastYearProject").text(resData.countLastYearProject);
                            $("#countLastYearSales").text(resData.countLastYearSales);
                            $("#countOutstandingBill").text(resData.countOutstandingBill);
                            $("#countActiveProject").text(resData.countActiveProject);

                            document.getElementById("labelProject").innerHTML = resData.textLabel;
                            document.getElementById("labelSales").innerHTML = resData.textLabel;
                            document.getElementById("labelOutstandingBill").innerHTML = resData.textLabel;
                            document.getElementById("labelActiveProject").innerHTML = resData.textLabel;
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }

                $('#change').on('click', function() {
                    var kd_prshNew = document.getElementById('kd_prsh').value;
                    var periodNew = document.getElementById('period').value;

                    axios.post(url, {
                            kd_prsh: kd_prshNew,
                            period: periodNew,
                        })
                        .then(function(res) {
                            var resData = res.data;

                            chartQsord.reset();
                            chartQsordBestSeller.reset();

                            chartQsord.data.textLabel[0] = resData.textLabel;
                            chartQsordBestSeller.data.textLabel[0] = resData.textLabel;

                            if (resData.qSord.length) {
                                resData.qSord.forEach(function(item, index) {
                                    labelsQsord[index] = item.label;
                                    dataQsord[index] = item.score;
                                });
                                if (chartQsord !== undefined) {
                                    chartQsord.data.labels = labelsQsord;
                                    chartQsord.data.datasets[0].data = dataQsord;
                                    chartQsord.update();
                                }
                            } else {
                                if (chartQsord !== undefined) {
                                    chartQsord.data.labels = ['Not Found'];
                                    chartQsord.data.datasets[0].data = [0];
                                    chartQsord.update();
                                }
                            }

                            if (resData.qSordBestSeller.length) {
                                resData.qSordBestSeller.forEach(function(item, index) {
                                    labelsQsordBestSeller[index] = item.label;
                                    dataQsordBestSeller[index] = item.score;
                                });
                                if (chartQsordBestSeller !== undefined) {
                                    chartQsordBestSeller.data.labels = labelsQsordBestSeller;
                                    chartQsordBestSeller.data.datasets[0].data = dataQsordBestSeller;
                                    chartQsordBestSeller.update();
                                }
                            } else {
                                if (chartQsordBestSeller !== undefined) {
                                    chartQsordBestSeller.data.labels = ['Not Found'];
                                    chartQsordBestSeller.data.datasets[0].data = [0];
                                    chartQsordBestSeller.update();
                                }
                            }

                            $("#countLastYearProject").text(resData.countLastYearProject);
                            $("#countLastYearSales").text(resData.countLastYearSales);
                            $("#countOutstandingBill").text(resData.countOutstandingBill);
                            $("#countActiveProject").text(resData.countActiveProject);

                            document.getElementById("labelProject").innerHTML = resData.textLabel;
                            document.getElementById("labelSales").innerHTML = resData.textLabel;
                            document.getElementById("labelOutstandingBill").innerHTML = resData
                                .textLabel;
                            document.getElementById("labelActiveProject").innerHTML = resData
                                .textLabel;
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                })



            });
        </script>
    @endpush

</x-frontend-layout>
