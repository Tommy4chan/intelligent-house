@extends('dashboard.layouts.sidebar')

@section('title')Домашня сторінка@endsection

@section('main_content')

<div class="main-content">
    <div class="container">
      <div class="hello">
        <h2><i class="bi bi-house-fill"></i> Привіт, {{Auth::user()->name}}</h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="status-card dark-box rounded d-flex align-items-center">
            <div class="image-box">
              <img src="{{ URL::asset('images/relay_icon.png') }}" alt="hugenerd" class="rounded">
            </div>
            <div class="text-box">
              <h5>Реле №1</h5>
              <p>Статус: <span class="@isPositive($relayOne[2])">{{$relayOne[3]}}</span></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-card dark-box rounded d-flex align-items-center">
            <div class="image-box">
              <img src="{{ URL::asset('images/relay_icon.png') }}" alt="hugenerd" class="rounded">
            </div>
            <div class="text-box">
              <h5>Реле №2</h5>
              <p>Статус: <span class="@isPositive($relayTwo[2])">{{$relayTwo[3]}}</span></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-card dark-box rounded d-flex align-items-center">
            <div class="image-box">
              <img src="{{ URL::asset('images/device-icon.png') }}" alt="hugenerd" class="rounded">
            </div>
            <div class="text-box">
              <h5>{{$device->name}}</h5>
              <p>Статус: <span {!! $device->isOnline() !!}</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="chart-card dark-box rounded h-100 d-flex align-items-center" data-temperature="@for ($i = 0; $i < 24; $i++){{$temperatureDataByDate[$i]}}, @endfor">
            <div class="w-100">
              <div class="text-box d-flex justify-content-between">
                <div class="temperature">
                  <h5>T<span id="chart-temp-number">{{$temperatureDataByDate[27]}}</span>: <span id="chart-temp">{{$temperatureDataByDate[24]}}</span>°c</h5>
                  <p class="gray-text"><span>Min: <span id="chart-temp-min">{{$temperatureDataByDate[25]}}</span>°c</span> | <span>Max: <span id="chart-temp-max">{{$temperatureDataByDate[26]}}</span>°c</span></p>
                </div>
                <div class="date">
                  Дата:
                  <input type="text" id="datepicker" disabled>
                  <i class="bi bi-calendar-fill"></i>
                </div>
              </div>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="temperature-card dark-box rounded h-100">
            <h3>Температура</h3>
            <button value="0" class="primary-button rounded choosed">T0: <span id="temperature-data-0">{{$temperatureData[0]}}</span>°c</button>
            <button value="1" class="primary-button rounded">T1: <span id="temperature-data-1">{{$temperatureData[1]}}</span>°c</button>
            <button value="2" class="primary-button rounded">T2: <span id="temperature-data-2">{{$temperatureData[2]}}</span>°c</button>
            <button value="3" class="primary-button rounded">T3: <span id="temperature-data-3">{{$temperatureData[3]}}</span>°c</button>
            <button value="4" class="primary-button rounded">T4: <span id="temperature-data-4">{{$temperatureData[4]}}</span>°c</button>
            <button value="5" class="primary-button rounded">T5: <span id="temperature-data-5">{{$temperatureData[5]}}</span>°c</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="relay-controll dark-box rounded h-100">
            <h3>Контроль реле</h3>
            <div class="text-box d-flex justify-content-between align-items-center">
              <p>Реле №1</p>
              <button value="{{$relayOne[0]}}" data-relay-number="0" class="primary-button rounded">{{$relayOne[1]}}</button>
            </div>
            <div class="text-box d-flex justify-content-between align-items-center">
              <p>Реле №2</p>
              <button value="{{$relayTwo[0]}}" data-relay-number="1" class="primary-button rounded">{{$relayTwo[1]}}</button>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="device-status dark-box rounded h-100">
            <h3>Статус пристрою</h3>
            <p class="gray-text">Синхронізація: {{$deviceStatus[0]}}</p>
            <p class="gray-text">Перезавантажено: {{$deviceStatus[1]}}</p>
            <p class="gray-text">Версія прошивки: V{{$deviceStatus[2]}}</p>
            <p class="gray-text">Мережа: {{$deviceStatus[3]}}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="logs dark-box rounded h-100">
            <h3>Останні дії</h3>
            <div class="logs-block">
            @foreach($deviceLogs as $deviceLog)
            <p class="gray-text">{{$deviceLog}}</p>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="{{ URL::asset('js/dashboard-home.js') }}"></script>


@endsection