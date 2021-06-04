<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        {{-- Bootstrap css --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        {{-- Custom CSS --}}
          <style>
            body {
              background-color: rgb(45, 45, 45);
              color: #fff;
            }
            .navbar {
              background-color: rgb(99, 99, 99);
            }
            #index_link {
              color: #fff;
            }
            .card-header{
              background-color:rgb(99, 99, 99)
            }
            .card-body {
              color: #222
            }
            .icon_div {
              width: 35px;
              height: 5px;
              background-color: black;
              margin: 6px 0;
            }
          </style>
            
    </head>
    <body class="antialiased">
       {{-- Navbar --}}
       <nav class="navbar navbar-expand-lg">
        <div class="container">
          <h2> 
            <a id="index_link" href="{{ route('task.index') }}">
            My Tasks Today
          </a> 
        </h2>
        </div>
      </nav>

       {{-- Body --}}
      <div class="container p-5">
        @yield('task-list')
      </div>

    </body>
    {{-- Bootstrap JS --}}
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    {{-- Sortable cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    {{-- Custom JS --}}
    <script>
      const dragArea = document.querySelector('.drag-item');
      new Sortable(dragArea, {
        animation: 350
      });
    </script>
</html>
