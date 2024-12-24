// This script ensures that the Bootstrap tab functionality works
const tabs = document.querySelectorAll('.nav-pills .nav-link');
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
    });
});
