<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
</head>
<body>

    <h1>Upload Image</h1>

    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Image input -->
        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" required>
        </div>

        <br>

        <!-- Title input -->
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <br>

        <!-- Tag input -->
        <div>
            <label for="tag">Tag:</label>
            <input type="text" name="tag" id="tag">
        </div>

        <br><br>

        <!-- Buttons -->
        <div>
            <a href="{{ route('home') }}">Go Back</a>
            <button type="submit">Upload</button>
        </div>
    </form>

</body>
</html>
