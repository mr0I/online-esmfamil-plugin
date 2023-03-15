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
            // if (xhr) {

            // }
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