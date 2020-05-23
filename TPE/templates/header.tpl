<!DOCTYPE html>
<html lang="en">

<head>
    <base href={$baseURL}>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soy Yo</title>
    <link rel="stylesheet" href="css/soyyo.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <img src="img/Logo.jpg" class="logo-nav">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="home" id="" class="item-href-nav"><img src="img/logoSmall.png" class="logo"></a>
                </li>
                <li class="nav-item">
                    <a href="products" class="item-href-nav">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <a href="collections" class="item-href-nav">COLECCIONES</a>
                </li>
                <li class="nav-item">
                    <a href="login" class="item-href-nav">LOGIN</a>
                </li>
                {if isset($username)}
                    <li class="nav-item">
                        {$username}
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link " href="logout">Logout</a>
                    </li>
                {/if}
            </ul>
            
        </div>
    </nav>
    
