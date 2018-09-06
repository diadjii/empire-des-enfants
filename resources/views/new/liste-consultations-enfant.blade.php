@extends("new.layout-admin")
@section("titreSection")
<h2>D&eacutetail Dossier Medical</h2>
@endsection
@section("content")

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-success card-header-icon">
      <div class="card-icon">
        <i class="material-icons">local_hospital</i>
      </div>
      <h4 class="card-title">Dossier Médical de {{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}}</h4>
    </div>
    <div class="material-datatables">
      <br>
      @if($infosConsultationEnfant == null)
          <div class="alert alert-info text-black" style="width:60%" role="alert">
            Le dossier medical de {{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}} ne contient pas encore de consultation
          </div>
      @else

      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
            <th>Consultation</th>
            <th>Date Consultation</th>
            <th>Voir Details</th>
            
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Consultation</th>
            <th>Date Consultation</th>
            <th>Voir Details</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ( $infosConsultationEnfant as $c )
          <tr>
            <td>{{$c['consultation']}}</td>
            <td>{{$c['dateConsultation']}}</td>
            <td>
            <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$c['id']}}" value="Details"/>
            </td>
          </tr>
          <div class="modal fade" id="{{$c['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12">
                    <div class="card-header card-header-rose card-header-text">
                      <div class="card-text">
                        <h4 class="card-title">Details Consultation</h4>
                      </div>
                    </div>
                    <div class="card-body ">
                      <form method="get" action="/" class="form-horizontal">
                        <div class="row">
                          <label class="col-sm-4 col-form-label">Type de Consultation</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="text" class="form-control" value="{{$c['consultation']}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-4 col-form-label">Type de Prescription</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="text" class="form-control" value="{{$c['prescription']}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-5 col-form-label">Analyse compléméntaire</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="text" class="form-control" value="{{$c['analyse']}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-4 col-form-label">Diagnostic</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <textarea name="diagnostic" class="form-control" id="" cols="40" rows="10">{{$c['diagnostique']}}</textarea>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
            @endforeach
          </tbody>
        </table>
      
      
      
     
    @endif  </div>
    </div>
    <!-- end content-->
  </div>
  <!--  end card  -->
</div>
<!-- end col-md-12 -->
@endsection
</div>
</div>
