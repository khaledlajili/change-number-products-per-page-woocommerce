<?php
global $wpdb;
ob_start();

//getting the Number of Products To Display Per Page

$cnpppw_products_per_page = get_option('cnpppw_products_per_page');

//sanitize all post values

$add_opt_submit = sanitize_text_field($_POST['add_opt_submit']);
if ($add_opt_submit != '') {

    $cnpppw_products_per_page = sanitize_text_field($_POST['cnpppw_products_per_page']);
    $saved = sanitize_text_field($_POST['saved']);


    if (isset($cnpppw_products_per_page)) {
        update_option('cnpppw_products_per_page', $cnpppw_products_per_page);
    }

    if ($saved == true) {

        $message = 'saved';
    }
}

?>
<?php
if (isset($message)) {
    if ($message == 'saved') {
        esc_html( ' <div class="updated"><p><strong>Settings Saved.</strong></p></div>');
    }
}
?>

<div class="wrap">
    <form method="post" id="settingForm" action="">
        <h2><?php _e('Change number of products displayed per page for WooCommerce', ''); ?></h2>
        <table class="form-table">


            <tr>
                <th scope="row" style="width: 370px;">
                    <label for="cnpppw_products_per_page"><?php _e('The number of products to display per page', ''); ?></label>
                </th>
                <td>
                    <input type="number" id="cnpppw_products_per_page"
                           name="cnpppw_products_per_page" min="1" <?php if (isset($cnpppw_products_per_page)) {
                        esc_attr('placeholder="' . $cnpppw_products_per_page . '"');
                    } ?>
                    >

                </td>
            </tr>

            <tr>
                <td>
                    <p class="submit">
                        <input type="hidden" name="saved" value="saved"/>
                        <input type="submit" name="add_opt_submit" class="button-primary" value="Save Changes"/>
                        <?php if (function_exists('wp_nonce_field')) wp_nonce_field('add_opt_submit', 'add_opt_submit'); ?>
                    </p></td>
            </tr>
        </table>


    </form>

</div>

