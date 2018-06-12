@extends('layout.app')
@section("body")
  <div class="ui content ">
    <div class="ui header centered">
      <h2 class="ui ">Liste des Activites </h2>
      <button id="addActivity" type="button" class="button green ui"name="button">Creer Activite</button>
    </div>
    <br>
    <div class="ui grid container fluid">
      <table id="listeActivites" class="ui striped table">
        <thead>
          <tr>
            <th>Identifiant</th>
            <th>Activite</th>
            <th>Description</th>
            <th>Date</th>
            <th>Modifier</th>
            <th>Supprimer</th>
            {{-- <th>Desactiver Compte</th> --}}
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div class="ui modal">
    <div class="header">
      Creation d'une Activite
    </div>
    <div class="content centered">
      <h2>Activite</h2>
      <p id="message" class="ui error message" hidden></p>
      <form  class="ui form " action="/administration/addActivite" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="field">
            <label>Nom Activite</label>
            <input type="text" name="nomActivite" placeholder="Saisir le Nom" >
            <label>Date</label>
            <input type="date" name="dateActivite"  >
          </div>
          <div class="field">
            <label>Description Activite</label>
            <textarea name="descActivite" rows="8" cols="80"></textarea>
          </div>
        <button class="ui primary button" type="submit">Enregistrer</button>
        <div class="ui error message"></div>
      </form>
    </div>
  </div>
@endsection
