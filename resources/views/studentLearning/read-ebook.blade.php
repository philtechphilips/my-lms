
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="student-learn-dashboard-ebook-cont-right-content-read-ebook">

       @foreach($ebooks_file as $file)
        @if($file->ebook_id == $ebooks->course_id)
            <iframe src="{{asset('ebook/'.$file->ebook_files)}}" style="width: 99%; height: 98vh;">
        @else
        @endif
       @endforeach
    </div>
</body>
</html>

