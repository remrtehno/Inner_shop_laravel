/**
 * Created by Ancora Themes on 26.05.2015.
 */

function ready() {
    var els = document.getElementsByTagName('a');
    for (var i = 0; i < els.length; i++) {
        if(els[i].getAttribute('title')!='Product')
            els[i].setAttribute('title', els[i].text);
    }

    var els1 = document.getElementsByClassName('sc_button');
    for (var i = 0; i < els1.length; i++) {
        els1[i].removeAttribute('title');
    }
}

document.addEventListener("DOMContentLoaded", ready);