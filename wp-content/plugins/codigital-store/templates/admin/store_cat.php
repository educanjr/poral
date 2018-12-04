<?php

if(!current_user_can('manage_options'))
    die('NO CUENTA CON PERMISOS SUFICIENTES!!!!!');

use Inc\Controllers\CategoryController;

$controller = new CategoryController();

$nds_add_meta_nonce = wp_create_nonce( CategoryController::NONCE_ACTION );

$categories = $controller->get_all_categories();
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

<h1>Categorias</h1>
<div class="uk-container uk-container-expand uk-padding-small">
    <div class="uk-grid-collapse" uk-grid>
        <div class="uk-width-1-1@s uk-align-right@s uk-width-2-3@m uk-align-left@m uk-margin-remove">
            <div>
                <?php foreach ($categories as $category) :
                    $elem_id = "cdg_".$category['id'];
                    ?>
                    <div id="<?= $elem_id ?>"
                        class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                        <div class="uk-card-media-left uk-cover-container">
                            <img
                                <?php if(!empty($category['img_url'])) : ?>
                                    src="<?= $category['img_url'] ?>"
                                <?php endif; ?>
                                alt="<?= $category['name'] ?>" uk-cover>
                            <canvas width="600" height="400"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title"><?= $category['name'] ?></h3>
                                <p><?= $category['description'] ?></p>

                                <input type="hidden" class="cdg_category_id" value="<?= $category['id'] ?>">
                                <input type="hidden" class="cdg_category_name" value="<?= $category['name'] ?>">
                                <input type="hidden" class="cdg_category_img_id" value="<?= $category['img_id'] ?>">
                                <input type="hidden" class="cdg_category_img_url" value="<?= $category['img_url'] ?>">
                                <input type="hidden" class="cdg_category_description" value="<?= $category['description'] ?>">
                            </div>
                            <div class="uk-card-footer">
                                <ul class="uk-iconnav">
                                    <li><a href="#" uk-icon="icon: file-edit" onclick="return cdg_edit('<?= $elem_id ?>');"></a></li>
                                    <li><a href="#" uk-icon="icon: trash" onclick="return cdg_remove('<?= $elem_id ?>');"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="uk-width-1-1@s uk-align-right@s uk-width-1-3@m uk-align-left@m uk-margin-remove uk-padding-small">
            <form action="<?= esc_url(admin_url('admin-post.php')) ?>" method="post" id="<?= $controller->plugin_base_name ?>_form">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Categoria:</legend>
                    <input type="hidden" name="action" value="cdg_category_action">
                    <input type="hidden" name="<?= categoryController::NONCE_FIELD ?>" value="<?= $nds_add_meta_nonce ?>">

                    <input type="hidden" name="id" id="cdg_id" value="0">
                    <input type="hidden" name="form_action" id="cdg_form_action" value="add">

                    <div class="uk-margin uk-text-center">
                        <input type="hidden" id="cdg_image_upload" value="" name="img">
                        <div class="cdg-img-container uk-margin">
                            <img class="uk-margin-auto" id="cdg_image"
                                 style="height: auto; min-height: 50px; width: 100%;" alt="Imagen">
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
                        <textarea class="uk-textarea" rows="5" name="description" placeholder="Descripcion"></textarea>
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
        let id = jQuery("#"+elem_id+" .cdg_category_id").val();
        let name = jQuery("#"+elem_id+" .cdg_category_name").val();
        let img_id = jQuery("#"+elem_id+" .cdg_category_img_id").val();
        let img_url = jQuery("#"+elem_id+" .cdg_category_img_url").val();
        let description = jQuery("#"+elem_id+" .cdg_category_description").val();

        jQuery("form #cdg_id").val(id);
        jQuery("form #cdg_name").val(name);
        jQuery("form #cdg_form_action").val('mod');
        jQuery("form #cdg_description").val(description);

        if(img_id.length <= 0){
            jQuery("form #cdg_image").removeAttr('src');
            return false;
        }

        jQuery("form #cdg_image_upload").val(img_id);
        jQuery("form #cdg_image").attr('src', img_url);
    }

    function disable_form_elements(){
        //DISABLE FIELDS
        jQuery("form #cdg_name").prop('disabled', true);
        jQuery("form #cdg_description").prop('disabled', true);
        jQuery("form .js-image-upload").prop('disabled', true);
    }
</script>
<script>
    function async_response_success(data){
        location.reload();
        return true;
    }
</script>