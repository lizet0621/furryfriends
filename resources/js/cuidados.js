document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.like-btn').forEach(button => {
        button.addEventListener('click', function() {
            let countSpan = this.nextElementSibling;
            countSpan.textContent = parseInt(countSpan.textContent) + 1;
        });
    });

    document.querySelectorAll('.dislike-btn').forEach(button => {
        button.addEventListener('click', function() {
            let countSpan = this.nextElementSibling;
            countSpan.textContent = parseInt(countSpan.textContent) + 1;
        });
    });
});