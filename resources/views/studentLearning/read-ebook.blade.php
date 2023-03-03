
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
        {{getenv('APP_FULL_NAME')}} | Dashboard | Read E-Book
    </title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="student-learn-dashboard-ebook-cont-right-content-read-ebook">
        <iframe src="{{asset('ebook/'.$ebooks->ebook->file)}}" style="width: 99%; height: 98vh;">
    </div>
</body>
</html>

