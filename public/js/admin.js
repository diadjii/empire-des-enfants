
$(function(){
  $.get("/administration/listeActivites").then(function(response){
    for (var i = 0; i < response.length; i++) {

      var td= "<div class='four wide column'><div class='ui card'>"+
      "<div class='content'>"+
      "<div class='header'>"+response[i].nomActivite+"</div>"+
      "<p><strong>Description</strong> :"+response[i].descActivite+"</p>"+
      "</div></div></div>";
      $("#activites").append(td);
    }

    activiteNotAdded(response);

  }).fail(function(r,t){
    console.log(r);
    console.log(t);
  })

  $('#calendar').fullCalendar({
    schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
    aspectRatio: 2,
    dayClick: function(date,view) {
      alert('a day has been clicked!'+date.format());
    },
    events : '/administration/agendaActivites',
  });


})

$("#btnAddActivite").click(function(){
  $('#formCreateActivite').modal('show');
})

$("#formAddActivite").submit(function(e){
  e.preventDefault();
  var nomActivite = $("input[name='nomActivite']").val();
  var descActivite = $("textarea[name='descActivite']").val();
  var token = $('input[name="_token"]').val();
  $.post("/administration/addActivite",{
    nomActivite:nomActivite,
    descActivite:descActivite,
    _token : token
  }).then(function(response){
    window.location.href="/administration/Activites";
  }).fail(function(r){
    console.log(r);
    $("#action").hide();
    $("#info").text("Une erreur c'est produite lors de l'ajout d'une activite ");
    $('.ui.modal.mini').modal('show');
  })
})

$("#logOut").click(function(){
  $.get("/logOut")
  .then(function(){
    window.location.href = "/login";
  })
  .fail(function(a,b){
    console.log(a);
    console.log(b);
  })
})

$('#btnShowActivites').click(function(){
  $(".ui.modal.liste").modal('show');
})
// function getActivity(){
//   var listeActivites = null;
//   $.get("/administration/listeActivites").done(function(response){
//       console.log(response);
//       return response ;
//   //  listeActivite(response);
//     }).fail(function(){
//       alert("Echec lors de la recupêration des Activtes");
//     })
//     // console.log(listeActivites)
//     // return listeActivites;
// }
async function listeActivite(){
  $.get("/administration/listeActivites").then(function(response){
    //  console.log(response);
    //estd = getActivity();


    for (var i = 0; i < response.length; i++) {
      var td="<tr>"+
      "<td>"+response[i].id+"</td>"+
      "<td>"+response[i].nomActivite+"</td>"+
      "<td>"+response[i].descActivite+"</td>"+
      "<td><button class='ui button primary' onClick=editActivity("+response[i].id+")>Modifier</button></td>"+
      "<td><button class='ui button red' onClick=deleteActivity("+response[i].id+")>Supprimer</button></td>"+
      "</tr>";
      $("#listeActivites").append(td);
    }

  }).fail(function(r,t){
    console.log(r);
    console.log(t);
  })
}

function deleteActivity(idActivite){
  $("#action").show();
  $("#info").text("Voulez-vous vraiment supprimer l'activite ?");
  $('.ui.modal.mini').modal('show');

  $("#btnConfirmer").click(function(){
    $.get("/administration/deleteActivite/"+idActivite).then(function(response){
      alert("Activte supprimée");
    }).fail(function(r){
      console.log(r)
      // alert("Echec lors de la modification de l'activite");
    })
  })
}

function editActivity(idActivite){
  $('.editActivite').modal('show');
  $("#titreModal").text("Modifcation Activte");

  $.get("/administration/editActivity/"+idActivite).then(function(response){
    console.log(response);
    $("input[name='newNomActivite']").val(response.nomActivite);
    $("input[name='idActivite']").val(response.idActivite);
    $("textarea[name='newDescActivite']").val(response.descActivite);

  }).fail(function(r){
    console.log(r);
    // alert("Echec lors de la modification de l'activite");
  })
}

$("#editActivite").submit(function(e){
  e.preventDefault();
  var nomActivte = $("input[name='newNomActivite']").val();
  var descActivite = $("textarea[name='newDescActivite']").val();
  var idActivite = $("input[name='idActivite']").val();
  token = $('input[name="_token"]').val();

  $.post("/administration/updateActivite",{
    nomActivite:nomActivte,
    idActivite:idActivite,
    descActivite:descActivite,
    _token:token

  }).then(function(response){
    console.log(response);
    window.location.href="/administration/Activites";
  }).fail(function(r){
    console.log(r);
  })
  //console.log(nomActivte+" "+descActivite);

})


function addActiviteToAgenda(){
  var dateActivite = null;
  var idActiviteSelected =null;
  idActiviteSelected = $("input[name='activite']:checked").val();

  if(idActiviteSelected ==null){
    $("#action").hide();
    $("#info").text("Veillez choisir une activite SVP ");
    $('.ui.modal.mini').modal('show');
  }else{
    $(".ui.modal.agenda").modal('show');
    $('#calendar2').fullCalendar({
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
      aspectRatio: 2,
      selectable: true,
      select: function(startDate, endDate) {
        dateActivite = startDate;
        $("#dateChoisie").text(dateActivite.format());
        console.log(dateActivite.format())
      },
    });

    $("#saveActiviteInAgenda").click(function(){
      token = $('input[name="_token"]').val();
      if(dateActivite==null){
        $("#action").hide();
        $("#info").text("Vous n'avez pas choisi de date pour l'activite ");
        $('.ui.modal.mini').modal('show');
      }else{
        $.post("/administration/saveToAgenda",{
          idActivite  : idActiviteSelected,
          dateActivite: dateActivite.format(),
          _token:token
        }).then(function(response){
            if(response=='ok'){
              window.location ="/administration/Activites";
            }
        }).fail(function(r){
            console.log(r);
        })
      }
    })
  }
}

/**
*recuperation des activites qui ne sont pas dans l'agenda
*/
function activiteNotAdded(activites){
  for (var i = 0; i < activites.length; i++) {
    if(activites[i].date==="" || activites[i].date===null){
      var li =" <div class='item'><div class='content'>"+
      "<div class='header'><input type='radio' name='activite' value="+activites[i].id+"/> "+activites[i].nomActivite+"  </div>"+
      "</div></div>";
      $('#activitesNotAdded').append(li);
      $("#chooseDate").show();
      $("#aucuneActivite").hide();
    }
  }
}
