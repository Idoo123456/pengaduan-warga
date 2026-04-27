@if (session('success') || session('error'))
    <div class="flash-toast {{ session('success') ? 'success' : 'error' }}" id="flashToast" role="status" aria-live="polite">
        <div class="flash-toast-icon">{{ session('success') ? '✓' : '!' }}</div>
        <div class="flash-toast-message">
            {{ session('success') ?? session('error') }}
        </div>
        <button type="button" class="flash-toast-close" onclick="closeFlashToast()" aria-label="Tutup notifikasi">×</button>
    </div>

    <script>
        function closeFlashToast() {
            const toast = document.getElementById('flashToast');
            if (!toast) return;
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 250);
        }

        setTimeout(closeFlashToast, 4500);
    </script>
@endif
