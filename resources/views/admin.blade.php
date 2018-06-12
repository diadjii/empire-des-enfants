@extends('layout.app')
{{-- <div class="ui secondary  menu">
<a class="active item">
Home
</a>
<a class="item">
Messages
</a>
<a class="item">
Friends
</a>
<div class="right menu">
<div class="item">
<div id="profile" class="ui primary button">{{$login}}</div>
</div>
<div class="ui item">

<input type="submit" class="ui primary button" value="Log Out"/>
<input type="hidden" name="_token" value="{!! csrf_token() !!}">

</div>
</div>
</div> --}}
@section('body')
  <div class="ui content">
    <img class="ui  image" src="/images/1.jpg">


  
    <h3 class="ui header centered">Liste des Activtes</h3>
    <div id="activites" class="ui container fluid grid">
    </div>
  </div>
@endsection

</body>
</html>
