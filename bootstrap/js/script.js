$(document).ready(function(){

    $('#keyword').on('keyup',function(){
            $("#container").load('daftar-covid.php?keyword=' + $('#keyword').)
    });
});