@extends('dashboard.layouts.sidebar')

@section('title')Допомога@endsection

@section('main_content')

<div class="main-content">
    <div class="container">
      <div class="hello">
        <h2><i class="bi bi-question-square-fill"></i> Допомога</h2>
        <p class="gray-text">Тут Ви можете получити відповіді на поширені запитання, або звернутися до менеджера</p>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="help dark-box rounded h-100">
            <h3>Перше знайомство</h3>
            <div class="accordion accordion-flush" id="accordionFlush1">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Крок 1
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush1">
                  <div class="accordion-body">Підключіться до точки доступу яку створив контролер та дотримуйтесь інструкцій пристрою</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Крок 2
                  </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush1">
                  <div class="accordion-body">Відкрийте список пристроїв та натисніть "Додати пристрій" <img src="{{ URL::asset('images/help1-step2.jpg') }}"></div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Крок 3
                  </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush1">
                  <div class="accordion-body">Введіть логін та пароль пристрою <img src="{{ URL::asset('images/help1-step3.jpg') }}"></div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Крок 4
                  </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush1">
                  <div class="accordion-body">Налаштовуйте функції, підключайте датчики температури та провода навантаження до реле</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="help dark-box rounded h-100">
            <h3>Налаштування</h3>
            <div class="accordion accordion-flush" id="accordionFlush2">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush2-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Ім'я пристрою
                  </button>
                </h2>
                <div id="flush2-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush2">
                  <div class="accordion-body">Для зручності користування пристроєм, Ви можете змінити його ім'я вписавши нове в поле та збрегти зміни <img src="{{ URL::asset('images/settings-device_name.jpg') }}" alt=""></div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush2-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Фейлсейф
                  </button>
                </h2>
                <div id="flush2-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush2">
                  <div class="accordion-body">Дана функція створена для того, щоб вимикати реле після перезавантаження пристрою, якщо до того воно було увімкнено вручну коистувачем <img src="{{ URL::asset('images/settings-failsave.jpg') }}"></div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush2-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Прошивка
                  </button>
                </h2>
                <div id="flush2-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush2">
                  <div class="accordion-body">Коли виходить нова версія програмного забезпечення, Ви можете перепрошити свій пристрій дистанційно для використання нових функцій<img src="{{ URL::asset('images\settings-firmware.jpg') }}"></div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush2-collapseFour" aria-expanded="false" aria-controls="flush2-collapseFour">
                    Власні функції
                  </button>
                </h2>
                <div id="flush2-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlush2">
                  <div class="accordion-body">У цьому блоці ви можете налаштувати поведінку 5 різних функцій, вибираючи з якими датчиками температури порівнювати, які реле включати<br>*Tn це віртуальний датчик температури, показник якого завжди 0<img src="{{ URL::asset('images/settings-custom-functions.jpg') }}"></div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush2-collapseFive" aria-expanded="false" aria-controls="flush2-collapseFive">
                    Інтернет
                  </button>
                </h2>
                <div id="flush2-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlush2">
                  <div class="accordion-body">Тут ви можете змінити дані своєї мережі <img src="{{ URL::asset('images/settings-wifi.jpg') }}"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="help dark-box rounded h-100">
            Зв'язок з менеджерами за телефоном 0 800 335 66 88, працюємо кожен день з 10:00 - 20:00
          </div>
        </div>
        
      </div>
      
    </div>
  </div>

@endsection