<section class="oes-section">
    <div class="oes-container">
        <h1><?= __('Online esmfamil Search Engine', 'esm_famil') ?></h1>
        <form action="" method="post" id="oes_frm" onsubmit="submitOesFrm(event)">
            <input type="hidden" id="oes_nonce" value="<?= wp_create_nonce('oes-nonce') ?>">
            <div class="oes-frm-group">
                <label for="oes_select"><?= __('Choose Your Letter', 'esm_famil') ?></label>
                <select name="oes_select" id="oes_select">
                    <option value="ا">الف</option>
                    <option value="آ">آ</option>
                    <option value="ب">ب</option>
                    <option value="پ">پ</option>
                    <option value="ت">ت</option>
                    <option value="ث">ث</option>
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