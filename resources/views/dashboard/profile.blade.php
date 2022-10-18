@extends('dashboard.layouts.sidebar')

@section('title')Профіль@endsection

@section('main_content')

<div class="main-content">
    <div class="container">
      <div class="hello">
        <h2><i class="bi bi-person-circle"></i> Профіль</h2>
        <p class="gray-text">Тут Ви можете керувати своїм профілем</p>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <div class="profile dark-box rounded">
            <img src="images/Logo White.png" alt="Logo" width="60" height="60" class="rounded-circle"> <h3
              class="d-inline">Tommy4chan</h3>
            <div class="text-box">
              <p class="gray-text">Приєднався: 12-10-2022</p>
              <p class="gray-text">Email: toroerog@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="settings dark-box rounded h-100">
            <h3>Змінити пошту</h3>
            <h5>Нова електронна адреса:</h5>
            <input type="text" placeholder="example@gmail.com" name="device-name" class="settings-input">
            <button type="submit" class="primary-button rounded">Змінити</button>
            <p class="gray-text description">Нові дані для входу будуть відправлені на пошту</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="settings dark-box rounded h-100">
            <h3>Змінити пароль</h3>
            <h5>Старий пароль:</h5>
            <input type="password" placeholder="Пароль" name="device-name" class="settings-input">
            <h5>Новий пароль:</h5>
            <input type="password" placeholder="Пароль" name="device-name" class="settings-input">
            <button type="submit" class="primary-button rounded">Змінити</button>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="settings dark-box rounded h-100">
            <h3>Сповіщення</h3>
            <select class="settings-input">
              <option value="1" selected>Включені</option>
              <option value="0">Виключені</option>
            </select>
            <button type="submit" class="primary-button rounded">Зберегти</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection