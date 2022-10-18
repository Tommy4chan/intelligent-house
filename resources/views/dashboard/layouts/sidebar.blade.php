<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <div class="preloader">
  <svg class="pl" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
	<defs>
		<linearGradient id="pl-grad" x1="0" y1="0" x2="0" y2="1">
			<stop offset="0%" stop-color="hsl(0,76%,40%)" />
			<stop offset="100%" stop-color="hsl(0,55%,40%)" />
		</linearGradient>
	</defs>
	<circle class="pl__ring" r="56" cx="64" cy="64" fill="none" stroke="hsla(0,10%,10%,0.1)" stroke-width="16" stroke-linecap="round" />
	<path class="pl__worm" d="M92,15.492S78.194,4.967,66.743,16.887c-17.231,17.938-28.26,96.974-28.26,96.974L119.85,59.892l-99-31.588,57.528,89.832L97.8,19.349,13.636,88.51l89.012,16.015S81.908,38.332,66.1,22.337C50.114,6.156,36,15.492,36,15.492a56,56,0,1,0,56,0Z" fill="none" stroke="url(#pl-grad)" stroke-width="16" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="44 1111" stroke-dashoffset="10" />
</svg>
  </div>

  <div class="sidebar-menu-button">
    <button class="btn btn-primary rounded" type="button" id="offcanvas-show1"><i class="bi bi-list"></i></button>
  </div>

  <div class="offcanvas offcanvas-start show offcanvas-show" data-bs-scroll="true" data-bs-backdrop="false"
    tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
      <button class="btn btn-primary rounded" type="button" id="offcanvas-show2"><i class="bi bi-x-lg"></i></button>
      <img src="{{ URL::asset('images/logo-white.png') }}" alt="hugenerd" width="40" height="40">
      <a href="">
        <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Intelligent-House</h3>
      </a>
    </div>
    <div class="offcanvas-body">
      <div class="device-dropdown">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle rounded d-flex align-items-center" type="button"
            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="device-image"><img src="{{ URL::asset('images/logo-white.png') }}" alt="hugenerd">
            </div>
            <div class="device-data"><span id="device-name">Невідомо</span><br><span id="device-state" class="negative">Невідомо</span></span></div><i class="bi bi-arrow-down-up"></i>
          </button>
          <ul class="dropdown-menu rounded" aria-labelledby="dropdownMenuButton1">
            @foreach($devices as $device)
            <li data-url="{{ route('selected.device', $device->id) }}" data-device-id="{{ $device->id }}"><a class="dropdown-item dropdown-menu-choose align-items-center d-flex align-items-center" href="#"><img src="{{ URL::asset('images/device-icon.png') }}"
                  alt="hugenerd"><span id="device-name">{{$device['name']}} </span><span id="device-state" {!! $device->isOnline() !!}</a></li>
            @endforeach
            <li><a class="dropdown-item dropdown-menu-add d-flex align-items-center" href="{{route('dashboard.add')}}"><p class="rounded-circle">?</p><span id="device-name">Додати пристрій</span></a></li>
          </ul>
        </div>
      </div>

      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li>
          <a href="{{route('dashboard.home')}}" class="nav-link d-flex align-items-center @routeactive('dashboard.home')">
            <i class="bi bi-house-fill"></i> <span class="ms-1 d-sm-inline">Домашня сторінка</span></a>
        </li>
        <li>
          <a href="{{route('dashboard.settings')}}" class="nav-link d-flex align-items-center @routeactive('dashboard.settings')">
            <i class="bi bi-gear-fill"></i> <span class="ms-1 d-sm-inline">Налаштування</span></a>
        </li>
        <li>
          <a href="{{route('dashboard.help')}}" class="nav-link d-flex align-items-center @routeactive('dashboard.help')">
            <i class="bi bi-question-square-fill"></i> <span class="ms-1 d-sm-inline">Допомога</span></a>
        </li>
        <li>
          <a href="{{route('dashboard.logout')}}" class="nav-link d-flex align-items-center">
            <i class="bi bi-door-open-fill"></i> <span class="ms-1 d-sm-inline">Вийти</span></a>
        </li>
      </ul>
      <div class="user-block">
        <div class="rounded user @routeactive('dashboard.profile')">
          <a href="{{route('dashboard.profile')}}" class="d-flex align-items-center">
            <img src="{{ URL::asset('images/Logo White.png') }}" alt="Logo" width="40" height="40" class="rounded-circle"> <span
              class="d-sm-inline">{{\Illuminate\Support\Str::limit(auth()->user()->name, $limit = 12, $end = '...')}}</span></a>
        </div>
      </div>
    </div>
  </div>

  @yield('main_content')

  <script>

    function set_select_data(item){
      $(".btn:first-child").find("img").attr("src", $(item).find("img").attr("src"));
      $(".btn:first-child").find('span#device-name').text($(item).find('span#device-name').text());
      $(".btn:first-child").find('span#device-state').text($(item).find('span#device-state').text());
      $(".btn:first-child").find('span#device-state').attr("class", $(item).find('span#device-state').attr("class"));
    }

    $(function () {
      $(".dropdown-menu li").click(function () {
        if($(this).find("a.dropdown-menu-add").length == 0){
          set_select_data(this);
          $.ajax({
                url: $(this).data('url'),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                  alert(data[0]);
                }
            });
        }
      });
      $("#offcanvas-show1").click(function () {
        $(".offcanvas").toggleClass("offcanvas-show");
      });
      $("#offcanvas-show2").click(function () {
        $(".offcanvas").toggleClass("offcanvas-show");
      });
    });
    
    if({{count($devices)}} != 0)
      set_select_data($(".dropdown-menu").find(`[data-device-id="{{ Session::get('selected_device') }}"]`));
      $('.preloader').fadeOut(500);
  </script>



</body>

</html>