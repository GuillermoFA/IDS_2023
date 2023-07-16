@extends('layouts.app')

@section('title')
   Recaudación de ventas
@endsection

@section('content')
    <div class="ChartTable">
        <table class="table table-responsive table-striped table-bordered border-dark">
            <tr>
                <td rowspan="2">&nbsp;
                    <div class="PieChart">
                        <canvas id="PercentageChart"></canvas>
                    </div>
                </td>
            </tr>
            <tr>
                <td rowspan="2" class="">&nbsp;
                    <select id="SelectConcert" class="CollectionSelect" >
                        @foreach($concerts as $concert)
                            <option value="bar-concerts">{{$concert->name}}</option>
                        @endforeach
                    </select>
                    <div class="BarChartSelect">
                        <canvas id="ConcertChart"></canvas>
                    </div>
                </td>
            </tr>
            <tr>
                <td>&nbsp;
                    <div class ="BarChartPayment">
                        <canvas id="MethodChart"></canvas>
                    </div>
                </td>
            </tr>
        </table>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/ConcertChart.js') }}"></script>
    <script src="{{ asset('assets/js/MethodChart.js') }}"></script>
@endsection