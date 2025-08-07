<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('seeVideo_Route', ['event_id' => $event_id]) }}">
        <button name="seevideo_btn">Video</button>
    </a>

    
    <a href=""><button name="seepdf_btn">PDF</button></a>


    
</body>
</html>