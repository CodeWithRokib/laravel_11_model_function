
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('subcategories.create') }}" class="btn btn-primary">Add New SubCategory</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">SubCategory List</div>

                <div class="card-body">
                    @if ($subcategories->isEmpty())
                        <p>No category found.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category_ID</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->category_id }}</td>
                                        <td>
                                            <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

 
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

