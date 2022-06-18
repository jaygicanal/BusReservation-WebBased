@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsforecasting-style.css')}}"> 
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.2/dist/echarts.min.js"></script>
@endpush
@section('content')

<section class="forecasting">
    <div class="row">
        <div class="col-md-12"> 
            <div class="forecasting-head d-flex align-items-center ps-4">                    
                <h3>Forecasting</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="forecast-col" style="width:100%;height:450px;"></div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        fetchDataGender();
        function fetchDataReserved(){
            var myChart = echarts.init(document.getElementById('forecast-col'));
            
            var option = {
                animationDuration: 750,
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
                url: '{{ route('reserved') }}',
                type: 'GET',
                /* data:{input_category:$('.forecast-data').find('#category :selected').val()}, */
                success: function(response){ 
                    var months = [];
                    var reserved = [];
                    //var forecast = [];
                    $.each(response, function(index, item) {
                        months.push(item.monthlyData);
                        reserved.push(item.reservedValue);
                        //forecast.push(item.forecastDemand);
                    });
                    
                    myChart.setOption ({
                        legend: {
                            data: ['total reservation'],
                            itemHeight: 8,
                            itemGap: 20
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
                            /* {
                                name: 'forecast-demand',
                                type: 'line',
                                data: forecastDemand,
                                color: ['#ff0000'],
                            }, */
                            {
                                name: 'total reservation',
                                type: 'line',
                                data: reserved,
                                color: ['#007fff'],
                            }
                            
                        ]
                        
                    });
                }
            });
        }
        function fetchDataGender(){
            var myChart = echarts.init(document.getElementById('forecast-col'));
            
            var option = {
                animationDuration: 750,
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
                url: '{{ route('genderForecast') }}',
                type: 'GET',
                /* data:{input_category:$('.forecast-data').find('#category :selected').val()}, */
                success: function(response){ 
                    var months = [];
                    var genderMale = [];
                    var genderFemale = [];
                    $.each(response, function(index, item) {
                        months.push(item.monthlyData);
                        genderMale.push(item.maleValue);
                        genderFemale.push(item.femaleValue);
                    });
                    
                    myChart.setOption ({
                        legend: {
                            data: ['Male', 'Female'],
                            itemHeight: 8,
                            itemGap: 20
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
                                name: 'Male',
                                type: 'bar',
                                data: genderMale,
                                color: ['#ff0000'],
                            },
                            {
                                name: 'Female',
                                type: 'bar',
                                data: genderFemale,
                                color: ['#007fff'],
                            }
                            
                        ]
                        
                    });
                }
            });
        }
    })
</script>
@endsection