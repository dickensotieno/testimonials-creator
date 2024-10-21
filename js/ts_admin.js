jQuery(document).ready(function($){
    var file_frame;

    $('#uploadlogo_button').on('click', function(e){
        e.preventDefault();

        if (file_frame) {
            file_frame.open();
            return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select a logo',
            button: {
                text: 'Use this logo',
            },
            multiple: false
        });

        file_frame.on('select', function(){
            var attachment = file_frame.state().get('selection').first().toJSON();
            $('#logo_input').val(attachment.url);
            $('#logo_img').attr('src', attachment.url).show();
            $('#removelogo_button').show();
        });

        file_frame.open();
    });

    $('#removelogo_button').on('click', function(e){
        e.preventDefault();
        $('#logo_input').val('');
        $('#logo_img').hide();
        $(this).hide();
    });
});
