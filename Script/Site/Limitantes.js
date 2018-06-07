function val(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z\ ]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function vali(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function valo(n) {
    tecla = (document.all) ? n.keyCode : n.which;
    if (tecla==8) return true;
    patron =/[0-9]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
