<div class="list-group mb-4">
    <a href="/dashboard" class="list-group-item list-group-item-action active">Dashboard</a>
</div>

<div class="mb-4">
    <small class="text-secondary d-block mb-2">Band</small>
    <div class="list-group">
        <a href="{{ route('bands.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('bands.table') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <small class="text-secondary d-block mb-2">Album</small>
    <div class="list-group">
        <a href="{{ route('albums.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('albums.table') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <small class="text-secondary d-block mb-2">Genre</small>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">Create</a>
        <a href="#" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>