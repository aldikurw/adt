<link rel="stylesheet" href="../../assets/vendors/iconly/bold.css">
<link rel="stylesheet" href="../../assets/vendors/apexcharts/apexcharts.css">
<style>
    #chart-pemasukan-dan-pengeluaran {
        height: 350px;
    }
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldHome"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Home Wifi
                                <span class="spansub">Lunas/Belum</span>
                            </h6>
                            <h6 class="font-extrabold mb-0">0/4</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="iconly-boldTicket"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Pemasukan Voucher
                                <span class="spansub">Hari ini</span>
                            </h6>
                            <h6 class="font-extrabold mb-0">Rp 500.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Tiket
                                <span class="spansub">PSB/Gangguan</span>
                            </h6>
                            <h6 class="font-extrabold mb-0">1/1</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Pemasukan dan Pengeluaran
                        <span class="spansub">7 hari terakhir</span>
                    </h3>
                    <div id="chart-pemasukan-dan-pengeluaran"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="../../assets/vendors/apexcharts/apexcharts.css""></script>
<script>
    var options = {
        series: [{
            name: 'Pemasukan',
            data: [310000, 400000, 280000, 510000, 420000, 209000, 300000]
        }, {
            name: 'Pengeluaran',
            data: [110000, 320000, 450000, 320000, 340000, 520000, 410000]
        }],
        colors: ['#00E396', '#FF4560'],
        chart: {
            type: 'area',
            height: '350px',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19", "2018-09-20", "2018-09-21", "2018-09-22", "2018-09-23", "2018-09-24", "2018-09-25"]
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    };
    var chart = new ApexCharts(document.querySelector("#chart-pemasukan-dan-pengeluaran"), options);
    chart.render();
</script>