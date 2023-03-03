<!DOCTYPE html>
<html>
<head>Newsletter</title>
</head>
<body>
    <h4>{{$subject}}</h4>
    <p>{!! htmlspecialchars_decode(nl2br($messages)) !!}</p>
</body>
</html>
