<!DOCTYPE html>
<html>
    <head>
        <title>Meneger</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
        <style>
            .pagination svg{
                width: 30px;
            }
            .pagination nav div:first-child{
                display: none;
            }
        </style>
    </head>
    <body>
    
    <div class="container-fluid">
        <br>
        @yield('content')
    </div>
    
    </body>
</html>