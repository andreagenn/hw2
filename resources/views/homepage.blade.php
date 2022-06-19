@extends('layouts.app')

<html>

  <head>
    @section('title', 'Homepage')
    <script src='{{ url("js/homepage.js")}}' defer></script>
    <link rel="stylesheet" href='{{url("/css/homepage.css")}}'>
  </head>

  <body>

    @section('content')
      <article>

        @section('titolo', 'HOMEPAGE')

          <section>
            <div class="abbonamenti">
              <em>I nostri abbonamenti:</em>
              <span class='hidden' id='abb_sel'></span>
            </div>
          </section>

      </article>
    @endsection
   
  </body>

</html>