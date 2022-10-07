@extends('dashboard.layouts.sidebar')

@section('title')Домашня сторінка@endsection

@section('main_content')

<div class="main-content">
    <div class="container">
      <div class="hello">
        <h2><i class="bi bi-house-fill"></i> Привіт Tommy4chan</h2>
        <p class="gray-text"><i class="bi bi-calendar-fill"></i> 30 Вересня </p>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="status-card dark-box rounded d-flex align-items-center">
            <div class="image-box">
              <img src="images/relay_icon.png" alt="hugenerd" class="rounded">
            </div>
            <div class="text-box">
              <h5>Реле №1</h5>
              <p>Статус: <span class="negative">Виключене</span></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-card dark-box rounded d-flex align-items-center">
            <div class="image-box">
              <img src="images/relay_icon.png" alt="hugenerd" class="rounded">
            </div>
            <div class="text-box">
              <h5>Реле №2</h5>
              <p>Статус: <span class="negative">Виключене</span></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-card dark-box rounded d-flex align-items-center">
            <div class="image-box">
              <img src="images/device-icon.png" alt="hugenerd" class="rounded">
            </div>
            <div class="text-box">
              <h5>MyHeat A1</h5>
              <p>Статус: <span class="positive">Онлайн</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="chart-card dark-box rounded h-100 d-flex align-items-center">
            <div class="w-100">
              <div class="text-box d-flex justify-content-between">
                <div class="temperature">
                  <h5>T0: 23.01°c</h5>
                  <p class="gray-text"><span>Min: 5.32°c</span> | <span>Max: 67.96°c</span></p>
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
            <button class="primary-button rounded">T0: 23.01°c</button>
            <button class="primary-button rounded choosed">T1: 43.23°c</button>
            <button class="primary-button rounded">T2: 56.78°c</button>
            <button class="primary-button rounded">T3: 54.57°c</button>
            <button class="primary-button rounded">T4: -5.97°c</button>
            <button class="primary-button rounded">T5: -40.62°c</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="relay-controll dark-box rounded h-100">
            <h3>Контроль реле</h3>
            <div class="text-box d-flex justify-content-between align-items-center">
              <p>Реле №1</p>
              <button class="primary-button rounded">Увімкнути</button>
            </div>
            <div class="text-box d-flex justify-content-between align-items-center">
              <p>Реле №2</p>
              <button class="primary-button rounded">Вимкнути</button>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="device-status dark-box rounded h-100">
            <h3>Статус пристрою</h3>
            <p class="gray-text">Синхронізація: 01-10-2022 10:56</p>
            <p class="gray-text">Перезавантажено: 01-10-2022 10:56</p>
            <p class="gray-text">Мережа: www.matrixtel.net</p>
            <p class="gray-text">Сигнал: нормальний</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="logs dark-box rounded h-100">
            <h3>Останні дії</h3>
            <p class="gray-text">Пристрій перезавантажено 01-10-2022 10:56</p>
            <p class="gray-text">Реле №2 виключено 01-10-2022 10:56</p>
            <p class="gray-text">Налаштування синхронизовані 01-10-2022 10:56</p>
            <p class="gray-text">Налаштування збережені 01-10-2022 10:56</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $.datepicker.regional['ua'] = {
      closeText: "Закрити",
      prevText: "Попередній",
      nextText: "найближчий",
      currentText: "Сьогодні",
      monthNames: ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень",
        "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"],
      monthNamesShort: ["Січ", "Лют", "Бер", "Кві", "Тра", "Чер",
        "Лип", "Сер", "Вер", "Жов", "Лис", "Гру"],
      dayNames: ["неділя", "понеділок", "вівторок", "середа", "четвер", "п’ятниця", "субота"],
      dayNamesShort: ["нед", "пнд", "вів", "срд", "чтв", "птн", "сбт"],
      dayNamesMin: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
      weekHeader: "Тиж",
      dateFormat: "dd.mm.yy",
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ""
    };

    $(".ui-state-highlight").addClass("ui-state-active")
    function padTo2Digits(num) {
      return num.toString().padStart(2, '0');
    }
    function formatDate(date) {
      return [
        padTo2Digits(date.getDate()),
        padTo2Digits(date.getMonth() + 1),
        date.getFullYear(),
      ].join('-');
    }

    $(function () {
      $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        duration: "fast",
      });
      $.datepicker.setDefaults($.datepicker.regional["ua"])
    })

    $("#datepicker").val(formatDate(new Date()))
    labels = []
    for (i = 0; i < 24; i++) {
      if (i < 10) {
        labels.push("0" + i + ":00");
      }
      else {
        labels.push(i + ":00");
      }
    }

    $(".date").click(function () {
      $("#datepicker").datepicker("show");
    });

    $("#datepicker").on("change", function () {
      var selected = $(this).val();
      alert(selected);
    });
    const data = {
      labels: labels,
      datasets: [{
        label: 'T0',
        backgroundColor: 'rgb(196, 59, 59)',
        borderColor: 'rgb(196, 59, 59)',
        data: [10, 9, 4, 30, 40, 50, 60, 55, 57, 34, 23, 50, 60, , , 45, 69, 55, 45, 34, 23, 32, 34, 30],
        cubicInterpolationMode: 'monotone'
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          },
        },
        interaction: {
          intersect: false,
        },
        scales: {
          x: {
            grid: {
              color: 'rgb(30, 30, 30)'
            },
            display: true,
            title: {
              display: true
            }
          },
          y: {
            grid: {
              color: 'rgb(30, 30, 30)'
            },
            display: true,
            suggestedMin: -10,
            suggestedMax: 80
          }
        }
      },
    };

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>

@endsection