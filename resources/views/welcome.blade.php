<!DOCTYPE html>
<html>
    <head>
        <title>publicFunction Laravel Boilerplate</title>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: #000;
                background-image: url('{{asset('dist/images/banner_logo.jpg')}}');
                background-size: cover;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;
                position: fixed;
            }
            .content {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            img {
                width: 100%;
                position: relative;
                top: 33%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img src="{{asset('dist/images/fullname.png')}}" />
            </div>
        </div>
    </body>
</html>