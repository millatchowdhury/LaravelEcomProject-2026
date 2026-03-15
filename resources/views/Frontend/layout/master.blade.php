<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      @yield('title', 'Laravel Ecommerce Project')
    </title>
    
    @include('Frontend.partials.css')
  </head>
  <body>

    {{-- header start  --}}
    @include('Frontend.partials.header')
    {{-- header end  --}}
    {{-- show error message start  --}}
    @include('Frontend.partials.message')
    {{-- show error message end  --}}
    {{-- main content start  --}}
    @yield('content')
    {{-- main content end  --}}
    {{-- footer start  --}}
    @include('Frontend.partials.footer')
    {{-- footer end  --}}




    
    @include('Frontend.partials.script')
    
  </body>
</html>