<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
    <style>
        ul.result-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        ul.result-list li.result-list-element {
            border: 1px solid #ddd;
            margin-top: -1px;
            background-color: #f6f6f6;
            padding: 12px;
            margin-bottom: 15px;
        }

        ul.result-list li.result-list-element span {
            color: blue;
        }

        ul.result-list li.result-list-element ul {
            list-style-type: none;
            padding: 0 0 0 15px;
            margin: 0;
        }

        ul.result-list li.result-list-element ul li {
            font-style: italic;
            border-bottom: 1px solid #ddd;
            background-color: #f6f6f6;
            padding: 6px;
            color: #535353;
        }

        ul.result-list li.result-list-element ul li span {
            font-weight: bold;
            color: #535353;
        }
    </style>
</head>
<body>
    <div>
        <h1>Search Result</h1>
        <h2><a href="{{route('home')}}">Search Again...</a></h2>
        <div style="padding-left: 50px">
            <ul class="result-list">
                @foreach($materials as $material)
                    <li class="result-list-element">
                        <div>
                            <h3>Material: <span>{{$material->title}}</span></h3>
                            <ul>
                                @foreach($material->values as $value)
                                    <li><span>{{$value->attribute_type->attribute->title}}</span> :{{$value->value}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
