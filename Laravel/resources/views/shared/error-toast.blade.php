@if (Session::has('error'))
    <div id="error-toast" class="d-none bs-toast toast fade show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bx bx-plus-medical me-2"></i>
            <div class="me-auto fw-bolder">medical system</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Zamknij"></button>
        </div>
        <div class="toast-body">
            {{ Session::get('error') }}
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const errorToast = document.getElementById('error-toast');
                const bootstrapToast = new bootstrap.Toast(errorToast);
                bootstrapToast.show();

                errorToast.classList.remove('d-none');
            });
        </script>
    @endpush
@endif
