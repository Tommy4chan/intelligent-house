@extends('dashboard.layouts.sidebar')

@section('title')Налаштування@endsection

@section('main_content')

<div class="main-content">
    <div class="container">
      <div class="hello">
        <h2><i class="bi bi-gear-fill"></i> Налаштування</h2>
        <p class="gray-text">Тут Ви можете змінити налаштування свого пристрою</p>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="settings dark-box rounded h-100">
            <h3>Ім'я пристрою</h3>
            <input type="text" placeholder="MyHeat A1" name="device-name" class="settings-input">
            <button type="submit" class="primary-button rounded">Зберегти</button>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="settings dark-box rounded h-100">
            <h3>Фейлсейф</h3>
            <select class="settings-input">
              <option value="1" selected>On</option>
              <option value="0">Off</option>
            </select>
            <button type="submit" class="primary-button rounded">Зберегти</button>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="settings dark-box rounded h-100">
            <h3>Прошивка</h3>
            <select class="settings-input">
              <option value="1" selected>v1.3.12</option>
              <option value="0">v2.13</option>
            </select>
            <button type="submit" class="primary-button rounded">Оновити</button>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="settings dark-box rounded h-100">
            <h3>Видалити пристрій</h3>
            <button type="submit" class="primary-button rounded">Видалити</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <div class="settings dark-box rounded h-100">
            <h3>Власні функції</h3>
            <h5>Номер функції:</h5>
            <select class="settings-input">
              <option value="1" selected>Функція №1</option>
              <option value="2">Функція №2</option>
              <option value="3">Функція №3</option>
              <option value="4">Функція №4</option>
              <option value="5">Функція №5</option>
            </select>
            <h5>Реле:</h5>
            <select class="settings-input">
              <option value="1" selected>Реле №1</option>
              <option value="2">Реле №2</option>
            </select>
            <h5>Функція: </h5>
            <div class="function-group d-flex">
              <select class="settings-input">
                <option value="1" selected>T1</option>
                <option value="2">T2</option>
              </select>
              <input type="number" placeholder="23" name="device-name" class="settings-input">
              <select class="settings-input" style="width:35px">
                <option value="1" selected>></option>
                <option value="2">=</option>
                <option value="2"><</option>
              </select>
              <input type="number" placeholder="52" name="device-name" class="settings-input">
              <select class="settings-input">
                <option value="1" selected>T1</option>
                <option value="2">T2</option>
              </select>
            </div>
            <h5>Активність:</h5>
            <select class="settings-input">
              <option value="1" selected>Включена</option>
              <option value="2">Виключена</option>
            </select>
            <button type="submit" class="primary-button rounded">Зберегти</button>

          </div>
        </div>
        <div class="col-lg-3">
          <div class="settings dark-box rounded h-100">
            <h3>Інтернет</h3>
            <h5>Ім'я мережі:</h5>
            <input type="text" placeholder="www.matrixtel.net" name="device-name" class="settings-input">
            <h5>Пароль</h5>
            <input type="password" placeholder="3251235" name="device-name" class="settings-input">
            <button type="submit" class="primary-button rounded">Зберегти</button>
            <p class="gray-text description">Дані мережі будуть змінені після перезавантаження пристрою</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="settings logs dark-box rounded h-100">
            <h3>Останні дії</h3>
            <p class="gray-text">Фейлсейф виключено 01-10-2022 10:56</p>
            <p class="gray-text">Змінене ім'я пристрою 01-10-2022 10:56</p>
            <p class="gray-text">Змінена функція №2 01-10-2022 10:56</p>
            <p class="gray-text">Змінена функція №1 01-10-2022 10:56</p>
            <p class="gray-text">Пристрій перезавантажено 01-10-2022 10:56</p>
            <p class="gray-text">Реле №2 виключено 01-10-2022 10:56</p>
            <p class="gray-text">Налаштування синхронизовані 01-10-2022 10:56</p>
            <p class="gray-text">Налаштування збережені 01-10-2022 10:56</p>
            <p class="gray-text">Фейлсейф виключено 01-10-2022 10:56</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>

@endsection