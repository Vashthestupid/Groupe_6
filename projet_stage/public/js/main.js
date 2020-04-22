$(document).ready(function(){

    $('#btnInscription').click(function(){
        $('#inscription').show();
        $('#connexion').hide();
    });

   $('#btnConnexion').click(function(){
        $('#connexion').show();
        $('#inscription').hide();
   });
})