


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Video</title>
</head>
<body>
    <h2>Uploaded Videos</h2>
    <table border="2">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>View</th>
            <th>Download</th>
        </tr>

        @foreach ($data as $item)
        <tr>
            <td>{{ $item->tittle }}</td>
            <td>{{ $item->description }}</td>
            <!-- Assuming assets folder stores the video -->
            {{-- <td><a href="{{ url('assets/' . $item->videofile) }}" target="_blank">View</a></td> --}}
            <td><a href="{{ url('/view/' . $item->id) }}">View</a></td>
            <td><a href="{{ url('/download/' . $item->videofile) }}">Download</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
