@extends('layout.app')
@section("body")
  <div class="ui content ">
    <div class="ui header centered">
      <h2 class="ui ">Liste des Activites </h2>
      <button id="btnAddActivite" type="button" class="button green ui"name="button">Creer Activite</button>
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
  <div id="formCreateActivite" class="ui modal">
    <div id="titreModal" class="header">
      Creation d'une Activite
    </div>
    <div class="content centered">
      <h2>Activite</h2>
      <p id="message" class="ui error message" hidden></p>
      <form  id="formAddActivite" class="ui form ">
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
  <div class="ui modal editActivite">
    <div id="titreModal" class="header">
      Modification d'une Activite
    </div>
    <div class="content centered">
      <h2>Activite</h2>
      <p id="message" class="ui error message" hidden></p>
      <form id="editActivite" class="ui form " >
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="field">
            <label>Nom Activite</label>
            <input type="text" name="newNomActivite" placeholder="Saisir le Nom" >
            <input type="text" hidden name="idActivite" value="">
            <label>Date</label>
            <input type="date" name="dateActivite"  >
          </div>
          <div class="field">
            <label>Description Activite</label>
            <textarea name="newDescActivite" rows="8" cols="80"></textarea>
          </div>
        <button class="ui primary button" type="submit">Enregistrer Modification</button>
        <div class="ui error message"></div>
      </form>
    </div>
  </div>
  <div class="ui modal mini">
  <div class="header">Info</div>
  <div class="content green">
    <p id="info"></p>

  </div>
  <div id="action" class="actions">
    <div id="btnConfirmer" class="ui small green button">Confirmer</div>
    <div class="ui small red cancel button">Annuler</div>
  </div>
</div>
@endsection
