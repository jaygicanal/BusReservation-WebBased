@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsdashboard-style.css')}}"> 
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.2/dist/echarts.min.js"></script>
@endpush

@section('content')
    <section class="dashboard">
        <div class="">
            <div class="row d-flex align-items-center">
                <div class="col-md-8">
                    <div id="chartReserveCancel" style="width:100%;height:450px;"></div>
                </div>
                <div class="col-md-4">
                    <div class="box-records user">
                        <div class="box-values d-flex justify-content-center"></div>
                        <div class="box-title d-flex justify-content-center">Total Registered User</div>
                    </div>
                    <div class="box-records booked">
                        <div class="box-values d-flex justify-content-center"></div>
                        <div class="box-title  d-flex justify-content-center">Total Successfully Booked</div>
                    </div>
                    <div class="box-records revenue">
                        <div class="box-values d-flex justify-content-center"></div>
                        <div class="box-title d-flex justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        fetchRecordsData();
        fetchRecords();
        function fetchRecords(){
            var currentYear = new Date().getFullYear();
            $.ajax({
                url: '{{ route('fetchRecords') }}',
                type: 'GET',
                data:{year:currentYear},
                success: function(response){ 
                    if(response[0].totalUser == null){
                        $('.user .box-values').text(0);
                    }else{
                        $('.user .box-values').text(response[0].totalUser);
                    }

                    if(response[0].totBooked == null){
                        $('.booked .box-values').text(0);
                    }else{
                        $('.booked .box-values').text(response[0].totBooked);
                    }

                    if(response[0].totRevenue == null){
                        $('.revenue .box-values').text(0);
                    }else{
                        $('.revenue .box-values').text(response[0].totRevenue);
                    }
                    $('.revenue .box-title').text("Total Revenue (" + currentYear + ")");
                    
                }
            });
        }
        function fetchRecordsData(){
            var currentYear = new Date().getFullYear();
            var myChart = echarts.init(document.getElementById('chartReserveCancel'));
            
            var option = {
                animationDuration: 750,
                title:{
                    show: true,
                    text: 'Monthly Cancelled and Finished Booked',
                    left: 'center'
                },
                grid: {
                    containLabel: true
                },
                legend: {
                },    
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(0,0,0,0.75)',
                    padding: [10, 15],
                    textStyle: {
                        color: '#ffffff',
                        fontSize: 13,
                        fontFamily: 'Poppins, sans-serif'                        
                    }
                },
                xAxis: {
                },
                yAxis: {
                },
                series: [
                ]
            };

            myChart.setOption(option);

            $.ajax({
                url: '{{ route('searchRC') }}',
                type: 'GET',
                data:{year:currentYear},
                success: function(response){ 
                    var months = [];
                    var finished = [];
                    var cancelled = [];

                    $.each(response, function(index, item) {
                        months.push(item.monthlyData);
                        finished.push(item.finishedValue);
                        cancelled.push(item.cancelledValue);
                    });
                    
                    myChart.setOption ({
                        legend: {
                            data: ['finished', 'cancelled'],
                            itemHeight: 10,
                            itemGap: 20,
                            top: 'bottom'
                        },
                        xAxis: {
                            type:'category',
                            data: months,
                            boundaryGap: false,
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                lineStyle: {
                                    color: ['#eee']
                                }
                            }
                        },
                        yAxis: {
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#ddd'
                                }
                            },
                            splitLine: {
                                lineStyle: {
                                    color: ['#eee']
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                }
                            }
                        },
                        series: [
                            {
                                name: 'finished',
                                type: 'line',
                                data: finished,
                                color: ['#007fff'],
                            },
                            {
                                name: 'cancelled',
                                type: 'line',
                                data: cancelled,
                                color: ['#fc491d'],
                            }
                            
                        ]
                        
                    });
                }
            });
        }
    </script>
@endsection