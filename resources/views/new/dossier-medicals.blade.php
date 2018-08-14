@extends("new.layout-infirmier") 
@section("titreSection")
<h2>Gestion Dossiers Medicals</h2>
@endsection
 
@section("content")

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-success card-header-icon">
      <div class="card-icon">
        <i class="material-icons">local_hospital</i>
      </div>
      <h4 class="card-title">Dossier Médical</h4>
    </div>

    <div class="material-datatables">
      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Dossier Medical</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Dossier Medical</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($liste as $dossier)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dossier->getNomEnfant()}} </td>
            <td>{{$dossier->getPrenomEnfant()}} </td>
            <td>
              <form action="/dossier-medical/{{$dossier->getIdDossierEnfant()}}/consultation">
                <button type="submit" class="btn btn-info">Voir Dossier</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- end content-->
</div>
<!--  end card  -->
</div>
<!-- end col-md-12 -->
@endsection