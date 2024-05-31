@if (Session::has('success'))
    <div id="success-toast" class="d-none position-absolute bs-toast toast fade show bg-primary bottom-0 end-0 mb-3 me-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bx bx-plus-medical me-2"></i>
            <div class="me-auto fw-bolder">medical system</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Zamknij"></button>
        </div>
        <div class="toast-body">
            {{ Session::get('success') }}
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const successToast = document.getElementById('success-toast');
                const bootstrapToast = new bootstrap.Toast(successToast);
                bootstrapToast.show();

                successToast.classList.remove('d-none');
            });
        </script>
    @endpush
@endif
