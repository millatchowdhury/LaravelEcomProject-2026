<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    @include('Frontend.partials.css')
  </head>
  <body>

    {{-- header start  --}}
    @include('Frontend.partials.header')
    {{-- header end  --}}
    {{-- main content start  --}}
    @yield('content')
    {{-- main content end  --}}
    {{-- footer start  --}}
    @include('Frontend.partials.footer')
    {{-- footer end  --}}




    
    @include('Frontend.partials.script')
    
  </body>
</html>