$(document).ready(function(){
    $('#sSearch').keyup(function(){
        var search = $('#sSearch').val();
        if (search==""){
            $('#search-results-list').html('');
            $('#search-results-list').hide();
        }else{
            $.get("/search", {sSearch: search}, function(data){
                $('#search-results-list').empty.html(data);
                $('#search-results-list').show();
            })
        }
    }); 
});
//{{ URL::to('search') }}