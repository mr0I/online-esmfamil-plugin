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