function onLoad() {
    window.acessibilidade.alternar();
    /*var urls_ajax = document.querySelectorAll('a[data-ajax="1"]');
    for (i = 0; i < urls_ajax.length; i++) {
        var u = urls_ajax[i];
        var url = u.attributes.href.nodeValue;
        u.setAttribute('onclick', 'navigateAjax("'+ url +'");return false;');
    }*/
}

var main_original;

function navigateAjax(url) {
    var request = new XMLHttpRequest();
    request.open('GET', url, true);
    console.log('navigateAjax url',url);
    request.onload = function () {
        var main = document.querySelectorAll('main')[0];
        if (request.status >= 200 && request.status < 400) {
            // Success!
            if (history.state === null){
                main_original = main.innerHTML;
            }
            main.innerHTML = request.responseText;
            window.history.pushState({'url':url},'', '#') //url.replace('.html','').replace('pages/',''))
            console.log('navigateAjax state',history.state);
        } else {
            // We reached our target server, but it returned an error
            main.innerHTML = '<h2>Página não encontrada</h2>'
        }
    };

    request.onerror = function () {
        // There was a connection error of some sort
    };

    request.send();
}

window.onpopstate = function(){
    console.log('onpopstate',history.state);
    if(history.state == null ){
        var main = document.querySelectorAll('main')[0];
        main.innerHTML = main_original;
    } else {
        navigateAjax(history.state.url);
    }
}