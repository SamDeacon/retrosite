<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Retrosite</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            .topnav {
                display: block;
                border: 1px solid black;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    @can('isSuperAdmin')
                    <a href="{{ url('/admin') }}">MANAGE</a> | 
                    @endcan
                        <a href="{{ url('/profile') }}">authenticated profile</a> | 
                        <a href="{{ url('/logout') }}">logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="content">
            <h1>Retroshrine</h1>
            <h3>AdminRetro</h3>
            <hr>
            <ul>
                @foreach ($categories as $category)
                    @if($category->parent_count == 0)
                        <li>
                            <h4>{{$category->title}}
                            <small>[ID = {{$category->id}} || #children {{ $category->children_count}}]</small></h4> 
                            @if($category->children_count > 0)
                                <ul>
                                    @foreach ($categories as $child_category)
                                        @if($child_category->parent_id == $category->id)
                                            <li>
                                                <h4>{{$child_category->title}}
                                                <small>ID = {{$child_category->id}} || Parent ID = {{$child_category->parent_id}}</small>
                                                </h4>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
            <hr>
            <div class="card-body p-0">
                <ul class="list-group bg-light-green">
                    @foreach ($manufacturers as $manufacturer)
                    <li class="list-group-item list-group-item-secondary" ><i class="nav-icon fa fa-adjust text-secondary mr-2"></i><a href="#"><h3>{{ $manufacturer->title }}</h3></a>
                    <p><strong>Slug: </strong>{{$manufacturer->slug}}</p>
                    <p><strong>Tagline: </strong>{{$manufacturer->tagline}}</p>
                    <p><strong>Description: </strong>{{$manufacturer->description}}</p>
                    <p></p>
                    </li>
                    @endforeach
                </ul>
            </div> 
        </div>
        <footer>
            @can('isSuperAdmin')
            PRIVATE: <a href="/admin">Manage</a>
            @endcan
        </footer>
    </body>
</html>
