<x-backend-layout>

    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    {{-- <div class="mt-0">
        {{ __('Welcome') }}, <b>{{ auth()->user()->name }}</b>.
    </div> --}}

    <div class="p-6 -m-6 overflow-hidden">

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

        <div class="p-4 my-4 overflow-hidden bg-white border rounded-lg">
            <div class="inline-flex flex-wrap gap-1">
                <button id="buttonToggleCardProject"
                        class="px-2 py-1 text-xs text-gray-800 border rounded-md bg-secondary hover:opacity-80">
                    Card Project
                </button>
                <button id="buttonToggleCardSales"
                        class="px-2 py-1 text-xs text-gray-800 border rounded-md bg-secondary hover:opacity-80">
                    Card Sales
                </button>
                <button id="buttonToggleCardOutstandingBill"
                        class="px-2 py-1 text-xs text-gray-800 border rounded-md bg-secondary hover:opacity-80">
                    Card Outstanding Bill
                </button>
                <button id="buttonToggleCardActiveProject"
                        class="px-2 py-1 text-xs text-gray-800 border rounded-md bg-secondary hover:opacity-80">
                    Card Active Project
                </button>
                <button id="buttonToggleGrafikTransaksi"
                        class="px-2 py-1 text-xs text-gray-800 border rounded-md bg-secondary hover:opacity-80">
                    Grafik Transaksi
                </button>
                <button id="buttonToggleGrafikKuantiti"
                        class="px-2 py-1 text-xs text-gray-800 border rounded-md bg-secondary hover:opacity-80">
                    Grafik Kuantiti
                </button>
            </div>
        </div>

        <div class="grid w-full grid-cols-1 gap-4 mt-4 sm:grid-cols-2 md:grid-cols-4">

            <div class="hidden" id="cardProject">
                <div class="relative flex items-center gap-4 p-4 overflow-hidden border border-blue-200 rounded-lg">
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
                    {{-- <button id="buttonHideCardProject" class="absolute p-1 rounded-full -top-px right-px text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button> --}}
                </div>
            </div>

            <div class="hidden" id="cardSales">
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
            </div>

            <div class="hidden" id="cardOutstandingBill">
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
            </div>

            <div class="hidden" id="cardActiveProject">
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

        </div>

        <div class="grid grid-cols-6 gap-4 mt-4">

            <div id="grafikTransaksi" class="hidden p-4 border rounded-lg col-span-full md:col-span-4">
                <canvas id="canvasQsord" width="100%"></canvas>
            </div>

            <div id="grafikKuantiti" class="hidden border rounded-lg 5p-4 col-span-full md:col-span-2">
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

                function addClass(element, className) {
                    var currentClassName = element.getAttribute("class");
                    if (typeof currentClassName !== "undefined" && currentClassName) {
                        element.setAttribute("class", currentClassName + " " + className);
                    } else {
                        element.setAttribute("class", className);
                    }
                }

                function removeClass(element, className) {
                    var currentClassName = element.getAttribute("class");
                    if (typeof currentClassName !== "undefined" && currentClassName) {

                        var class2RemoveIndex = currentClassName.indexOf(className);
                        if (class2RemoveIndex != -1) {
                            var class2Remove = currentClassName.substr(class2RemoveIndex, className.length);
                            var updatedClassName = currentClassName.replace(class2Remove, "").trim();
                            element.setAttribute("class", updatedClassName);
                        }
                    } else {
                        element.removeAttribute("class");
                    }
                }

                cardProject();
                cardSales();
                cardOutstandingBill();
                cardActiveProject();
                grafikTransaksi();
                grafikKuantiti();

                function cardProject() {
                    var cardProject = document.getElementById("cardProject");
                    var buttonToggleCardProject = document.getElementById("buttonToggleCardProject");

                    if (cardProject.classList.contains('block')) {
                        removeClass(buttonToggleCardProject, "bg-secondary text-gray-800");
                        addClass(buttonToggleCardProject, "bg-primary text-gray-200");
                    } else {
                        removeClass(buttonToggleCardProject, "bg-primary text-gray-200");
                        addClass(buttonToggleCardProject, "bg-secondary text-gray-800");
                    }

                    $('#buttonToggleCardProject').on('click', function() {
                        var cardProject = document.getElementById("cardProject");
                        var buttonToggleCardProject = document.getElementById("buttonToggleCardProject");

                        if (cardProject.classList.contains('block')) {
                            removeClass(cardProject, "block");
                            addClass(cardProject, "hidden");

                            removeClass(buttonToggleCardProject, "bg-primary text-gray-200");
                            addClass(buttonToggleCardProject, "bg-secondary text-gray-800");
                        } else {
                            removeClass(cardProject, "hidden");
                            addClass(cardProject, "block");

                            removeClass(buttonToggleCardProject, "bg-secondary text-gray-800");
                            addClass(buttonToggleCardProject, "bg-primary text-gray-200");
                        }
                    })
                }

                function cardSales() {
                    var cardSales = document.getElementById("cardSales");
                    var buttonToggleCardSales = document.getElementById("buttonToggleCardSales");

                    if (cardSales.classList.contains('block')) {
                        removeClass(buttonToggleCardSales, "bg-secondary text-gray-800");
                        addClass(buttonToggleCardSales, "bg-primary text-gray-200");
                    } else {
                        removeClass(buttonToggleCardSales, "bg-primary text-gray-200");
                        addClass(buttonToggleCardSales, "bg-secondary text-gray-800");
                    }

                    $('#buttonToggleCardSales').on('click', function() {
                        var cardSales = document.getElementById("cardSales");
                        var buttonToggleCardSales = document.getElementById("buttonToggleCardSales");

                        if (cardSales.classList.contains('block')) {
                            removeClass(cardSales, "block");
                            addClass(cardSales, "hidden");

                            removeClass(buttonToggleCardSales, "bg-primary text-gray-200");
                            addClass(buttonToggleCardSales, "bg-secondary text-gray-800");
                        } else {
                            removeClass(cardSales, "hidden");
                            addClass(cardSales, "block");

                            removeClass(buttonToggleCardSales, "bg-secondary text-gray-800");
                            addClass(buttonToggleCardSales, "bg-primary text-gray-200");
                        }
                    })
                }

                function cardOutstandingBill() {
                    var cardOutstandingBill = document.getElementById("cardOutstandingBill");
                    var buttonToggleCardOutstandingBill = document.getElementById("buttonToggleCardOutstandingBill");

                    if (cardOutstandingBill.classList.contains('block')) {
                        removeClass(buttonToggleCardOutstandingBill, "bg-secondary text-gray-800");
                        addClass(buttonToggleCardOutstandingBill, "bg-primary text-gray-200");
                    } else {
                        removeClass(buttonToggleCardOutstandingBill, "bg-primary text-gray-200");
                        addClass(buttonToggleCardOutstandingBill, "bg-secondary text-gray-800");
                    }

                    $('#buttonToggleCardOutstandingBill').on('click', function() {
                        var cardOutstandingBill = document.getElementById("cardOutstandingBill");
                        var buttonToggleCardOutstandingBill = document.getElementById(
                            "buttonToggleCardOutstandingBill");

                        if (cardOutstandingBill.classList.contains('block')) {
                            removeClass(cardOutstandingBill, "block");
                            addClass(cardOutstandingBill, "hidden");

                            removeClass(buttonToggleCardOutstandingBill, "bg-primary text-gray-200");
                            addClass(buttonToggleCardOutstandingBill, "bg-secondary text-gray-800");
                        } else {
                            removeClass(cardOutstandingBill, "hidden");
                            addClass(cardOutstandingBill, "block");

                            removeClass(buttonToggleCardOutstandingBill, "bg-secondary text-gray-800");
                            addClass(buttonToggleCardOutstandingBill, "bg-primary text-gray-200");
                        }
                    })
                }

                function cardActiveProject() {
                    var cardActiveProject = document.getElementById("cardActiveProject");
                    var buttonToggleCardActiveProject = document.getElementById("buttonToggleCardActiveProject");

                    if (cardActiveProject.classList.contains('block')) {
                        removeClass(buttonToggleCardActiveProject, "bg-secondary text-gray-800");
                        addClass(buttonToggleCardActiveProject, "bg-primary text-gray-200");
                    } else {
                        removeClass(buttonToggleCardActiveProject, "bg-primary text-gray-200");
                        addClass(buttonToggleCardActiveProject, "bg-secondary text-gray-800");
                    }

                    $('#buttonToggleCardActiveProject').on('click', function() {
                        var cardActiveProject = document.getElementById("cardActiveProject");
                        var buttonToggleCardActiveProject = document.getElementById(
                            "buttonToggleCardActiveProject");

                        if (cardActiveProject.classList.contains('block')) {
                            removeClass(cardActiveProject, "block");
                            addClass(cardActiveProject, "hidden");

                            removeClass(buttonToggleCardActiveProject, "bg-primary text-gray-200");
                            addClass(buttonToggleCardActiveProject, "bg-secondary text-gray-800");
                        } else {
                            removeClass(cardActiveProject, "hidden");
                            addClass(cardActiveProject, "block");

                            removeClass(buttonToggleCardActiveProject, "bg-secondary text-gray-800");
                            addClass(buttonToggleCardActiveProject, "bg-primary text-gray-200");
                        }
                    })
                }

                function grafikTransaksi() {
                    var grafikTransaksi = document.getElementById("grafikTransaksi");
                    var buttonToggleGrafikTransaksi = document.getElementById("buttonToggleGrafikTransaksi");

                    if (grafikTransaksi.classList.contains('block')) {
                        removeClass(buttonToggleGrafikTransaksi, "bg-secondary text-gray-800");
                        addClass(buttonToggleGrafikTransaksi, "bg-primary text-gray-200");
                    } else {
                        removeClass(buttonToggleGrafikTransaksi, "bg-primary text-gray-200");
                        addClass(buttonToggleGrafikTransaksi, "bg-secondary text-gray-800");
                    }

                    $('#buttonToggleGrafikTransaksi').on('click', function() {
                        var grafikTransaksi = document.getElementById("grafikTransaksi");
                        var buttonToggleGrafikTransaksi = document.getElementById(
                            "buttonToggleGrafikTransaksi");

                        if (grafikTransaksi.classList.contains('block')) {
                            removeClass(grafikTransaksi, "block");
                            addClass(grafikTransaksi, "hidden");

                            removeClass(buttonToggleGrafikTransaksi, "bg-primary text-gray-200");
                            addClass(buttonToggleGrafikTransaksi, "bg-secondary text-gray-800");
                        } else {
                            removeClass(grafikTransaksi, "hidden");
                            addClass(grafikTransaksi, "block");

                            removeClass(buttonToggleGrafikTransaksi, "bg-secondary text-gray-800");
                            addClass(buttonToggleGrafikTransaksi, "bg-primary text-gray-200");
                        }
                    })
                }

                function grafikKuantiti() {
                    var grafikKuantiti = document.getElementById("grafikKuantiti");
                    var buttonToggleGrafikKuantiti = document.getElementById("buttonToggleGrafikKuantiti");

                    if (grafikKuantiti.classList.contains('block')) {
                        removeClass(buttonToggleGrafikKuantiti, "bg-secondary text-gray-800");
                        addClass(buttonToggleGrafikKuantiti, "bg-primary text-gray-200");
                    } else {
                        removeClass(buttonToggleGrafikKuantiti, "bg-primary text-gray-200");
                        addClass(buttonToggleGrafikKuantiti, "bg-secondary text-gray-800");
                    }

                    $('#buttonToggleGrafikKuantiti').on('click', function() {
                        var grafikKuantiti = document.getElementById("grafikKuantiti");
                        var buttonToggleGrafikKuantiti = document.getElementById(
                            "buttonToggleGrafikKuantiti");

                        if (grafikKuantiti.classList.contains('block')) {
                            removeClass(grafikKuantiti, "block");
                            addClass(grafikKuantiti, "hidden");

                            removeClass(buttonToggleGrafikKuantiti, "bg-primary text-gray-200");
                            addClass(buttonToggleGrafikKuantiti, "bg-secondary text-gray-800");
                        } else {
                            removeClass(grafikKuantiti, "hidden");
                            addClass(grafikKuantiti, "block");

                            removeClass(buttonToggleGrafikKuantiti, "bg-secondary text-gray-800");
                            addClass(buttonToggleGrafikKuantiti, "bg-primary text-gray-200");
                        }
                    })
                }

            });
        </script>
    @endpush
</x-backend-layout>
