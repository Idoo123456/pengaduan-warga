@if (session('success'))
    <div style="background:#e7f9ee;padding:12px;border-radius:8px;margin-bottom:15px;color:#15803d">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="background:#fee2e2;padding:12px;border-radius:8px;margin-bottom:15px;color:#b91c1c">
        {{ session('error') }}
    </div>
@endif
