<section class="oes-section">
    <div class="oes-container">
        <h1><?= __('Online esmfamil Search Engine', 'esm_famil') ?></h1>
        <form action="" method="post" id="oes_frm" onsubmit="submitOesFrm(event)">
            <input type="hidden" id="oes_nonce" value="<?= wp_create_nonce('oes-nonce') ?>">
            <div class="oes-frm-group">
                <label for="oes_select"><?= __('Choose Your Letter', 'esm_famil') ?></label>
                <select name="oes_select" id="oes_select">
                    <option value="ا">ا</option>
                    <option value="آ">آ</option>
                    <option value="ب">ب</option>
                </select>
            </div>
            <div class="oes-frm-group">
                <button type="submit" id="oes_frm_submit">
                    <?= __('Show Result!', 'esm_famil') ?>
                </button>
            </div>
        </form>
    </div>
</section>