<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="/css/semantic.min.css" rel="stylesheet">
  <link href="/css/empire.css" rel="stylesheet">
  <title></title>
</head>
<body onload="listeActivite()">
  <div class="ui secondary menu" id="menuAdmin">
    <div class="header item">
      Empire des Enfants
    </div>
    <a class="active item" href="/administration">
      Accueil
    </a>
    <a class="item" href="/administration/Activites">
      Activites
    </a>
    <a class="item">
      Dossier Enfants
    </a>
    <div class="right menu">
      <div class="item">
        <div id="profile" class="ui primary button">{{$login}}</div>
      </div>
      <div class="item">
        <div id="logOut" class="ui button primary">Log Out</div>
        {{-- <input id="logOut" type="submit" class="ui primary button" value="Log Out"/>
        <input  type="hidden" name="_token" value="{!! csrf_token() !!}"> --}}
      </div>
    </div>
  </div>
  @yield('header')
  @yield('body')
  @yield('footer')
  <script src="../js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script src="../js/semantic.min.js" charset="utf-8"></script>
  <script src="../js/empire.js" charset="utf-8"></script>
  <script src="../js/admin.js" charset="utf-8"></script>
</body>
</html>
