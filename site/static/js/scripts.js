jQuery(document).ready(function ($) {
    "use strict";
    window.jq = $;
});


function submitOesFrm(e) {
    e.preventDefault();
    const selectedChar = document.getElementById('oes_select').value;
    const nonce = document.getElementById('oes_nonce').value;

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
            //jq(submitBtn).text(EFPL_SITE_AJAX.WAITING_TXT).attr('disabled', true);
        },
        success: (res, xhr) => {
            console.log(res);
            if (xhr) {
                const container = jq('.oes-results-container');

                jq(container).html('').append(`
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.GIRL_NAME}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.girl_name}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.BOY_NAME}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.boy_name}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.Family}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.family}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.Fruist_And_Vegetables}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.fruit}</span></div>
                    </div>
                    <div class="oes-results-item">
                        <div class="oes-results-item__header">
                            <span>${EFPL_SITE_AJAX.Food}</span>
                        </div>
                        <div class="oes-results-item__content"><span>${res.data.food}</span></div>
                    </div>
                `).fadeIn('slow').end();
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            console.error(errorThrown);
        },
        complete: () => {
            // jq(submitBtn).text(EFPL_SITE_AJAX.SUBMIT_BTN_TXT).attr('disabled', false);
        },
        timeout: EFPL_SITE_AJAX.REQUEST_TIMEOUT
    });

}