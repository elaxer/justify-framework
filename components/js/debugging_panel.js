window.onload = function () {
    var open = document.getElementById('open-panel');
    var close = document.getElementById('close-panel');
    var panel = document.getElementById('panel');

    open.onclick = function () {
        open.style.display = 'none';
        close.style.display = 'block';
        panel.style.display = 'block';
    };

    close.onclick = function () {
        open.style.display = 'block';
        close.style.display = 'none';
        panel.style.display = 'none';
    };
};