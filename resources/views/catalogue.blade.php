@extends('layout.app')

@section('content') 
<script src="js/catalogue.js"></script>
<nav class="nav-bar">
    <div class="container">
        <h2 class="logo">{{__('titles.select.catalogue')}}</h2>
        <div class="search-bar">
            <i class="uil uil-search"></i>
            <input type="search" placeholder="Search any posts here">
        </div>
        <div class="create">
            <label class="btn btn-color"for="create-post">{{__('titles.create.ressource')}}</label>
            <div class="profile-photo">
                <img src="image/me.jpg">
            </div>
        </div>
    </div>
</nav>

<!----------------------------------------- Main ---------------------------------->
<main>
    <div class="container">
        <!------------------------ Left ----------------------------->
        <div class="left">
            <a href="" class="profile">
                <div class="profile-photo">
                    <img src="image/me.jpg">
                </div>
                <div class="handle">
                    <h4>Jack</h4>
                    <p class="text-muted">
                        @thisme
                    </p>
                </div>
            </a>
            <!--------------------Side bar --------------------------->
            <div class="sidebar">
                <a class="menu-item active">
                    <span><i class="uil uil-home"></i></span>
                    <h3>{{__('titles.sidebar.home')}}</h3>
                </a>
                <a class="menu-item" id="notification">
                    <span><i class="uil uil-bell"><small class="notification-count">+9</small></i></span><h3>{{__('titles.sidebar.notifications')}}</h3>
                    <!---------------------------Notification popup ------------------------>
                    <div class="notification-popup">
                        <div>
                            <div class="profile-photo">
                                <img src="image/me.jpg">
                            </div>
                            <div class="notification-body">
                                <b>Pierre</b>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                        <div>
                            <div class="profile-photo">
                                <img src="image/me.jpg">
                            </div>
                            <div class="notification-body">
                                <b>Henry</b>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </a>
                <!-----------------------------------End of the Notification Popup ------------------->
                <a class="menu-item" id="notification-message">
                    <span><i class="uil uil-envelope-check"><small class="notification-count">3</small></i></span><h3>Messages</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-palette"></i></span>
                    <h3>{{__('titles.sidebar.themes')}}</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-setting"></i></span>
                    <h3>{{__('titles.sidebar.settings')}}</h3>
                </a>
            </div>
            <!----------------------End of the Side bar ------------------->
            <label for="create-post" class="btn btn-color">{{__('titles.create.ressource')}}</label>
        </div>

        <!------------------------------- Middle ---------------------------------->
        <div class="middle">
            <!----------------------- Feeds of Post ---------------->
            <div class="feeds">
                @foreach ($ressources as $ressource)
                <!------------------------------Begin Post --------------------------->
                <div class="feed">
                    <div class="head">
                         <div class="user">
                             <div class="profile-photo">
                                 <img src="image/me.jpg">
                             </div>
                             <div class="ingo">
                                 <h3>{{$ressource->user_id}}</h3>
                                 <small>
                                    {{ \Carbon\Carbon::parse($ressource->created_at)->format('d/m/Y') }}
                                    {{ __('titles.at') }}
                                    {{ \Carbon\Carbon::parse($ressource->created_at)->format('H:i') }}
                                 </small>
                                 <div class="style-catalogue" onclick="location.href='{{ route('ressources.show', ['id' => $ressource->id]) }}'">
                                    <h2>{{ __('titles.type.' . $ressource->ressourceable_type) }}</h2>
                                    {{--<h3>{{ __('titles.category.' . $ressource->ressourceable_type) }}</h3>--}}
                                    <h1>{{ $ressource->title }}</h1>
                               </div>
                           </div>
                        </div>
                         <span class="edit">
                            <i class="uil uil-ellipsis-h"></i>
                        </span>
                    </div>
                    <div class="action-buttons">
                        <div class="interaction-buttons">
                            <span><i class="uil uil-heart"></i></span>
                            <span><i class="uil uil-comment-dots"></i></span>
                            <span><i class="uil uil-share-alt"></i></span>
                        </div>
                        <div class="bookmark">
                            <span><i class="uil uil-bookmark"></i></span>
                            <span><i class="uil uil-favorite"></i></span>
                        </div>
                    </div>

                    <div class="comment text-muted">
                        View all 100 comments
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="right">
            <div class="messages">
                <div class="heading">
                    <h4>{{__('titles.messages.title')}}</h4><i class="uil uil-edit"></i>
                </div>
                <!--------------- Search Bar ---------------->
                <div class="search-bar">
                    <i class="uil uil-search"></i>
                    <input type="search" placeholder="{{__('titles.messages.search')}}" id="message-search">
                </div>
                <!---------------Messages Category ----------->
                <div class="category">
                    <h6 class="active">{{__('titles.messages.primary')}}</h6>
                    <h6>{{__('titles.messages.general')}}</h6>
                    <h6 class="message-requests">{{__('titles.messages.request')}}</h6>
                </div>
                <!------------------ Message ------------------>
                <div class="message">
                    <div class="profile-photo">
                        <img src="image/me.jpg">
                    </div>
                    <div class="message-body">
                        <h5>{{$ressource->user_id}}</h5>
                        <p class="text-muted">Wake up bro</p>
                    </div>
                </div>
                <div class="message">
                    <div class="profile-photo">
                        <img src="image/me.jpg">
                    </div>
                    <div class="message-body">
                        <h5>{{$ressource->user_id}}</h5>
                        <p class="text-muted">Yo j'aime bien les pattes</p>
                    </div>
                </div>    
                <!------------------  End of message ----------------> 
            </div>
        </div>
        <!--------------------------- End of the Right ------------------->
        <div class="customize-theme">
            <div class="card">
                <h2>{{__('titles.notification.messages')}}</h2>
                <!---------------------- Primary Colors ------------->
                <div class="color">
                    <h4>{{ __('titles.notification.color') }}</h4>
                    <div class="choose-color">
                        <span class="color-1 active"></span>
                        <span class="color-2"></span>
                        <span class="color-3"></span>
                        <span class="color-4"></span>
                        <span class="color-5"></span>
                    </div>
                </div>
                <!----------------------- Background Theme ------------>
                <div class="background">
                    <h4>{{ __('titles.notification.background') }}</h4>
                    <div class="choose-bg">
                        <div class="bg-1 active">
                            <span></span>
                            <h5 for="bg-1">{{ __('titles.notification.light') }}</h5>
                        </div>
                        <div class="bg-2">
                            <span></span>
                            <h5>{{ __('titles.notification.dim') }}</h5>
                        </div>
                        <div class="bg-3">
                            <span></span>
                            <h5 for="bg-3">{{ __('titles.notification.dark') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{--
<div class="style-catalogue" onclick="location.href='{{ route('ressources.show', ['id' => $ressource->id]) }}'">
    <h2>{{ get_ressource_type($ressource->ressourceable_type) }}</h2>
    <h3>{{ $ressource->relation }}</h3>
    <h1>{{ $ressource->title }}</h1>
</div> --}}

@endsection