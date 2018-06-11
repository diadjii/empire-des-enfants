@extends('layout/app')
@section('header')
  <div class="ui content">
      <div class="ui">
        <img class="ui fluid image" src="/images/1.jpg">
      </div>

    </div>
  </div>
@endsection
@section('body')
  <button id="addActivity" type="button" class="button green ui"name="button">Creer Activite</button>
  <div class="ui modal">

    <div class="header">
    Creation d'une Activite
    </div>
    <div class="content">
      <h2>Activite</h2>
      <p id="message" class="ui error message" hidden></p>
      <form  class="ui form" action="/administration/addActivite" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class=" two fields">
          <div class="field">
            <label>Nom Activite</label>
            <input type="text" name="nomActivite" placeholder="Saisir le Nom" >
          </div>
        </div>
          <div class="two fields">
            <div class="field">
              <label>Description Activite</label>
              <textarea name="descActivite" rows="8" cols="80"></textarea>
            </div>
          </div>
        <button class="ui primary button" type="submit">Enregistrer</button>
        <div class="ui error message"></div>
      </form>
    </div>
  </div>
  <script src="/js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script src="/js/admin.js" charset="utf-8"></script>
@endsection
