<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Вхід</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <div class="d-flex align-items-center" style="min-height: 100vh;">
    <div class="container ">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="settings dark-box rounded">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Вхід</h3>
                <h5>Електронна адреса:</h5>
                <input type="text" placeholder="jweuwuf1IFikwoeuf&f" name="email" class="settings-input">
                <h5>Пароль:</h5>
                <input type="password" placeholder="Пароль" name="password" class="settings-input">
                <a href="{{route('register')}}" class="gray-text">Ще не зареєстрований?</a>
                <br>
                <a href="" style="margin: 0;" class="gray-text">Забули пароль?</a>
                <button type="submit" class="primary-button rounded">Увійти</button>
                </form>
          </div>
        </div>
      </div>  
    </div>
  </div>
</body>

</html>