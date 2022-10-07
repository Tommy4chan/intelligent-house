<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <div class="sidebar-menu-button">
    <button class="btn btn-primary rounded" type="button" id="offcanvas-show1"><i class="bi bi-list"></i></button>
  </div>

  <div class="offcanvas offcanvas-start show offcanvas-show" data-bs-scroll="true" data-bs-backdrop="false"
    tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
      <button class="btn btn-primary rounded" type="button" id="offcanvas-show2"><i class="bi bi-x-lg"></i></button>
      <img src="images/logo-white.png" alt="hugenerd" width="40" height="40">
      <a href="">
        <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Intelligent-House</h3>
      </a>
    </div>
    <div class="offcanvas-body">
      <div class="device-dropdown">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle rounded d-flex align-items-center" type="button"
            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="device-image"><img src="images/logo-white.png" alt="hugenerd">
            </div>
            <div class="device-data"><span id="device-name">MyHeat A1</span><br><span id="device-state"
                class="negative">Офлайн</span></div><i class="bi bi-arrow-down-up"></i>
          </button>
          <ul class="dropdown-menu rounded" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item dropdown-menu-choose align-items-center d-flex align-items-center" href="#"><img src="images/device-icon.png"
                  alt="hugenerd"><span id="device-name">MyHeat A1 </span><span id="device-state"
                  class="negative">Офлайн</span></a></li>
            <li><a class="dropdown-item dropdown-menu-choose align-items-center d-flex align-items-center" href="#"><img src="images/device-icon.png"
                  alt="hugenerd"><span id="device-name">MyHeat A5 Pro </span><span id="device-state"
                  class="positive">Онлайн</span></a></li>
            <li><a class="dropdown-item dropdown-menu-choose align-items-center d-flex align-items-center" href="#"><img src="images/device-icon.png"
                  alt="hugenerd"><span id="device-name">MyHeat A3 Mini </span><span id="device-state"
                  class="negative">Офлайн</span></a></li>
                  <li><a class="dropdown-item dropdown-menu-add d-flex align-items-center" href="admin-add-device.html"><p class="rounded-circle">?</p><span id="device-name">Додати пристрій</span></a></li>
          </ul>
        </div>
      </div>

      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li>
          <a href="admin-dashboard.html" class="nav-link d-flex align-items-center choosed">
            <i class="bi bi-house-fill"></i> <span class="ms-1 d-sm-inline">Домашня сторінка</span></a>
        </li>
        <li>
          <a href="admin-settings.html" class="nav-link d-flex align-items-center">
            <i class="bi bi-gear-fill"></i> <span class="ms-1 d-sm-inline">Налаштування</span></a>
        </li>
        <li>
          <a href="admin-help.html" class="nav-link d-flex align-items-center">
            <i class="bi bi-question-square-fill"></i> <span class="ms-1 d-sm-inline">Допомога</span></a>
        </li>
        <li>
          <a href="#" class="nav-link d-flex align-items-center">
            <i class="bi bi-door-open-fill"></i> <span class="ms-1 d-sm-inline">Вийти</span></a>
        </li>
      </ul>
      <div class="user-block">
        <div class="rounded user">
          <a href="admin-profile.html" class="d-flex align-items-center">
            <img src="images/Logo White.png" alt="Logo" width="40" height="40" class="rounded-circle"> <span
              class="d-sm-inline">Tommy4chan</span></a>
        </div>
      </div>
    </div>
  </div>

  @yield('main_content')

  <script>
    $(function () {
      $(".dropdown-menu li").click(function () {
        if($(this).find("a.dropdown-menu-add").length == 0){
          $(".btn:first-child").find("img").attr("src", $(this).find("img").attr("src"));
          $(".btn:first-child").find('span#device-name').text($(this).find('span#device-name').text());
          $(".btn:first-child").find('span#device-state').text($(this).find('span#device-state').text());
          $(".btn:first-child").find('span#device-state').attr("class", $(this).find('span#device-state').attr("class"));
        }
      });
      $("#offcanvas-show1").click(function () {
        $(".offcanvas").toggleClass("offcanvas-show");
      });
      $("#offcanvas-show2").click(function () {
        $(".offcanvas").toggleClass("offcanvas-show");
      });
    });
  </script>



</body>

</html>