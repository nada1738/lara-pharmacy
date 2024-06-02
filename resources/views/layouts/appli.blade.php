<!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--title de tab-->
        <title>@yield('title')</title>
        <!--icon de pharmacie dans tab-->
        <link rel="icon" href="/pfe/images/logo.png" /> 

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- bootstrap: public css app.css (it works,, prove: index)-->
        <link href="resources/sass/app.scss" rel="stylesheet"> <!-- sidebar-->
        
        <!-- Fonts -->    
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    </head>

    <body>
        <div id="app">
            @include('include/sidebar')
            

            <div class="container-fluid">
                <div class="container">
                    <!-- header-->    
                    <section class="row content-header">
                        <!--left side-->
                        <div class="header-title col-md-11">
                            <p class="h4 pt-2"><i class="fa fa-@yield('icon')"></i>&emsp;@yield('titre')</p>
                            &emsp;&emsp;&emsp;<small class="font-weight-bold h6">@yield('sous-titre')</small>
                        </div>

                        <!--bouton gear-->
                        @guest
                        <div id="app">
                            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                                <div class="container">
                                    <!--<a class="navbar-brand" href="{{ url('/') }}">  lien vers index que j'ai creer dans dossier pages
                                        { { config('app.name', 'Laravel') }}
                                    </a> fin lien-->
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                    
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <!-- Left Side Of Navbar -->
                                        <ul class="navbar-nav me-auto">
                    
                                        </ul>
                    
                                        <!-- Right Side Of Navbar -->
                                        <ul class="navbar-nav ms-auto">
                            
                            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </ul>

                        </div>
                        @endguest
                    </section>
                    <hr style="border-top: 2px solid #C0C0C0;">

                    <!-- fin header -->

                    <!--body-->
                    @include('include/messages')
                    @yield('content')

                    <br/>
                    
                </div>
            </div>
        </div>
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
