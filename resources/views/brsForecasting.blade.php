@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsforecasting-style.css')}}"> 
    
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.2/dist/echarts.min.js"></script>
@endpush
@section('content')

<section class="forecasting">
    <div class="">
        <div class="row">
            <div class="col-md-12" style="padding:0;"> 
                <div class="forecasting-head d-flex align-items-center ps-4">                    
                    <h3>Forecasting</h3>
                </div>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-12 d-flex search-data">
                <select name="genderOpt" id="genderOpt" class="form-select js-example-basic-single me-2" style="width: 200px">
                    <option value="All" selected>All</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Children">Children (0-14)</option>
                    <option value="Working Age">Working Age (15-64)</option>
                    <option value="Seniors">Seniors (65-above)</option>
                </select>
                <input type="text" name="" id="yearpicker">
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-8">
                <div id="forecast-col" style="width:100%;height:450px;"></div>
            </div>
            <div class="col-md-4">
                <form action="forecast" method="post">
                    @csrf
                    <input type="month" name="monthForecast" id="monthForecast" required>
                    <select class="form-select" name="typeForecast" id="typeForecast" required>
                        <option selected>Choose to Forecast</option>
                        <option value="All">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Children">Children</option>
                        <option value="Working Age">Working Age</option>
                        <option value="Seniors">Seniors</option>
                    </select>
                    <table class="table table-bordered table-striped mt-4" id="forecast_tbl">
                        <thead>
                            <td scope="col">Year</td>
                            <td scope="col">Month</td>
                            <td scope="col">
                                
                            </td>
                        </thead>
                        <tbody id="forecast_body">
                            <tr id="row_forecast">
                                <td>
                                    <select name="year" class="form-select js-example-basic-single yearRecordList" style="width: 150px" required>
                                        <option></option>
                                    </select>
                                </td>
                                <td>
                                    <select name="month" class="form-select js-example-basic-single monthRecordList" style="width: 150px" required>
                                        <option></option>
                                    </select>
                                    <input type="text" name="values[]" class="form-input valuesRecordList" required hidden>
                                </td>
                                <td class="btn-inner">
                                    <button type="button" class="btn btn-danger" id="btn_remove">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="action-buttons d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" id="btn_add">
                            <i class="fa fa-plus" aria-hidden="true"></i> ADD COLUMN
                        </button>
                        <button type="submit" class="btn btn-success ms-2" id="btn_add">
                            FORECAST
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        fetchData();

        $('#genderOpt').change(function(){
            fetchData();
        })

        $('#yearpicker').change(function(){
            fetchData();
        })

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

        function fetchData(){
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
                url: '{{ route('genderForecast') }}',
                type: 'GET',
                data:{record:$('.forecasting').find('#genderOpt :selected').val(), year:$('#yearpicker').val()},
                success: function(response){ 
                    var months = [];
                    var records = [];
                    var forecast = [];
                    $.each(response, function(index, item) {
                        months.push(item.monthlyData);
                        records.push(item.recordsValue);
                        forecast.push(item.forecastValue);
                    });
                    
                    myChart.setOption ({
                        legend: {
                            data: ['records', 'forecast'],
                            itemHeight: 10,
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
                                name: 'records',
                                type: 'line',
                                data: records,
                                color: ['#007fff'],
                            },
                            {
                                name: 'forecast',
                                type: 'line',
                                data: forecast,
                                color: ['#fc491d'],
                            }
                            
                        ]
                        
                    });
                }
            });
        }
    })
</script>

<script>
    $(document).ready(function(){
        $('#typeForecast').change(function(){
            $(".yearRecordList").empty();
            $(".monthRecordList").empty();
            fetchYearForecast();
            
        })
        $('.yearRecordList').change(function(){
            fetchMonthForecast();
        })

        $('#btn_add').on('click', function(){
            var new_order='';
            
            new_order+='<tr id="row_forecast">';
            new_order+='<td><select name="year" class="form-select js-example-basic-single yearRecordList">';
            new_order+='<option></option>';
            new_order+='</select></td>';
            new_order+='<td><select name="month" class="form-select js-example-basic-single monthRecordList">';
            new_order+='<option></option>';
            new_order+='</select><input type="text" name="values[]" class="valuesRecordList" hidden></td>';
            new_order+='<td class="btn-inner">';
            new_order+='<button type="button" class="btn btn-danger" id="btn_remove">';
            new_order+='<i class="fa fa-times" aria-hidden="true"></i>';
            new_order+='</button></td>';
            new_order+='</tr>';
            
            $('#forecast_body').append(new_order);

            //initialize select2 for Year
            fetchYearForecast();
            $('.yearRecordList').change(function(){
                fetchMonthForecast();
            })
        });

        function fetchYearForecast(){
            //alert($('.forecasting').find('#typeForecast :selected').val());
            $(".yearRecordList").select2({
                selectOnClose: true,
                placeholder: "-- Choose Item --",
                ajax: {
                    url: "{{ route('yearRecordsGender') }}",
                    type: "get",
                    delay: 250,
                    dataType: 'json',
                    data: {records:$('.forecasting').find('#typeForecast :selected').val()},
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
            });
        }

        function fetchMonthForecast(){
            var parentTR = $('.monthRecordList').closest('tr');
            $(".monthRecordList").select2({
                selectOnClose: true,
                placeholder: "-- Choose Item --",
                ajax: {
                    url: "{{ route('monthRecordsGender') }}",
                    type: "get",
                    delay: 250,
                    dataType: 'json',
                    data: {year:parentTR.find('.yearRecordList :selected').val(), records:$('.forecasting').find('#typeForecast :selected').val()},
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
            });
            fetchTotalValues();
        }

        function fetchTotalValues(){
            $('.monthRecordList').on('change', function(){
                var selected = $(this).find(':selected').val();  
                var parentTR = $(this).closest('tr');

                $.ajax({
                    url: "{{ route('valueRecordsGender') }}",
                    type: "get",
                    dataType: 'json',
                    data:{month:parentTR.find('.monthRecordList :selected').val(), year:parentTR.find('.yearRecordList :selected').val(), records:$('#typeForecast :selected').val()},
                    success: function(response){ // What to do if we succeed
                        parentTR.find('.valuesRecordList').val(response[0].total_records);
                    }
                });
                
            });
        }
    }) 

    $(document).on('click', '#btn_remove', function(){
        $(this).closest('tr').remove();
    });

    $(document).on('hidden.bs.modal', function(){
        $(".forecast_tbl tbody").find("tr:gt(0)").remove();
        $('#ormAddForecast form')[0].reset();

        $(".yearList").select2({});
        $(".monthList").select2({});
    });

    $('#btn_forecast').click(function(){ 
        $(".forecast_tbl tbody").find("tr:gt(0)").remove();
        $('#ormAddForecast form')[0].reset();
    });
</script>
@endsection