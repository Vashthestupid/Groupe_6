$(document).ready(function(){
    
    $('#btnInscription').click(function(){
        $('#connexion').hide();
        $('#inscription').show();
    })
    
    $('#btnConnexion').click(function(){
        $('#inscription').hide();
        $('#connexion').show();
    })
})