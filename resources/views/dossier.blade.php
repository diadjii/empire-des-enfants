@extends('layout.app')
@section('body')
  <h1 class="ui header centered ">Dossier des Enfants</h1>
  <div class="ui content">
    <div class="ui grid">
      <div class="ui grid container fluid">
        <table id="listeEnfants" class="ui striped table">
          <thead>
            <tr>
              <th>Identifiant</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Age</th>
              <th>Plus Details</th>
              <th>Modifier</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
