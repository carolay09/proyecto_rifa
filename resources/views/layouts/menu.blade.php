<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse show" id="navbarDark">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Sobre Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Reglas Generales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Carrito</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Login</a>
              </li>
            </ul> 
          </div>
        </div>
      </nav>
    

    @yield('content')
</body>
</html>