$(document).ready(function(e){
    $('#searchText').on('focus keyup', function(e){
        let searchFilter = $('#searchFilter').val().replace(' ', '_');
        $.ajax({
            url:'/api/autocomplete/' + searchFilter
        }).done(function(result){
            $('#searchText').autocomplete({
                source: result
            });
        });
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('form').attr('action', "books/" + id);
    })
});
