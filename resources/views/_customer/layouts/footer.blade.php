<footer>
    <div class="clearfix mb-0 footer text-muted">
        <div class="float-start">
            <p>2023 © Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://saugi.me">Saugi</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="{{ asset('_customer/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('_customer/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('_customer/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('_customer/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('_customer/js/main.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggle = document.getElementById("toggle-dark");
        const body = document.body;

        // Load tema sebelumnya dari localStorage
        if (localStorage.getItem("theme") === "dark") {
            body.classList.add("dark-mode");
            toggle.checked = true;
        }

        // Event toggle
        toggle.addEventListener("change", () => {
            body.classList.toggle("dark-mode");

            // Simpan status di localStorage
            if (body.classList.contains("dark-mode")) {
                localStorage.setItem("theme", "dark");
            } else {
                localStorage.setItem("theme", "light");
            }
        });
    });
</script>

</body>

</html>
