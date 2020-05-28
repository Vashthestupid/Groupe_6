$(document).ready(function(){

    $('#btnInscription').click(function(){
        $('#btnInscription').removeClass('btn-secondary').addClass('btn-primary');
        $('#btnConnexion').removeClass('btn-primary').addClass('btn-secondary');
        $('#inscription').show();
        $('#connexion').hide();
    });

   $('#btnConnexion').click(function(){
        $('#btnConnexion').removeClass('btn-secondary').addClass('btn-primary');
        $('#btnInscription').removeClass('btn-primary').addClass('btn-secondary');
        $('#connexion').show();
        $('#inscription').hide();
        
   });

   $('#navbarDropdown').click(function(){
       $('.dropdown-menu').SlideToggle();
   });
})