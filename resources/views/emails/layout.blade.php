<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato:300,500');
        
        body {
            margin: 20px;
            font-family: Lato, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            font-weight: 500;
        }
    </style>
</head>
<body>
    @yield('body')

    <div style="margin-top:40px">
        Powered by <a href="https://pay.pixel.hn"><img src="{{ url('/images/logo.png') }}" height="26" align="center"></a>
    </div>

</body>
</html>