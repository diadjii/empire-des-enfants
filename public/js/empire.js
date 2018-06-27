
$(function(){
  $("#message").alert('close')
})
  //   $.get("allUser").then(function(response){
  //     for (var i = 0; i < response.length; i++) {
  //       var tr = "<tr>"+
  //       "<td>"+response[i].id+"</td>"+
  //       "<td>"+response[i].nom+"</td>"+
  //       "<td>"+response[i].prenom+"</td>"+
  //       "<td>"+response[i].role.toUpperCase()+"</td>"
  //       // "<td><button onClick='editUser("+response[i].id+")' class='ui red button'>Supprimer</button></td>";
  //       $("#listeUtilisateurs").append(tr);
  //     }
  //     console.log(response);
  //   })
  // })
  //

  //recuperation des infos lors de la connexion de l'utilisateur
  $("#login").submit(function(e){
    e.preventDefault();

    //recperation du login et du password
    var inputLogin = $("#inputLogin").val();
    var inputPassword = $("#inputPassword").val();
    var token = $('input[name="_token"]').val();
    // alert(login+" "+password)
    $.post("login",{
      login:inputLogin,
      password:inputPassword,
      _token:token
    }).then(function(response){
      redirectUser(response);
    }).fail(function(a,b){
      console.log(a)
    })
  })


  $('#formAddUser').submit(function(e){
    e.preventDefault();

    login = $("input[name='login']").val();
    password = $("input[name='password']").val();
    typeUser = $("select[name='typeUser']").val();
    nom = $("input[name='nom']").val();
    prenom = $("input[name='prenom']").val();
    token = $('input[name="_token"]').val();

    $.post("/addUser",{
      login:login,
      password:password,
      typeUser:typeUser,
      nom:nom,
      prenom:prenom,
      _token:token
    }).then(function(response){
      switch (response) {
        case 'ok':
        alert("Compte Utilisateur créé avec success");
        break;
        case 'exist':
        alert("Ce compte d'utilisateur existe dejà");
        break;
        case "vide":
          alert("Champs requis");
        break;
      }
    }).fail(function(a,b){

      var infoLogin = a.responseJSON.errors.login;
      var infoPassword = a.responseJSON.errors.password;
      var typeUser = a.responseJSON.errors.typeUser;
      var message ="<ul>";
      message +="<li>"+infoLogin+"</li>";
      message +="<li>"+infoPassword+"</li>";
      message +="<li>"+typeUser+"</li></ul>";
      $("#message").html(message);
      $("#message").show();
    })
  })
  //
  // //Redirect the user
  function redirectUser(role){
    switch (role) {
      case "superadmin":
      window.location.href="/Admin";
      break;
      case 'admin':
      window.location.href="/Admin";
      break;
      case 'infirmier':
      window.location.href="infirmier/accueil";
      break;
      case 'encadreur':
      window.location.href="encadreur/accueil";
      break;
      case 'animateur':
      window.location.href="animateur/accueil";
      break;
      default:
      console.log(role);

    }
  }
  //
  // $("#logOut").click(function(){
  //   // e.preventDefault();
  //   // var token = $("input[name='_token']").val();
  //   $.get("logOut")
  //   .then(function(response){
  //     window.location.href = "login";
  //   })
  //   .fail(function(a,b){
  //     console.log(a);
  //     console.log(b);
  //   })
  // })
  //
  // $('.menu .item').tab();
  //
  //Voir les infos d'un utilisateur
function activeUser(idUser){
  // alert(idUser)
  $.get("/Admin/"+idUser+"/changeStatusToOn").then(function(){
    window.location.href="/Admin/ListeUser";
  }).fail(function(r){
    console.log(r);
  })
}

function desactiveUser(idUser){
  // alert(idUser)
  $.get("/Admin/"+idUser+"/changeStatusToOff").then(function(){
    window.location.href="/Admin/ListeUser";
  }).fail(function(r){
    console.log(r);
  })
}

function deleteUser(idUser){
  // alert(idUser);
  $('#exampleModal').modal('toggle');
  $(".modal-body").text("Voulez-vous vraiment supprimer cette utilisateur");
  $("#btnConfirmDeleteUser").click(function(){
    $.get("/Admin/"+idUser+"/deleteUser").then(function(response){
      alert("Suppression ok ");
      $('#exampleModal').modal('toggle');
    }).fail(function(r){
      console.log(r);
    })
  })
}

function generate(l){
  if (typeof l==='undefined'){var l=8;}
  /* c : chaîne de caractères alphanumérique */
  var c='abcdefghijknopqrstuvwxyzACDEFGHJKLMNPQRSTUVWXYZ12345679',
  n=c.length,
  /* p : chaîne de caractères spéciaux */
  p='!@#$+-*&_?',
  o=p.length,
  r='',
  n=c.length,
  /* s : determine la position du caractère spécial dans le mdp */
  s=Math.floor(Math.random() * (p.length-1));

  for(var i=0; i<l; ++i){
    if(s == i){
      /* on insère à la position donnée un caractère spécial aléatoire */
      r += p.charAt(Math.floor(Math.random() * o));
    }else{
      /* on insère un caractère alphanumérique aléatoire */
      r += c.charAt(Math.floor(Math.random() * n));
    }
  }
  return r;

}
  /* exemple de fonction génération de mdp dans un form  */
  $(document).ready(function() {
    /* on détecte un des champ du formulaire contient une class "gen", on insérera un bouton dans sa div parent qui appelera la fonction generate() */
    if($('form input.gen').length){
      $('form input.gen').each(function(){
        $('<span class="generate"><i class="fa fa-fw fa-refresh"></i></span>').appendTo($(this).parent());
      });
    }
    /* évènement click sur un element de class "generate" > appelle la fonction generate() */
    $(document).on('click','.generate', function(e){
      e.preventDefault();
      /* ajout du mot de passe + changement du paramètre type de password vers text (pour lisibilité) */
      $(this).parent().children('input').val(generate()).attr('type','text');
    });
  });


  $('#generatePassword').click(function(){
    var password = generate(8);
    $("input[name='password']").val(password);
  })
