    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Image</title>
    </head>
    <body>

        <h1>Edit Image</h1>

        <form action="{{ route('upload.update',$image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf   

            <!-- Title input -->
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ $image->title }}" required>
            </div>

            <br>

            <!-- Tag input -->
            <div>
                <label for="tag">Tag:</label>
                <input type="text" name="tag" id="tag" value="{{ $image->tag }}" required>
            </div>

            <br><br>

            <!-- Buttons -->
            <div>
                <a href="{{ route('home') }}">Go Back</a>
                <button type="submit">Edit</button>
            </div>
        </form>

    </body>
    </html>
