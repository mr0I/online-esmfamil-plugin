jQuery(document).ready(function ($) {
    "use strict";
    window.jq = $;
});


function submitOesFrm(e) {
    e.preventDefault();
    const selectedChar = document.getElementById('oes_select').value;
    const nonce = document.getElementById('oes_nonce').value;
    const submitBtn = document.getElementById('oes_frm_submit');

    jq.ajax({
        url: EFPL_SITE_AJAX.AJAXURL,
        type: 'POST',
        data: {
            SECURITY: EFPL_SITE_AJAX.SECURITY,
            action: 'fetchOesResults',
            selectedChar: selectedChar,
            nonce: nonce
        },
        beforeSend: () => {
            jq(submitBtn).text(EFPL_SITE_AJAX.BE_PATIENT).attr('disabled', true);
            if (jq(submitBtn).attr('data-info') === 'more')
                jq('.oes-results-container__cover').css('display', 'grid');
        },
        success: (res, xhr) => {
            if (xhr) {
                const container = jq('.oes-results-container__content');
                document.getElementById('oes_restart_btn').style.display = 'inline-block';
                document.getElementById('oes_select').style.display = 'none';
                jq(submitBtn).attr('data-info', 'more');

                jq(container).html('').delay(200).append(`
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.GIRL_NAME}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.girl_name ?? '-'}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.BOY_NAME}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.boy_name ?? '-'}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.Family}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.family ?? '-'}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.Fruist_And_Vegetables}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.fruit ?? '-'}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.Food}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.food ?? '-'}</span></div>
                    </div>
                `).fadeIn(400);

                jq('html,body').animate({
                    scrollTop: jq("#oes_results_container").offset().top
                }, 600);
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            console.error(errorThrown);
        },
        complete: () => {
            jq(submitBtn).text(EFPL_SITE_AJAX.MORE_RESULTS_TXT).attr('disabled', false);
            jq('.oes-results-container__cover').css('display', 'none');

        },
        timeout: EFPL_SITE_AJAX.REQUEST_TIMEOUT
    });

}

function playAgain(e) {
    e.preventDefault();
    jq('.oes-results-container__content').fadeOut('fast');
    jq('#oes_frm_submit').text(EFPL_SITE_AJAX.SUBMIT_BTN_TXT).attr({
        'disabled': false,
        'data-info': ''
    });
    jq('#oes_restart_btn').css('display', 'none');
    jq('#oes_select').css('display', 'inline-block');
}