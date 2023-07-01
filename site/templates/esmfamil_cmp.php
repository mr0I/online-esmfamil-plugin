<link rel="stylesheet" href="<?= plugin_dir_url(__FILE__) . '../static/css/styles.css' ?>">

<section class="oes-section">
    <div class="oes-container">
        <h1><?= __('Online esmfamil Search Engine', 'esm_famil') ?></h1>
        <form action="" method="post" id="oes_frm" onsubmit="submitOesFrm(event)">
            <input type="hidden" id="oes_nonce" value="<?= wp_create_nonce('oes-nonce') ?>">
            <div class="oes-frm-group">
                <label for="oes_select" id="oes_select_label"><?= __('Choose Your Letter', 'esm_famil') ?></label>
                <select name="oes_select" id="oes_select" onfocus="this.size=6;" onblur="this.size=6;" onfocusout="this.size=null;" onchange="this.size=6; this.blur();">
                    <option value="ا">الف</option>
                    <option value="آ">آ</option>
                    <option value="ب">ب</option>
                    <option value="پ">پ</option>
                    <option value="ت">ت</option>
                    <option value="ث">ث</option>
                    <option value="ج">ج</option>
                    <option value="چ">چ</option>
                    <option value="ح">ح</option>
                    <option value="خ">خ</option>
                    <option value="د">د</option>
                    <option value="ذ">ذ</option>
                    <option value="ر">ر</option>
                    <option value="ز">ز</option>
                    <option value="ژ">ژ</option>
                    <option value="س">س</option>
                    <option value="ش">ش</option>
                    <option value="ص">ص</option>
                    <option value="ض">ض</option>
                    <option value="ط">ط</option>
                    <option value="ظ">ظ</option>
                    <option value="ع">ع</option>
                    <option value="غ">غ</option>
                    <option value="ف">ف</option>
                    <option value="ک">ک</option>
                    <option value="گ">گ</option>
                    <option value="ل">ل</option>
                    <option value="م">م</option>
                    <option value="ن">ن</option>
                    <option value="ه">ه</option>
                    <option value="و">و</option>
                    <option value="ی">ی</option>
                </select>
            </div>
            <div class="oes-frm-group">
                <button type="submit" id="oes_frm_submit" data-info="">
                    <?= __('Show Result!', 'esm_famil') ?>
                </button>
            </div>
            <div class="oes-frm-group">
                <button style="display: none;" id="oes_restart_btn" onclick="playAgain(event)">
                    <?= __('Play Again', 'esm_famil') ?>
                </button>
            </div>
        </form>

        <div id="oes_results_container">
            <div class="oes-results-container__cover" style="display: none;"><?= __('Loading...', 'esm_famil') ?></div>
            <div class="oes-results-container__content" style="display: none;"></div>
        </div>

    </div>
</section>


<script id='efpl-main-script-js-extra'>
    var EFPL_SITE_AJAX = {
        'AJAXURL': '<?= admin_url('admin-ajax.php'); ?>',
        'SECURITY': '<?= wp_create_nonce('2VOgPHZNsyqOiGRA'); ?>',
        'REQUEST_TIMEOUT': '30000',
        'SUBMIT_BTN_TXT': '<?= __('Show Result!', 'esm_famil') ?>',
        'MORE_RESULTS_TXT': '<?= __('More Results!', 'esm_famil') ?>',
        'BE_PATIENT': '<?= __('Please Be Patient...', 'esm_famil') ?>',
        'GIRL_NAME': '<?= __('Girl Name', 'esm_famil') ?>',
        'BOY_NAME': '<?= __('Boy Name', 'esm_famil') ?>',
        'Family': '<?= __('Family', 'esm_famil') ?>',
        'Fruist_And_Vegetables': '<?= __('Fruist And Vegetables', 'esm_famil') ?>',
        'Food': '<?= __('Food', 'esm_famil') ?>',
        'Color': '<?= __('Color', 'esm_famil') ?>',
        'Flower': '<?= __('Flower', 'esm_famil') ?>',
        'Items': '<?= __('Items', 'esm_famil') ?>',
        'City': '<?= __('City', 'esm_famil') ?>',
        'Country': '<?= __('Country', 'esm_famil') ?>',
        'Organ': '<?= __('Organ', 'esm_famil') ?>',
        'Animal': '<?= __('Animal', 'esm_famil') ?>',
        'Car': '<?= __('Car', 'esm_famil') ?>',
        'Dress': '<?= __('Dress', 'esm_famil') ?>',
        'Celebrity': '<?= __('Celebrity', 'esm_famil') ?>',
        'Job': '<?= __('Job', 'esm_famil') ?>',
        'Sport': '<?= __('Sport', 'esm_famil') ?>',
        'Movie': '<?= __('Movie', 'esm_famil') ?>',
        'Animation': '<?= __('Animation', 'esm_famil') ?>',
        'Book': '<?= __('Book', 'esm_famil') ?>',
    };
</script>
<script src="<?= plugin_dir_url(__FILE__) . '../static/js/scripts.js' ?>" defer></script>