<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../css/semantic.min.css" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="ui small menu">
      <div class="right menu">

        <div class="item">
          <div id="profile" class="ui primary button">{{$login}}</div>
        </div>
        <div class="item">
          <form id="logOut" class="" action="logOut">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="submit" class="ui primary button" value="Log Out"/>
          </form>
        </div>
      </div>
    </div>
    @yield('header')
    @yield('body')
    @yield('footer')
  </body>
</html>
