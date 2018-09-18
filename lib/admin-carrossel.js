
function choose_image(field_id, tag_img){
    image_frame = wp.media({
        title: 'Selecione uma imagem',
        multiple: false,
        library: {
            type: 'image',
        }
    });
    image_frame.on('close', function () {
        var selection = image_frame.state().get('selection');
        var gallery_ids = new Array();
        var my_index = 0;
        selection.each(function (attachment) {
            gallery_ids[my_index] = attachment['id'];
            my_index++;
        });
        var ids = gallery_ids.join(",");        
        jQuery('#' + field_id).val(ids);        
        Refresh_Image(ids, tag_img);
    });

    image_frame.on('open', function () {
        var selection = image_frame.state().get('selection');
        field_id_val = jQuery('#' + field_id).val() ;
        if (field_id_val){
            ids = field_id_val.split(',');
            ids.forEach(function (id) {
                attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            });
        }
        
    });
    image_frame.open();
}

function Refresh_Image(the_id, tag_img){
    var data = {
        action: 'carrossel_get_image',
        id: the_id
    };    
    jQuery.get(ajaxurl, data, function(response) {
        if(response.success === true) {
            jQuery('#'+ tag_img).html( response.data.image );
        }
    });
}

