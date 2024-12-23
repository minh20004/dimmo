
const tabs = document.querySelectorAll('.nav-pills .nav-link');
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
    });
});

   
document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("searchForm");
    const searchToggle = document.querySelectorAll(".search-toggle");
    const cancelSearch = document.getElementById("cancelSearch");

    searchToggle.forEach(button => {
        button.addEventListener("click", () => {
            searchForm.classList.toggle("d-none");
        });
    });

    cancelSearch.addEventListener("click", () => {
        searchForm.classList.add("d-none");
    });
});
