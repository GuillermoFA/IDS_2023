@extends('layouts.app')

@section('title')
   Recaudación de ventas
@endsection

@section('content')
    <div class="ChartTable">
        <table class="table table-responsive table-striped table-bordered border-dark">
            <tr>
                <td rowspan="2">&nbsp;
                    <center>
                        <h3 style="font-size:24px">Porcentaje de Ventas por Medio de Pago</h3>
                        <h3 class="errorChartMessage" id="PieChartError"></h3>
                    </center>
                    <div class="PieChart">
                        <canvas id="PercentageChart"></canvas>
                    </div>
                </td>
            </tr>
            <tr>
                <td rowspan="2" class="">&nbsp;
                    <center>
                        <h3 style="font-size:24px">Ventas por Concierto</h3>
                    </center>
                    <center>
                    <div class="DivSelect">
                        <select id="SelectConcert"  class="CollectionSelect">
                            @foreach($concerts as $concert)
                                <option value="bar-concerts">{{$concert->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3 class="errorChartMessage" id="ChartSelectedError"></h3>
                    </center>
                    <div class="BarChartSelect">
                        <canvas id="ConcertChart"></canvas>
                    </div>
                </td>
            </tr>
            <tr>
                <td>&nbsp;
                    <center>
                        <h3 style="font-size:24px">Ventas por Medio de Pago</h3>
                        <h3 class="errorChartMessage" id="PaymentChartError"></h3>
                    </center>
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