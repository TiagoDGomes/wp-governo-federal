window.acessibilidade = {}

window.acessibilidade.ativo = null;

window.acessibilidade.alternar = function () {
    var className = 'contraste';    
    var ativar;
    var cookie_atual = getCookie('layout_classes');
    if (window.acessibilidade.ativo === null){
        ativar = cookie_atual.indexOf('contraste') >= 0;
        
    } else {  
        ativar = !window.acessibilidade.ativo;   
        if (ativar){             
            if (cookie_atual.indexOf('contraste') < 0){
                setCookie('layout_classes', cookie_atual + ' contraste' );
            }
        } else {
            setCookie('layout_classes', cookie_atual.replace('contraste',''));
        }      
                    
    }
    
    console.log(ativar);
    if (document.body.classList) {
        if (ativar) {
            document.body.classList.add(className);
        } else {
            document.body.classList.remove(className);
        }
    } else {
        if (ativar) {
            document.body.className += ' ' + className;
        } else {
            document.body.className = document.body.className.replace(className, '');
        }
    }
    window.acessibilidade.ativo = ativar;
}

