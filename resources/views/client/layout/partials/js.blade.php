<script src="client/lib/bootstrap.bundle.min.js"></script>
<script src="client/lib/font-fontawesome-ae333ffef2.js"></script>
<script src="client/js/js.js"></script>
<script src="client/js/swiper-bundle.min.js"></script>
<script src="client/js/js.js"></script>
<script>
    document.querySelectorAll('.toggle-option').forEach(option => {
        option.addEventListener('click', () => {
            // Remove 'selected' class from all options
            document.querySelectorAll('.toggle-option').forEach(opt => opt.classList.remove('selected'));
            
            // Add 'selected' class to the clicked option
            option.classList.add('selected');
        });
    });
</script>
<script>
    document.getElementById('filterButton').addEventListener('click', function () {
        var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasExample'));
        offcanvas.show();  // Hiển thị offcanvas
    });
</script>