function Panel() {
    this.open = document.getElementById('open-panel');
    this.close = document.getElementById('close-panel');
    this.panel = document.getElementById('panel');

    this.openPanel = function () {
        this.open.style.display = 'none';
        this.close.style.display = 'block';
        this.panel.style.display = 'block';
        localStorage.setItem('panel-status', 'opened');
    }

    this.closePanel = function () {
        this.open.style.display = 'block';
        this.close.style.display = 'none';
        this.panel.style.display = 'none';
        localStorage.setItem('panel-status', 'closed');
    }
}

window.onload = function () {
    var panel = new Panel();

    if (localStorage.getItem('panel-status') === 'opened') {
        panel.openPanel();
    }

    panel.open.onclick = function () {
        panel.openPanel();
    };

    panel.close.onclick = function () {
        panel.closePanel();
    };
};