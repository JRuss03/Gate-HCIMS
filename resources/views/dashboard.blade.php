@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')


    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-7">
                    <div class="form-row row">
                        <div class="col-lg-1">
                            <i class='bx bx-user-circle' style="font-size: 4.8rem;"></i>
                        </div>
                        <div class="col-lg-11" style="padding-left: 50px;">
                            <h2><strong>Juan Dela Cruz</strong></h2>
                            <h6>System Administrator</h6>
                        </div>
                    </div>
                    <div class="form-row row" style="margin-top: 50px;">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <p><strong>Residents Added Today</strong></p>
                                        <h2><strong>5</strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <p><strong>Check-ups Today</strong></p>
                                    <h2><strong>10</strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row row" style="margin-bottom: 30px;">
                <h3><strong>Residents</strong></h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="smyChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="bmyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('page-scripts')

    <script>

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
        
    </script> 
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Pregnant Residents',
                    data: [12, 19, 3, 5, 2, 3],
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
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const sctx = document.getElementById('smyChart').getContext('2d');
        const smyChart = new Chart(sctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Senior Residents',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const bctx = document.getElementById('bmyChart').getContext('2d');
        const bmyChart = new Chart(bctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Baby Residents',
                    data: [12, 19, 3, 5, 2, 3],
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
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
    
@endsection