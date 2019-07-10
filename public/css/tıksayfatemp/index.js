document.addEventListener('DOMContentLoaded', function () {

    function animatePath(path) {
        var length = path.getTotalLength();
        path.style.transition = path.style.WebkitTransition =
            'none';
        path.style.strokeDasharray = length + ' ' + length;
        path.style.strokeDashoffset = length;
        path.getBoundingClientRect();
        path.style.transition = path.style.WebkitTransition =
            'stroke-dashoffset 5s ease-in-out';
        path.style.strokeDashoffset = '0';
    }

    function afterPathAnimation() {
        var text = document.querySelector('.btntxt');
        text.style.color = 'white';
        text.style.textShadow = '0 2px 0 rgba(29,146,49,1)';
        var btn = document.querySelector('.btn');
        btn.style.background = 'linear-gradient(to bottom, rgba(57,142,88,1) 0%, rgba(59,196,116,1) 100%)';
        var btn_base = document.querySelector('.btnbg');
        btn_base.style.cursor = 'pointer';

        animateBg(btn);
    }

    function animateBg(elem) {
        setTimeout(function () {
            elem.style.background = 'linear-gradient(to bottom, rgba(116,184,96,1) 0%,rgba(157,211,143,1) 100%)';
            setTimeout(function () {
                elem.style.background = 'linear-gradient(to bottom, rgba(57,142,88,1) 0%, rgba(59,196,116,1) 100%)';
                setTimeout(function () {
                    elem.style.background = 'linear-gradient(to bottom, rgba(116,184,96,1) 0%,rgba(157,211,143,1) 100%)';
                    setTimeout(function () {
                        elem.style.background = 'linear-gradient(to bottom, rgba(57,142,88,1) 0%, rgba(59,196,116,1) 100%)';
                        setTimeout(function () {
                            elem.style.background = 'linear-gradient(to bottom, rgba(116,184,96,1) 0%,rgba(157,211,143,1) 100%)';
                            setTimeout(function () {
                                elem.style.background = 'linear-gradient(to bottom, rgba(57,142,88,1) 0%, rgba(59,196,116,1) 100%)';
                            }, 100)
                        }, 800)
                    }, 100)
                }, 800)
            }, 100)
        }, 800)
    }

    var path = document.querySelector('path');
    path.addEventListener("transitionend", afterPathAnimation, false);

    animatePath(path);
});