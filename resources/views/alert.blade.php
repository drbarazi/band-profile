@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('update'))
    <div class="alert alert-success">{{ session('update') }}</div>
@endif