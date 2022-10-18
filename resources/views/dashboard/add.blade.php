@extends('dashboard.layouts.sidebar')

@section('title')Додати пристрій@endsection

@section('main_content')

<div class="main-content d-flex align-items-center" style="min-height: 100vh;">
    <div class="container ">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="settings dark-box rounded">
            <form action="{{route('dashboard.add_device')}}" method="post">
              @csrf
              <h3>Додати прийстрій</h3>
              <h5>Логін пристрою:</h5>
              <input type="text" placeholder="jweuwuf1IFikwoeuf&f" name="device_login" class="settings-input">
              <h5>Пароль пристрою:</h5>
              <input type="password" placeholder="Пароль" name="device_password" class="settings-input">
              <button type="submit" class="primary-button rounded">Зберегти</button>
            </form>
          </div>
        </div>
      </div>  
    </div>
  </div>

@endsection