@if (session('success'))
<div id="flashMessage" class="flash-message flash-success">
    <span>{{ session('success') }}</span>
    <button type="button" class="flash-close" onclick="closeFlash()">×</button>
</div>
@endif

@if (session('error'))
<div id="flashMessage" class="flash-message flash-error">
    <span>{{ session('error') }}</span>
    <button type="button" class="flash-close" onclick="closeFlash()">×</button>
</div>
@endif
