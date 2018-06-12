$(function(){
  $.get("/administration/listeActivites").then(function(response){
      console.log(response);
      for (var i = 0; i < response.length; i++) {

      var td= "<div class='four wide column'><div class='ui card'>"+
        "<div class='content'>"+
        "<div class='header'>"+response[i].nomActivite+"</div>"+
          "<div class='meta'>"+
              "<span>"+response[i].date.date+"</span>"+
          "</div>"+
          "<p><strong>Description</strong> :"+response[i].descActivite+"</p>"+
        "</div></div></div>";
      $("#activites").append(td);
  }

  }).fail(function(r,t){
    console.log(r);
    console.log(t);
  })
})

$("#addActivity").click(function(){
  $('.ui.modal').modal('show');
})
$("#logOut").click(function(){
  // e.preventDefault();
  // var token = $("input[name='_token']").val();
  $.get("logOut")
  .then(function(response){
    window.location.href = "login";
  })
  .fail(function(a,b){
    console.log(a);
    console.log(b);
  })
})

function listeActivite(){
  $.get("/administration/listeActivites").then(function(response){
      console.log(response);
      for (var i = 0; i < response.length; i++) {
      var td="<tr>"+
      "<td>"+response[i].id+"</td>"+
      "<td>"+response[i].nomActivite+"</td>"+
      "<td>"+response[i].descActivite+"</td>"+
      "<td>"+response[i].date+"</td>"+
      "<td><button class='ui button primary'>Modifier</button></td>"+
      "<td><button class='ui button red'>Supprimer</button></td>"+
      "</tr>";
      $("#listeActivites").append(td);
    }

  }).fail(function(r,t){
    console.log(r);
    console.log(t);
  })
}
