<?php

if(!current_user_can('manage_options'))
    die('NO CUENTA CON PERMISOS SUFICIENTES!!!!!');

use Inc\Controllers\BranchController;

$controller = new BranchController();

$nds_add_meta_nonce = wp_create_nonce( BranchController::NONCE_ACTION );

$branches = $controller->get_all_branches();
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

<h1>Marcas</h1>
<div class="uk-container uk-container-expand uk-padding-small">
    <div class="uk-grid-collapse" uk-grid>
        <div class="uk-width-1-1@s uk-align-right@s uk-width-3-4@m uk-align-left@m uk-margin-remove">
            <div>
                <ul class="uk-grid-small uk-child-width-1-2 uk-child-width-1-4@s" id="cdg_branches" uk-grid>
                    <?php foreach ($branches as $branch) :
                        $elem_id = "cdg_".$branch['id'];
                        ?>
                        <li>
                            <div class="uk-card uk-card-default" id="<?= $elem_id ?>">
                                <?php if(!empty($branch['img_url'])) : ?>
                                    <div class="uk-card-media-top uk-text-center">
                                        <img src="<?= $branch['img_url'] ?>" alt="<?= $branch['name'] ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="uk-card-body uk-padding-small">
                                    <h3 class="uk-card-title">
                                        <?= $branch['name'] ?>
                                    </h3>
                                    <p><?= $branch['url'] ?></p>
                                    <input type="hidden" class="cdg_branch_id" value="<?= $branch['id'] ?>">
                                    <input type="hidden" class="cdg_branch_url" value="<?= $branch['url'] ?>">
                                    <input type="hidden" class="cdg_branch_name" value="<?= $branch['name'] ?>">
                                    <input type="hidden" class="cdg_branch_img_id" value="<?= $branch['img_id'] ?>">
                                    <input type="hidden" class="cdg_branch_img_url" value="<?= $branch['img_url'] ?>">
                                </div>
                                <div class="uk-card-footer">
                                    <ul class="uk-iconnav">
                                        <li><a href="#" uk-icon="icon: file-edit" onclick="return cdg_edit('<?= $elem_id ?>');"></a></li>
                                        <li><a href="#" uk-icon="icon: trash" onclick="return cdg_remove('<?= $elem_id ?>');"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="uk-width-1-1@s uk-align-right@s uk-width-1-4@m uk-align-left@m uk-margin-remove uk-padding-small">
            <form action="<?= esc_url(admin_url('admin-post.php')) ?>" method="post" id="<?= $controller->plugin_base_name ?>_form">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Marca:</legend>
                    <input type="hidden" name="action" value="cdg_branch_action">
                    <input type="hidden" name="<?= BranchController::NONCE_FIELD ?>" value="<?= $nds_add_meta_nonce ?>">

                    <input type="hidden" name="id" id="cdg_id" value="0">
                    <input type="hidden" name="form_action" id="cdg_form_action" value="add">

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
                        <input class="uk-input" type="url" placeholder="URL" name="url" id="cdg_url">
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
        let id = jQuery("#"+elem_id+" .cdg_branch_id").val();
        let url = jQuery("#"+elem_id+" .cdg_branch_url").val();
        let name = jQuery("#"+elem_id+" .cdg_branch_name").val();
        let img_id = jQuery("#"+elem_id+" .cdg_branch_img_id").val();
        let img_url = jQuery("#"+elem_id+" .cdg_branch_img_url").val();

        jQuery("form #cdg_id").val(id);
        jQuery("form #cdg_url").val(url);
        jQuery("form #cdg_name").val(name);
        jQuery("form #cdg_form_action").val('mod');

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
        jQuery("form .js-image-upload").prop('disabled', true);
    }
</script>
<script>
    function async_response_success(data){
        location.reload();
        return true;
    }
</script>


