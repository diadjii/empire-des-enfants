@extends('layout.app')
@section("body")
  <div class="ui content ">
    <div class="ui header centered">
      <h2 class="ui ">Gestion des Activites </h2>
      <button id="btnAddActivite" type="button" class="button green ui"name="button">Creer une Activite</button>
      <button id="btnShowActivites" type="button" class="button green ui"name="button">Voir les Activites</button>
    </div>
    <br>
    <div class="ui grid container fluid">
      <div class="four wide column ui message" >
        <h2 class="ui centered">Liste des Activites </h2>
        <button id="chooseDate" class='addToAgenda ui mini button primary ' onClick='addActiviteToAgenda()'>Choisir Date</button>
        <span class="center" id="aucuneActivite">Aucune Activite pour l'instant</span>
        <ul id="activitesNotAdded" class="ui relaxed divided list">

        </ul>
      </div>
        <div id="calendar" class="twelve wide column"></div>
    </div>
  </div>
  <div class="ui modal liste">
  <div class="header">Liste des Activites</div>
  <div class="scrolling content">
    <div class="ui grid container fluid">
      <table id="listeActivites" class="ui striped table">
        <thead>
          <tr>
            <th>Identifiant</th>
            <th>Activite</th>
            <th>Description</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
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
<div class="ui modal agenda">
  <div id="titreModal" class="header">
    Calendrier
  </div>
  <h5 class="ui blue image label centered">Date Choisit : <span id="dateChoisie">Aucune date</span></h5>
  <div id="calendar2" class="content centered">
  </div>
  <div class="actions">
    <div id="saveActiviteInAgenda" class="ui approve button green">Valider</div>
    <div class="ui cancel button red">Annuler</div>
  </div>
</div>
@endsection
