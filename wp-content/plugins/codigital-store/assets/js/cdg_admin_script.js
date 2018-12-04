function submit_admin_form(ajax_form_data) {
    jQuery.ajax({
        url:params.ajaxurl,
        type:'POST',
        data:ajax_form_data
    })
        .done(function(response){
            alert(response['error_msg']);
            async_response_success(response);
        })
        .fail(function(){
            alert("FAIL");
        })
        .always(function(){
            alert("always");
        });
}

jQuery(document).ready(function() {
    jQuery('.js-image-upload').click(function (e) {
        e.preventDefault();
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: "Seleccione una Imagen",
            library: {
                type: 'image'
            },
            button: {
                text: "Selecione"
            },
            multiple: false
        });

        let image_target = jQuery(this).attr('media-target');
        let media_data = jQuery(this).attr('media-data');

        file_frame.on('select', function () {
            var attachament = file_frame.state().get('selection').first().toJSON();
            alert(attachament);
            jQuery('#'+image_target).attr('src', attachament.url);
            jQuery('#'+media_data).val(attachament.id);
        });

        file_frame.open();
    })
});