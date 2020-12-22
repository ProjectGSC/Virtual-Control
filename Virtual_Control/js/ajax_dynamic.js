//データ送信→処理
function ajax_dynamic_post(url, data) {
    return $.ajax({
        type: 'POST',
        url: url,
        data: data,
        crossDomain: false,
        dataType: 'json'
    });
}

//データを要求
function ajax_dynamic_post_toget(url) {
    return $.ajax({
        type: 'POST',
        url: url,
        crossDomain: false,
        dataType: 'json'
    });
}