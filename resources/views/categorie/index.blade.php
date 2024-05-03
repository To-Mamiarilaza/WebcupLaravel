<!-- resources/views/categories/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h2>Categories</h2>
    <!-- Form for creating a new category -->
    <form method="POST" action="{{ url('/categories') }}">
        @csrf
        <div>
            <label for="nom">Category Name:</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <button type="submit">Add Category</button>
    </form>

    <!-- List of existing categories -->
    <h3>List of Categories:</h3>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->nom }}
                <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
