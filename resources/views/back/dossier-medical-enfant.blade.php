@extends('back.layoutAdmin')

@section("content")
  <div class="content-wrapper ">
    <section class="content">
      <div class="container  ">
        <div class="row align-items-center">
          <!-- left column -->
          <div class="col align-self-center">
            <br>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title "> Dossi&eacuter M&eacutedical de {{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}}</h3>
              </div>
              @if($dossier == null)
                <div class="card-body">
                  <h1>Le Dossier Medical est vide !!!</h1>
                  <button class="btn btn-primary" id="createDossierMedicale">Creer Dossier Medical
                  </button>
                </div>
              @else
                @if($infosConsultationEnfant == null)

                  <div class="col-6 ">
                    <div class="alert alert-primary" role="alert">
                      Aucune Consultation pour l'instant !!!
                    </div>
                  </div>
                  <br>
                @else

                  <div class="row align-self-center">
                    <button class="btn btn-primary" id="createConsultationMedicale">Creer une
                      Consultation
                    </button>
                  </div>
                  <div class="row">
                    <div class="card-body table-responsive p-0" >
                      <table id="listeUser" class="table table-hover">
                        <tr>
                          <th>Consultation</th>
                          <th>Date Consultation</th>
                          <th>Voir Details</th>
                          {{--<th>Prescription</th>
                          <th>Analyse Complementaire</th>
                          <th>Diagnostique</th>--}}
                        </tr>
                        @foreach ( $infosConsultationEnfant as $c )
                          <tr>
                            <td>{{$c['consultation']}}</td>
                            <td>{{$c['dateConsultation']}}</td>
                            <td>
                              <input type="button" class="btn btn-primary" onclick="affiche({{$c['id']}}); "value="Details"/>
                            </td>
                            {{--<td>{{$c->getDiagnostique()}}</td>
                            <td>{{$c->getPrescription()}} </td>
                            <td>{{$c->getAnalyseComplementaire()}} </td>--}}
                          </tr>
                          <div class="modal fade" id="{{$c['id']}}" tabindex="-1" role="dialog"
                               aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Details de la Consultation</h5>
                                  <button type="button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="/Infirmierd/UpdateConsultationMedicale" method="post">

                                    <div class="row">
                                      <div class="col-12">
                                        <label for="exampleInputEmail1">Type
                                          Consultation</label>
                                        <input type="text" class="form-control"
                                               name="consultation" value="{{$c['consultation']}}">
                                        <input type="hidden" name="idConsultation"
                                               value="{{$c['id']}}">
                                        <input type="hidden" name="_token"
                                               value="{!! csrf_token() !!}">
                                      </div>
                                      <div class="col-12">
                                        <label for="exampleInputEmail1">Prescription</label>
                                        <textarea type="text" class="form-control"
                                                  name="prescription">{{$c['prescription']}}</textarea>
                                      </div>
                                      <div class="col-12">
                                        <label for="exampleInputEmail1">Analyse
                                          Complementaire</label>
                                        <textarea type="text" class="form-control"
                                                  name="analyseComplementaire">{{$c['analyse']}}
                                                                                </textarea>
                                      </div>
                                      <div class="col-12">
                                        <label for="exampleInputEmail1">Diagnostique</label>
                                        <textarea type="text" class="form-control"
                                                  name="diagnostique" >{{$c['diagnostique']}}</textarea>
                                      </div>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger"
                                              data-dismiss="modal">Fermer
                                      </button>
                                      <button type="submit" class="btn btn-success">
                                        Modifier
                                      </button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                        @endforeach
                      </table>
                    </div>
                    @endif
                    <div class="modal fade" id="consultationModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajout d'une
                              Nouvelle Consultation</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="/Infirmier/UpdateConsultationMedicale"
                                  method="post">

                              <div class="row">
                                <div class="col-12">
                                  <label for="exampleInputEmail1">Type
                                    Consultation</label>
                                  <input type="text" class="form-control"
                                         name="consultation">
                                  <input type="hidden" name="idDossierMedicale"
                                         value="{{$dossier->getIdDossierMedicale()}}">
                                  <input type="hidden" name="_token"
                                         value="{!! csrf_token() !!}">
                                </div>
                                <div class="col-12">
                                  <label for="exampleInputEmail1">Prescription</label>
                                  <textarea type="text" class="form-control"
                                            name="prescription"></textarea>
                                </div>
                                <div class="col-12">
                                  <label for="exampleInputEmail1">Analyse
                                    Complementaire</label>
                                  <textarea type="text" class="form-control"
                                            name="analyseComplementaire"></textarea>
                                </div>
                                <div class="col-12">
                                  <label for="exampleInputEmail1">Diagnostique</label>
                                  <textarea type="text" class="form-control"
                                            name="diagnostique"></textarea>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                  Confirmer
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Consultation</label>
                                <input type="text" class="form-control"  name="consultation"  >
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Prescription</label>
                                <input type="text" class="form-control" name="prescription" >
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Analyse Complementaire</label>
                                <input type="text" class="form-control"  name="analyseComplementiare" >
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Groupe Sanguin</label>
                                <input type="text" class="form-control" name="groupeSanguin" >
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Diagnostique</label>
                                <input type="text" class="form-control"  name="diagnostique">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Date Derniere Visite</label>
                                <input type="text" class="form-control" name="derniereVisite" >
                            </div>
                            </div>
                        </div>
                    </form> --}}
                    @endif
                  </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Creation Dossier Medicale</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/Infirmier/CreateDossierMedicale" method="post">
              <div class="card-body">
                {{-- <div class="row">
                    <div class="col-12">
                        <label for="exampleInputEmail1">Consultation</label>
                        <input type="text" class="form-control"  name="consultation" >
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div>
                </div> --}}
                <div class="row">
                  <div class="col-12">
                    <input type="hidden" class="form-control" name="idEnfant"
                           value="{{$enfant->getIdDossierEnfant()}}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <label for="exampleInputEmail1">Groupe Sanguin</label>
                    <select class="form-control " name="groupeSanguin" id="">
                      <option selected>Selectionnez le groupe Sanguin</option>
                      <option value="A">Groupe A</option>
                      <option value="B">Groupe B</option>
                      <option value="O">Groupe O</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section("script")
  <script>
      $("#createDossierMedicale").click(function () {
          $('#exampleModalCenter').modal('show')
      })

      $("#createConsultationMedicale").click(function () {
          $("#consultationModal").modal('show')
      })

      function affiche(c){
          $("#"+c+"").modal("show");
      }
  </script>
@endsection