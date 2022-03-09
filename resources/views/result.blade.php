<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
</head>
<body>
    <h1>Materials Search Result</h1>

    <div style="padding-left: 50px">
        <ul>
            @foreach($materials as $material)
                <li>{{$material->title}}</li>
                <ul>
                    @foreach($material->values as $value)
                        <li>{{$value->attribute_type->attribute->title}} :{{$value->value}}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
</body>
</html>
