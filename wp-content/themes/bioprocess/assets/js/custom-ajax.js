jQuery(document).ready(function($) {
    $('#search_form').on('submit', function(e) {
        e.preventDefault();
        var searchTerm = $('#search_input').val();
        $.ajax({
            type: 'POST',
            url: customAjax.ajaxurl,
            data: {
                action: 'custom_ajax_search',
                nonce: customAjax.nonce,
                search_term: searchTerm,
            },
            success: function(response) {
                $('#search_results').html(response);
            },
            error: function(error) {
                // Handle errors if necessary
            },
        });
    });
});