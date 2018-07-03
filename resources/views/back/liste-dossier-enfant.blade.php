@extends('back.layoutAdmin')
@section("content")
  <div class="content-wrapper ">
    <section class="content">
      <div class="container  ">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <h1>Gestion Dossiers Enfants</h1>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title center">Dossiers Enfants</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" onload="test()">
              <table ud="listeUser" class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Details</th>
                  <th>Dossier Medicale</th>
                  <th>Dossier Juridique</th>
                </tr>
                {{-- Affichage de la liste des utilisateurs  --}}
                @foreach ($liste as $dossier)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dossier->getNomEnfant()}} </td>
                    <td>{{$dossier->getPrenomEnfant()}} </td>
                    <td><form action="/administration/DossierEnfant/{{$dossier->getIdDossierEnfant()}}/Details"><button type="submit" class="btn btn-primary">Voir details</button></form></td>
                    <td><form action="/administration/DossierEnfant/{{$dossier->getIdDossierEnfant()}}/DossierMedical"><button type="submit" class="btn btn-success">Voir Dossier </button></form></td>
                    <td><button type="button" class="btn btn-warning" onClick="viewDetailsDossier({{$dossier->getIdDossierEnfant()}})">Voir Dossier</button></td>


                    {{-- <td><span class="tag tag-success">{{$dossier->getRole()}}</span></td>
                    @if ($dossier->getStatus()==='on')
                      <td><button type="button" class="btn btn-primary" onClick="desactiveUser({{$dossier->getId()}})">Desactiver</button></td>
                    @else
                      <td><button type="button" class="btn btn-success"  onclick="activeUser({{$dossier->getId()}})">Activer</button></td>
                    @endif --}}

                  </tr>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div><!-- /.row -->
      </div>
    </section>
  </div>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titre">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="exampleInputEmail1">Profil</label>
                  <input type="text" class="form-control"  name="profil" disabled>
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                </div>
                <div class="col-12">
                  <label for="exampleInputEmail1">Description </label>
                  <textarea type="text" class="form-control" name="description" disabled>
                  </textarea>
                </div>
                <div class="col-12">
                  <label for="exampleInputEmail1">Date Naissance</label>
                  <input type="text" class="form-control"  name="dateNaissance" disabled>
                </div>
                <div class="col-12">
                  <label for="exampleInputEmail1">Lieu de Naissance</label>
                  <input type="text" class="form-control" name="lieuNaissance" disabled>
                </div>
                <div class="col-12">
                    <label for="exampleInputEmail1">Origine</label>
                    <input type="text" class="form-control" name="origine" disabled>
                </div>
                <div class="col-12">
                    <label for="exampleInputEmail1">Prenom Pére</label>
                    <input type="text" class="form-control" name="pere" disabled>
                </div>
                <div class="col-12">
                    <label for="exampleInputEmail1">Prenom Mére</label>
                    <input type="text" class="form-control" name="prenomMere" disabled>
                </div>
                <div class="col-12">
                    <label for="exampleInputEmail1">Nom Mére</label>
                    <input type="text" class="form-control" name="nomMere" disabled>
                </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section("script")
  <script src="/js/dossier.js" charset="utf-8"></script>
@endsection
