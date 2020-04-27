$(document).ready(function(){

    $('#btnInscription').click(function(){
        $('#inscription').show();
        $('#connexion').hide();
        $('#btnInscription').removeClass('btn-secondary').addClass('btn-primary');
        $('#btnConnexion').removeClass('btn-primary').addClass('btn-secondary');
    });

   $('#btnConnexion').click(function(){
        $('#connexion').show();
        $('#inscription').hide();
        $('#btnConnexion').removeClass('btn-secondary').addClass('btn-primary');
        $('#btnInscription').removeClass('btn-primary').addClass('btn-secondary');
   });
})