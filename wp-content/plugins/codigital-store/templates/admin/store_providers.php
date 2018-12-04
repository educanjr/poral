<?php

if(!current_user_can('manage_options'))
    die('NO CUENTA CON PERMISOS SUFICIENTES!!!!!');

use Inc\Controllers\ProviderController;

$controller = new ProviderController();

$nds_add_meta_nonce = wp_create_nonce( ProviderController::NONCE_ACTION );

$last_order = 0;

$providers = $controller->get_all_providers();
?>
<style>
    .uk-card-media-top{
        background: #fff;
        border: 1px dashed rgba(0,0,0,.3);
        padding: 10px;
    }
    .uk-card-media-top img{
        height: 50px;
        max-height: 50px;
    }
</style>

<h1>Proveedores</h1>
<div class="uk-container uk-container-expand uk-padding-small">
    <div class="uk-grid-collapse" uk-grid>
        <div class="uk-width-1-1@s uk-align-right@s uk-width-3-4@m uk-align-left@m uk-margin-remove">
            <div>
                <ul class="uk-grid-small uk-child-width-1-2 uk-child-width-1-4@s" id="cdg_providers_sort"
                    uk-sortable="" uk-grid>
                    <?php foreach ($providers as $provider) :
                        $elem_id = "cdg_".$provider['id'];
                        ?>
                    <li>
                        <div class="uk-card uk-card-default" id="<?= $elem_id ?>">
                            <?php if(!empty($provider['img_url'])) : ?>
                                <div class="uk-card-media-top uk-text-center">
                                    <img src="<?= $provider['img_url'] ?>" alt="<?= $provider['name'] ?>">
                                </div>
                            <?php endif; ?>
                            <div class="uk-card-body uk-padding-small">
                                <?php if($provider['in_slide']) : ?>
                                <div class="uk-card-badge uk-label">Slide</div>
                                <?php endif; ?>
                                <h3 class="uk-card-title">
                                    <?= $provider['name'] ?>
                                </h3>
                                <p><?= $provider['url'] ?></p>
                                <p><?= $provider['email'] ?></p>
                                <input type="hidden" class="cdg_provider_id" value="<?= $provider['id'] ?>">
                                <input type="hidden" class="cdg_provider_url" value="<?= $provider['url'] ?>">
                                <input type="hidden" class="cdg_provider_name" value="<?= $provider['name'] ?>">
                                <input type="hidden" class="cdg_provider_email" value="<?= $provider['email'] ?>">
                                <input type="hidden" class="cdg_provider_order" value="<?= $provider['order'] ?>">
                                <input type="hidden" class="cdg_provider_img_id" value="<?= $provider['img_id'] ?>">
                                <input type="hidden" class="cdg_provider_slide" value="<?= $provider['in_slide'] ?>">
                                <input type="hidden" class="cdg_provider_img_url" value="<?= $provider['img_url'] ?>">
                            </div>
                            <div class="uk-card-footer">
                                <ul class="uk-iconnav">
                                    <li><a href="#" uk-icon="icon: file-edit" onclick="return cdg_edit('<?= $elem_id ?>');"></a></li>
                                    <li><a href="#" uk-icon="icon: trash" onclick="return cdg_remove('<?= $elem_id ?>');"></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <?php
                        $last_order = $provider['order'];
                    endforeach;
                    $last_order++;
                    ?>
                </ul>
            </div>
        </div>
        <div class="uk-width-1-1@s uk-align-right@s uk-width-1-4@m uk-align-left@m uk-margin-remove uk-padding-small">
            <form action="<?= esc_url(admin_url('admin-post.php')) ?>" method="post" id="<?= $controller->plugin_base_name ?>_form">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Proveedor:</legend>
                    <input type="hidden" name="action" value="cdg_provider_action">
                    <input type="hidden" name="<?= ProviderController::NONCE_FIELD ?>" value="<?= $nds_add_meta_nonce ?>">

                    <input type="hidden" name="id" id="cdg_id" value="0">
                    <input type="hidden" name="form_action" id="cdg_form_action" value="add">
                    <input type="hidden" name="order" id="cdg_order" value="<?= $last_order ?>">
                    <input type="hidden" name="gen_order" id="cdg_gen_order" value="">

                    <div class="uk-margin uk-text-center">
                        <input type="hidden" id="cdg_image_upload" value="" name="img">
                        <div class="cdg-img-container uk-margin">
                            <img class="uk-margin-auto" id="cdg_image"
                                 style="height: 50px;" alt="Imagen">
                        </div>
                        <button type="button" class="uk-button uk-button-secondary uk-margin-auto js-image-upload"
                            media-data="cdg_image_upload" media-target="cdg_image">
                            Cargar Imagen
                        </button>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Nombre" name="name" id="cdg_name">
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="email" placeholder="e-mail" name="email" id="cdg_email">
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="url" placeholder="URL" name="url" id="cdg_url">
                    </div>
                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                        <label>
                            <input class="" type="checkbox" checked name="use_slide" id="cdg_use_slide"> Usar en Slide
                        </label>
                    </div>
                    <button type="button" id="cdg_save" class="uk-button uk-button-primary"
                            onclick="send_form()">Aceptar</button>
                    <button type="button" id="cdg_cancel" class="uk-button uk-button-default uk-margin-small-left"
                            onclick="cancel_form()">Cancelar</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function send_form(){
        let form_action = jQuery("#cdg_form_action").val();
        if(form_action === 'sort'){
            cdg_sort();
        }

        let form_data = jQuery("#<?= $controller->plugin_base_name ?>_form").serialize();
        alert(form_data);
        submit_admin_form(form_data);
    }

    function cancel_form(){
        location.reload();

        return true;
    }

    function cdg_edit(elem_id){
        charge_elem(elem_id);

        return false;
    }

    function cdg_sort(){
        let value = '';
        jQuery(".uk-card").each(function(indx, elem){
            let id = jQuery(elem).find('.cdg_provider_id').val();
            value += id+'_'+indx+',';
        });

        jQuery("#cdg_gen_order").val(value);
    }

    function cdg_remove(elem_id){
        charge_elem(elem_id);

        disable_form_elements();

        //ENABLE FIELDS
        jQuery("form #cdg_save").text('Eliminar');
        jQuery("form #cdg_save").addClass('uk-button-danger');
        jQuery("form #cdg_form_action").val('del');

        return false;
    }

    function charge_elem(elem_id){
        let id = jQuery("#"+elem_id+" .cdg_provider_id").val();
        let url = jQuery("#"+elem_id+" .cdg_provider_url").val();
        let name = jQuery("#"+elem_id+" .cdg_provider_name").val();
        let slide = jQuery("#"+elem_id+" .cdg_provider_slide").val();
        let order = jQuery("#"+elem_id+" .cdg_provider_order").val();
        let email = jQuery("#"+elem_id+" .cdg_provider_email").val();
        let img_id = jQuery("#"+elem_id+" .cdg_provider_img_id").val();
        let img_url = jQuery("#"+elem_id+" .cdg_provider_img_url").val();

        jQuery("form #cdg_id").val(id);
        jQuery("form #cdg_url").val(url);
        jQuery("form #cdg_name").val(name);
        jQuery("form #cdg_email").val(email);
        jQuery("form #cdg_order").val(order);
        jQuery("form #cdg_form_action").val('mod');
        jQuery("form #cdg_use_slide").prop('checked', slide);

        if(img_id.length <= 0){
            jQuery("form #cdg_image").removeAttr('src');
            return false;
        }

        jQuery("form #cdg_image_upload").val(img_id);
        jQuery("form #cdg_image").attr('src', img_url);
    }

    function disable_form_elements(){
        //DISABLE FIELDS
        jQuery("form #cdg_url").prop('disabled', true);
        jQuery("form #cdg_name").prop('disabled', true);
        jQuery("form #cdg_email").prop('disabled', true);
        jQuery("form #cdg_order").prop('disabled', true);
        jQuery("form #cdg_use_slide").prop('disabled', true);
        jQuery("form .js-image-upload").prop('disabled', true);
    }

    UIkit.util.on('#cdg_providers_sort', 'moved', function () {
        disable_form_elements();
        jQuery("form #cdg_id").prop('disabled', true);

        //ENABLE FIELDS
        jQuery("form #cdg_save").text('Salvar Orden');
        jQuery("form #cdg_form_action").val('sort');
    });
</script>
<script>
    function async_response_success(data){
        let form_action = jQuery("#cdg_form_action").val();
        if(form_action === 'sort'){
            location.reload();
            return true;
        }

        location.reload();
        return true;
    }
</script>
