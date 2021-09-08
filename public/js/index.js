
var element = document.getElementById("#submit");

element.onClick(function(){
    onsole.log('bonojour');
    alert('bonjoue');
});


function initElement()
{
    var els = document.getElementsByTagName("a[href='#finish']");

  // NOTE: showAlert(); ou showAlert(param); NE fonctionne PAS ici.
  // Il faut fournir une valeur de type function (nom de fonction déclaré ailleurs ou declaration en ligne de fonction).
  els.onclick = showAlert;
};

// function myfunc()
// {

//   var name_project = $(".name_project").val();
//   var description_project = $(".description_project").val();
//   var budget_oc = $(".budget_oc").val();

//   var capitale_oc = $(".capitale_oc").val();
//   var capitale_demander = $(".capitale_demander").val();

// //   alert(name + ' ' + budget_oc  + ' ' + description_project );

//   $.post("http://127.0.0.1:8000/users/dashboard/demande-soutien-post",
//   {suggest: name_project},
//   {suggest: description_project},
//   {suggest: budget_oc},
//   {suggest: capitale_oc},
//   {suggest: capitale_demander},
//   function(result){
//     $("span").html(result);
//   });

//   alert('bopjnifngi');

// }
