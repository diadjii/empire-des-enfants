<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../css/semantic.min.css" rel="stylesheet">
    <link href="../css/empire.css" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="ui menu">
      <div class="right menu">
        <div class="item">
          <div id="profile" class="ui primary button">{{$login}}</div>
        </div>
        <div class="item">
          <form id="logOut">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="submit" class="ui primary button" value="Log Out"/>
          </form>
        </div>
      </div>
    </div>
    <div class="ui">
      @yield('header')
    </div>
    @yield('body')
    @yield('footer')
    <script src="../js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="../js/semantic.min.js" charset="utf-8"></script>
    <script src="../js/empire.js" charset="utf-8"></script>
  </body>
</html>
