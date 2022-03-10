<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
    <style>
        /* Customize the label (the container) */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        /* The container-r */
        .container-r {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .container-r input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark-r {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container-r:hover input ~ .checkmark-r {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .container-r input:checked ~ .checkmark-r {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark-r:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container-r input:checked ~ .checkmark-r:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container-r .checkmark-r:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

    </style>
</head>
<body>
    <h2>Search For Materials</h2>
    <div style="padding-left: 50px">
        <form action="{{route('search')}}" method="post">
            @csrf

            @foreach($types as $type)
                <div style="border: 1px solid grey; padding: 20px">
                    <label class="container-r">{{$type->title}}
                        <input type="radio" name="type" id="type{{$type->id}}" value="{{$type->title}}">
                        <span class="checkmark-r"></span>
                    </label>

                    <div id="box_type{{$type->id}}" name="box-type" style="padding-left: 20px; display: none">
                        @foreach($type->attribute_types as $attribute_type)
                            <label class="container">{{$attribute_type->attribute->title}}
                                <input type="checkbox" name="attribute[]" id="attribute{{$attribute_type->attribute->id}}" value="{{$attribute_type->attribute->title}}">
                                <span class="checkmark"></span>
                            </label>
                            <div style="padding-left: 20px">
                                @foreach($attribute_type->values as $value)
                                    <label class="container-r">{{$value->value}}
                                        <input type="radio" name="value[{{$attribute_type->attribute->title}}]" id="value{{$value->id}}" value="{{$value->value}}">
                                        <span class="checkmark-r"></span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div>
                <button type="submit" style="margin-top: 20px">Search</button>
            </div>
        </form>
    </div>

    <script>
        let inputs = document.getElementsByName('type');
        inputs.forEach(element => {
            element.addEventListener('change', (e)=>{
                let boxes = document.getElementsByName('box-type');
                boxes.forEach(el => {
                    el.style.display = "none";
                });

                let boxId = "box_" + e.target.id;
                document.getElementById(boxId).style.display = "block";
            });
        });
    </script>
</body>
</html>
