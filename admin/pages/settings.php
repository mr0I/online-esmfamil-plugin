<?php defined('ABSPATH') or die('No script kiddies please!');


if ($_REQUEST['submit']) {
    if (isset($_POST['delete_efpl_db'])) {
        update_option('should_delete_efpl_db', 1);
    } else {
        update_option('should_delete_efpl_db', 0);
    }

    echo '<div class="updated" id="message"><p><strong>' . __("Settings Saved.", "esm_famil") . '</strong>.</p></div>';
}
?>

<div class="wrap">
    <h2><?= __('Settings', 'esm_famil') ?></h2>
    <div class="nav-tab-wrapper">
        <a href="?page=efpl&amp;tab=main-settings" class="nav-tab"><?= __('Main Settings', 'esm_famil') ?></a>
    </div>

    <form method="post" action="">
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">با حذف افزونه دیتای آن نیز حذف شود؟</th>
                    <td>
                        <input type="checkbox" name="delete_efpl_db" <?= get_option('should_delete_efpl_db') ? 'checked' : '' ?>>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?= __('Save Settings', 'esm_famil') ?>">
        </p>
    </form>
</div>