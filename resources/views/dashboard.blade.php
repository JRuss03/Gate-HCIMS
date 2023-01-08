@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')


    {{-- {{ dd($pregData['chart_data']) }} --}}


    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-row row">
                        <div class="col-lg-1">
                            <i class='bx bx-user-circle' style="font-size: 3rem;"></i>
                        </div>
                        <div class="col-lg-11" style="padding-left: 35px; margin-top: 5px;">
                            <h5><strong>Juan Dela Cruz</strong></h5>
                            <h6 style="font-size: .8rem; margin-top: -10px;">System Administrator</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"></div>
            </div>
            <div class="form-row d-flex align-items-center justify-content-between" style="margin: 50px 0px 30px 0px;">
                <h3><strong>Residents</strong></h3>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="tab active d-flex align-items-center" id="pregnant-tab" data-bs-toggle="tab" href="#pregnant"
                            role="tab" aria-controls="other" aria-selected="false">
                            <i class='bx bxs-user-detail'></i>
                            Pregnant Citizen
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="tab d-flex align-items-center ms-2" id="senior-tab" data-bs-toggle="tab" href="#senior"
                            role="tab" aria-controls="location" aria-selected="false">
                            <i class='bx bxs-user-detail'></i>
                            Senior Citizen
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="tab d-flex align-items-center ms-2" id="baby-tab" data-bs-toggle="tab" href="#baby"
                            role="tab" aria-controls="hospital" aria-selected="false">
                            <i class='bx bxs-user-detail'></i>
                            Infants
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="tab-content" id="myTabContent">
        
                    {{-- Pregnant Tab --}}

                    <div class="tab-pane fade show active" id="pregnant" role="tabpanel" aria-labelledby="pregnant-tab">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            {{-- <i class='bx bx-user' style="font-size: 1.8rem;"></i> --}}
                                            <h2 class="ms-1" style="margin-top: 5px; font-weight: bolder; font-size: 3rem">{{ count($pregnantCount) }}</h2>
                                        </div>
                                        <div class="ms-3">
                                            <h6 style="font-size: 12px;">Total</h6>
                                            <h6 style="font-size: 12px; margin-top: -5px;">Pregnant Citizen</h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 20px 0px;">
                                        <div class="col-xl-4">
                                            <label for="prob_other_birth">Year</label>
                                            <div class="d-flex align-items-center">
                                                <select name="" id="selectPregYear" class="form-select">
                                                    <option value="">Select year</option>
                                                    @foreach ($pregYears as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                                <a class="ms-3" id="pregYear"> 
                                                    <i class='bx bx-filter btn-table btn-edit' data-tippy-content="Filter by year only" data-tippy-arrow="false"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <label for="prob_other_birth">Month or Week (Start & End date)</label>
                                            <div class="d-flex align-items-center">
                                                <input type="date" name="" id="pregStart" class="form-control">
                                                <input type="date" name="" id="pregEnd" class="form-control ms-1">
                                                <a class="ms-3" id="pregFilter"> 
                                                    <i class='bx bx-filter btn-table btn-edit' data-tippy-content="Filter data" data-tippy-arrow="false"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Senior Tab --}}

                    {{-- <div class="tab-pane fade show" id="senior" role="tabpanel" aria-labelledby="senior-tab">
                        <div class="col-lg-12" style="margin-top: 30px;">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <h2 class="ms-1" style="margin-top: 5px; font-weight: bolder; font-size: 3rem">{{ count($seniorCount) }}</h2>
                                        </div>
                                        <div class="ms-3">
                                            <h6 style="font-size: 12px;">Total</h6>
                                            <h6 style="font-size: 12px; margin-top: -5px;">Senior Citizen</h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 20px 0px;">
                                        <div class="col-xl-4">
                                            <label for="prob_other_birth">Year</label>
                                            <div class="d-flex align-items-center">
                                                <select name="" id="selectSeniorYear" class="form-select">
                                                    <option value="">Select year</option>
                                                    @foreach ($seniorYears as $syear)
                                                        <option value="{{ $syear }}">{{ $syear }}</option>
                                                    @endforeach
                                                </select>
                                                <a class="ms-3" id="seniorYear"> 
                                                    <i class='bx bx-filter btn-table btn-edit' data-tippy-content="Filter by year only" data-tippy-arrow="false"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <label for="prob_other_birth">Month or Week (Start & End date)</label>
                                            <div class="d-flex align-items-center">
                                                <input type="date" name="" id="seniorStart" class="form-control">
                                                <input type="date" name="" id="seniorEnd" class="form-control ms-1">
                                                <a class="ms-3" id="seniorFilter"> 
                                                    <i class='bx bx-filter btn-table btn-edit' data-tippy-content="Filter data" data-tippy-arrow="false"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><canvas id="smyChart"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- Baby Tab --}}

                    <div class="tab-pane fade show" id="baby" role="tabpanel" aria-labelledby="baby-tab">
                        <div class="col-lg-12" style="margin-top: 30px;">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            {{-- <i class='bx bx-user' style="font-size: 1.8rem;"></i> --}}
                                            <h2 class="ms-1" style="margin-top: 5px; font-weight: bolder; font-size: 3rem">{{ count($babyCount) }}</h2>
                                        </div>
                                        <div class="ms-3">
                                            <h6 style="font-size: 12px;">Total</h6>
                                            <h6 style="font-size: 12px; margin-top: -5px;">Infant Citizen</h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 20px 0px;">
                                        <div class="col-xl-4">
                                            <label for="prob_other_birth">Year</label>
                                            <div class="d-flex align-items-center">
                                                <select name="" id="selectBabyYear" class="form-select">
                                                    <option value="">Select year</option>
                                                    @foreach ($babyYears as $byear)
                                                        <option value="{{ $byear }}">{{ $byear }}</option>
                                                    @endforeach
                                                </select>
                                                <a class="ms-3" id="babyYear"> 
                                                    <i class='bx bx-filter btn-table btn-edit' data-tippy-content="Filter by year only" data-tippy-arrow="false"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <label for="prob_other_birth">Month or Week (Start & End date)</label>
                                            <div class="d-flex align-items-center">
                                                <input type="date" name="" id="babyStart" class="form-control">
                                                <input type="date" name="" id="babyEnd" class="form-control ms-1">
                                                <a class="ms-3" id="babyFilter"> 
                                                    <i class='bx bx-filter btn-table btn-edit' data-tippy-content="Filter data" data-tippy-arrow="false"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><canvas id="bmyChart"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('page-scripts')

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'title',
                    center: 'dayGridMonth,listMonth',
                    right: 'prev,next'
                },
                timeFormat: 'H(:mm)',
                events: [
                   {
                    title: 'Juana Dela Cruz',
                    start: '2022-10-19',
                    textColor: '#fff',
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                    end: '2022-10-19',
                   }
                ]
            });
            calendar.render();
        });
        
    </script>  --}}
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        var pData = JSON.parse(`<?php echo $pregData['chart_data']; ?>`);

        const myChart = new Chart(ctx, {
            type: 'line',
             data: {
                labels: pData.label,
                datasets: [{
                    label: 'Pregnant Residents',
                    data: pData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        // const sctx = document.getElementById('smyChart').getContext('2d');

        // var sData = JSON.parse(`<?php echo $seniorData['chart_data']; ?>`);

        // const smyChart = new Chart(sctx, {
        //     type: 'line',
        //     data: {
        //         labels: sData.label,
        //         datasets: [{
        //             label: 'Senior Citizen',
        //             data: sData.data,
        //             backgroundColor: [
        //                 'rgba(75, 192, 192, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(75, 192, 192, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         plugins: {
        //             legend: {
        //                 position: 'bottom'
        //             }
        //         }
        //     }
        // });

        const bctx = document.getElementById('bmyChart').getContext('2d');

        var bData = JSON.parse(`<?php echo $babyData['chart_data']; ?>`);

        const bmyChart = new Chart(bctx, {
            type: 'line',
            data: {
                labels: bData.label,
                datasets: [{
                    label: 'Infants',
                    data: bData.data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
    </script>

<script>
    $(document).ready(function() {
    
        $('#pregYear').on('click', function(){ // Pregnant filter by year only
            var year = $('#selectPregYear').val();
            
            $.ajax({

                type: "GET",
                url: "/dashboard/pregnant/get-year/" + year,
                dataType: 'json',
                success: function (response){
                    console.log(response.data);

                    myChart.data.labels = response.data.label;
                    myChart.data.datasets[0].data = response.data.data;
                    myChart.update();

                },
                error: function(error){
                    console.log(error);
                }

            });
        });

        $('#seniorYear').on('click', function(){ // Senior filter by year only
            var year = $('#selectSeniorYear').val();
            
            $.ajax({

                type: "GET",
                url: "/dashboard/senior/get-year/" + year,
                dataType: 'json',
                success: function (response){
                    console.log(response.data);

                    smyChart.data.labels = response.data.label;
                    smyChart.data.datasets[0].data = response.data.data;
                    smyChart.update();

                },
                error: function(error){
                    console.log(error);
                }

            });
        });

        $('#babyYear').on('click', function(){ // Baby filter by year only
            var year = $('#selectBabyYear').val();
            
            $.ajax({

                type: "GET",
                url: "/dashboard/baby/get-year/" + year,
                dataType: 'json',
                success: function (response){
                    console.log(response.data);

                    bmyChart.data.labels = response.data.label;
                    bmyChart.data.datasets[0].data = response.data.data;
                    bmyChart.update();

                },
                error: function(error){
                    console.log(error);
                }

            });
        });

        $('#pregFilter').on('click', function(){ // Pregnant filter
            var year = $('#selectPregYear').val();
            var start = $('#pregStart').val();
            var end = $('#pregEnd').val();

            var getmonth = moment(start);
            var month = getmonth.format('MMMM');

            var getstart = moment(start);
            var startDate = getstart.format('D');

            var getend = moment(end);
            var endDate = getend.format('D');

            $.ajax({

                type: "GET",
                url: "/dashboard/pregnant/filter",
                data: {
                    'year':year,
                    'start':startDate,
                    'end':endDate,
                    'month':month
                },
                dataType: 'json',
                success: function (response){
                    console.log(response.data);

                    myChart.data.labels = response.data.label;
                    myChart.data.datasets[0].data = response.data.data;
                    myChart.update();

                },
                error: function(error){
                    console.log(error);
                }

            });
        });

        $('#seniorFilter').on('click', function(){ // Senior filter
            var year = $('#selectSeniorYear').val();
            var start = $('#seniorStart').val();
            var end = $('#seniorEnd').val();

            var getmonth = moment(start);
            var month = getmonth.format('MMMM');

            var getstart = moment(start);
            var startDate = getstart.format('D');

            var getend = moment(end);
            var endDate = getend.format('D');

            $.ajax({

                type: "GET",
                url: "/dashboard/senior/filter",
                data: {
                    'year':year,
                    'start':startDate,
                    'end':endDate,
                    'month':month
                },
                dataType: 'json',
                success: function (response){
                    console.log(response.data);

                    smyChart.data.labels = response.data.label;
                    smyChart.data.datasets[0].data = response.data.data;
                    smyChart.update();

                },
                error: function(error){
                    console.log(error);
                }

            });
        });

        $('#babyFilter').on('click', function(){ // Baby filter
            var year = $('#selectBabyYear').val();
            var start = $('#babyStart').val();
            var end = $('#babyEnd').val();

            var getmonth = moment(start);
            var month = getmonth.format('MMMM');

            var getstart = moment(start);
            var startDate = getstart.format('D');

            var getend = moment(end);
            var endDate = getend.format('D');

            $.ajax({

                type: "GET",
                url: "/dashboard/baby/filter",
                data: {
                    'year':year,
                    'start':startDate,
                    'end':endDate,
                    'month':month
                },
                dataType: 'json',
                success: function (response){
                    console.log(response.data);

                    bmyChart.data.labels = response.data.label;
                    bmyChart.data.datasets[0].data = response.data.data;
                    bmyChart.update();

                },
                error: function(error){
                    console.log(error);
                }

            });
        });

    });

</script>

@endsection
    
@endsection