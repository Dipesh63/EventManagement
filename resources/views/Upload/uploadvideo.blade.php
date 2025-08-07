<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>This is the Upload page</h2>
    <br>

    <!-- Display success message if any -->
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Display validation errors -->
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('uploadvideoInDB', ['event_id' => $event_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf  <!-- This is important for security -->

        <input type="hidden" name="event_id" value="{{ $event_id }}"> <!-- Hidden event_id -->

        <input type="text" name="tittle" placeholder="Video Title">
        <input type="text" name="description" placeholder="Video Description">
        <input type="file" name="videofile">
        <input type="submit" value="Upload">
    </form>
</body>
</html>


