require('./bootstrap');

$(function(){
    console.clear();
    console.log('it is working')

    /**
     * Show modal dialogue box for element delete confirmation
     */
    $('form > .btn-confirm').on('click', function() {
        var confirmDialogue = $('#modal--delete_confirm');

        confirmDialogue.modal('show');

        // Set modal form contents
        confirmDialogue.find('.modal-title').html($(this).data('message'));
        confirmDialogue.find('.btn-delete').attr('data-id', $(this).data('id'));
    });

    /**
     * Submit table item delete form
     */
    $('#modal--delete_confirm .btn-delete').on('click', function() {
        let id = $(this).data('id');

        $('#delete--' + id).trigger('submit');
    });

    $('select.ajax-select').on('change', function() {
        let id = parseInt($(this).val()),
            target = $($(this).data('target'));
        if(id > 0) {
            $.ajax({
                url: $(this).data('url') + '/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        let data = response.data;
                        if (Array.isArray(data) && data.length > 0) {
                            target.html('<option value="">Please Select</option>');
                            data.forEach(function (val)
                            {
                                target.append(`<option value="${val.id}">${val.text}</option>`);
                            });

                        } else {
                            console.log('Error! Data not found from Ajax');
                        }
                    } else {
                        console.log('Ajax failed! An error occured from server');
                    }
                }
            });
        } else {
            console.log('Error! Select option is empty');
        }
    });
});