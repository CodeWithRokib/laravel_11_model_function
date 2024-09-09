=
<div class="container">
    <h1 class="my-4">Menus</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Create New Menu</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Menu ID</th>
                <th>Name</th>
                <th>Route</th>
                <th>Icon</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->menu_id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->route }}</td>
                    <td>{{ $menu->icon }}</td>
                    <td>{{ $menu->sort_order }}</td>
                    <td>{{ $menu->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
               
            @endforeach
        </tbody>
    </table>

    {{ $menus->links() }} <!-- Pagination links -->
</div>
=
