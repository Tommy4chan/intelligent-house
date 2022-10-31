device_id = 0;
device_api_token = 0;
user_api_token = 0;
temperatureNumber = 0;
chartTempNumber = $('#chart-temp-number');
chartTemp = $('#chart-temp');
chartTempMin = $('#chart-temp-min');
chartTempMax = $('#chart-temp-max');



//Datepicker
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
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ""
};

$(".ui-state-highlight").addClass("ui-state-active")

$("#datepicker").datepicker({
  dateFormat: "yy-mm-dd",
  update: new Date(),
  duration: "fast"
});

$.datepicker.setDefaults($.datepicker.regional["ua"]);

$("#datepicker").datepicker('setDate', 'today');

labels = []
for (i = 0; i < 24; i++) {
  if (i < 10) {
    labels.push("0" + i + ":00");
  }
  else {
    labels.push(i + ":00");
  }
}

selectedDate = $("#datepicker").val();

$(".date").click(function () {
  $("#datepicker").datepicker("show");
});

$("#datepicker").on("change", function () {
  selectedDate = $(this).val();
  $("datepicker").hide();
  temperatureByData(temperatureNumber);
});


//Functions
function refreshData(){
  temperatureByData(temperatureNumber);
  getDeviceLogs(4);
  getRelayData(0);
  getRelayData(1);
  getDeviceTemperatures();
  //коли переключаєшся з пристрою на пристрій кнопки контролю реле показують неправильні значення
}

function decodeChartData(){
    chart_card = document.querySelector(".chart-card");
    tempArray = chart_card.dataset.temperature.split(",");
    for(i = 0; i < 24; i++){
        if(tempArray[i] == -255){
            tempArray[i] = null;
        }
    }
    return tempArray;
}

function encodeChartData(data){
    chart_card = document.querySelector(".chart-card");
    chart_card.dataset.temperature = data.slice(0,23);
}

function setDeviceId(id){
    device_id = id;
}

function setDeviceApiToken(token){
    device_api_token = token;
}

function setUserApiToken(token){
  user_api_token = token;
}

function switchTemperatureButton(button){
    $('.temperature-card .choosed').removeClass("choosed");
    button.addClass("choosed");
}

function switchButtonState(button, state){
  if(state == 1){
    button.text("Увімкнути");
    state = 0
  }
  else{
    button.text("Вимкнути");
    state = 1
  }
  button.attr("value", state);
  return state;
}

function createLog(item, index) {
  $( ".logs-block" ).append('<p class="gray-text">' + item + '</p>' );
}

function temperatureByData(tN){
    $.ajax({
        url: 'http://intelligent-house.pp.ua/api/data/get/temperature/' + device_id + '/' + tN + '/' + selectedDate + '?api_token=' + user_api_token,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            encodeChartData(data);
            chartTemp.text(data[24]);
            chartTempMin.text(data[25]);
            chartTempMax.text(data[26]);
            chartTempNumber.text(data[27]);
            myChart.data.datasets.forEach((dataset) => {
                dataset.data = decodeChartData();
            });
            myChart.update();
        }
    });
}

function getDeviceTemperatures(){
  $.ajax({
    url: 'http://intelligent-house.pp.ua/api/data/get/temperatures/' + device_id + '?api_token=' + user_api_token,
    type: 'GET',
    success: function(data) {
      for(i = 0; i < data.length; i++){
        $('#temperature-data-' + i).text(data[i]);
      }
    }
});
}

function getRelayData(rN){
  $.ajax({
    url: 'http://intelligent-house.pp.ua/api/data/get/relay/' + device_id + '/' + rN + '?api_token=' + user_api_token,
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      switchButtonState($(".relay-controll").find("[data-relay-number='" + rN + "']"), data["state"], 1)
    }
});
}

function getDeviceLogs(lN){
  $.ajax({
      url: 'http://intelligent-house.pp.ua/api/data/get/logs/' + device_id + '/' + lN + '?api_token=' + user_api_token,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        $('.logs-block').empty();
        data.forEach(createLog);
      }
  });
}

function deviceRelayData(relayData){
  $.ajax({
      url: 'http://intelligent-house.pp.ua/api/data/post/relay' + '?api_token=' + user_api_token,
      type: 'POST',
      data: relayData,
      success: function() {
        getDeviceLogs(4);
      }
  });
}

//Ajax
$(".temperature-card button").click(function(){
    button = $(this);
    switchTemperatureButton(button);
    temperatureNumber = button.attr("value");
    temperatureByData(temperatureNumber);
  });

$(".relay-controll button").click(function(){
    button = $(this);
    deviceRelayData({"device_id": device_id, "state": switchButtonState(button, button.attr("value"), 0), "number" : button.attr("data-relay-number")});
});

//Chart data
const data = {
  labels: labels,
  datasets: [{
    label: 'T0',
    backgroundColor: 'rgb(196, 59, 59)',
    borderColor: 'rgb(196, 59, 59)',
    data: decodeChartData(),
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

