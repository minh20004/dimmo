
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


// pricing


document.addEventListener("DOMContentLoaded", () => {
    
    const questions = document.querySelectorAll(".question");

    questions.forEach((question) => {
        
        const plus = question.querySelector(".plus");
        const answer = question.querySelector(".answer");

       
        answer.style.display = "none";

        
        plus.style.cursor = "pointer";

        
        plus.addEventListener("click", () => {
            if (answer.style.display === "none") {
                answer.style.display = "block";
                plus.textContent = "-";
            } else {
                answer.style.display = "none";
                plus.textContent = "+";
            }
        });
    });
});