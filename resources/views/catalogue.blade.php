@extends('layout.app')

@section('content') 
{{--<script src="index.js"></script>--}}
<nav class="nav-bar">
    <div class="container">
        <h2 class="logo">Catalogue</h2>
        <div class="search-bar">
            <i class="uil uil-search"></i>
            <input type="search" placeholder="Search any posts here">
        </div>
        <div class="create">
            <label class="btn btn-color"for="create-post">Create</label>
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
                    <h4>Jukebox</h4>
                    <p class="text-muted">
                        @thisme
                    </p>
                </div>
            </a>
            <!--------------------Side bar --------------------------->
            <div class="sidebar">
                <a class="menu-item active">
                    <span><i class="uil uil-home"></i></span>
                    <h3>Home</h3>
                </a>
                <a class="menu-item" id="notification">
                    <span><i class="uil uil-bell"><small class="notification-count">+9</small></i></span><h3>Notifications</h3>
                    <!---------------------------Notification popup ------------------------>
                    <div class="notification-popup">
                        <div>
                            <div class="profile-photo">
                                <img src="image/me.jpg">
                            </div>
                            <div class="notification-body">
                                <b>Francis George</b>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                        <div>
                            <div class="profile-photo">
                                <img src="image/me.jpg">
                            </div>
                            <div class="notification-body">
                                <b>Jean Pierre</b>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </a>
                <!-----------------------------------End of the Notification Poppup ------------------->
                <a class="menu-item" id="notification-message">
                    <span><i class="uil uil-envelope-check"><small class="notification-count">3</small></i></span><h3>Messages</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-palette"></i></span>
                    <h3>Theme</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-setting"></i></span>
                    <h3>Settings</h3>
                </a>
            </div>
            <!----------------------End of the Side bar ------------------->
            <label for="create-post" class="btn btn-color">Create Post</label>
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
                                 <h3>Tristan Sanchez</h3>
                                 <small>19/01/2022 at 17:48</small>
                                 <div class="style-catalogue" onclick="location.href='{{ route('ressources.show', ['id' => $ressource->id]) }}'">
                                    <h2>{{ get_ressource_type($ressource->ressourceable_type) }}</h2>
                                    <h3>{{ $ressource->relation }}</h3>
                                    <h1>{{ $ressource->title }}</h1>
                                </div>
                             </div>
                         </div>
                         <span class="edit">
                            <i class="uil uil-ellipsis-h"></i>
                        </span>
                    </div>

                    <div class="photo">
                         <img src="image/feeds.jpg">
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

                    <div class="liked-by">
                        <span><img src="image/me.jpg"></span>
                        <p>Like by <b>Bastien Herry</b></p>
                    </div>
                    <div class="caption">
                        <p>
                        Yes it's cool, yeah yeah baguette
                        </p>
                    </div>
                    <div class="comment text-muted">
                        View all 100 comments
                    </div>
                </div>
                <div class="feed">
                    <div class="head">
                        <div class="user">
                            <div class="profile-photo">
                                <img src="image/me.jpg">
                            </div>
                            <div class="ingo">
                                <h3>John Doe</h3>
                                <small>19/01/2056 15:25</small>
                            </div>
                        </div>
                        <span class="edit">
                            <i class="uil uil-ellipsis-h"></i>
                        </span>
                    </div>

                    <div class="photo">
                        <img src="image/feeds04.jpg">
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

                    <div class="liked-by">
                        <span><img src="image/me.jpg"></span>
                        <p>Like by <b>Bastien Herry</b></p>
                    </div>
                    <div class="caption">
                        <p>
                            Yes it's cool, yeah yeah baguette
                        </p>
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
                    <h4>Messages</h4><i class="uil uil-edit"></i>
                </div>
                <!--------------- Search Bar ---------------->
                <div class="search-bar">
                    <i class="uil uil-search"></i>
                    <input type="search" placeholder="Search a message" id="message-search">
                </div>
                <!---------------Messages Category ----------->
                <div class="category">
                    <h6 class="active">Primary</h6>
                    <h6>General</h6>
                    <h6 class="message-requests">Request(7)</h6>
                </div>
                <!------------------ Message ------------------>
                <div class="message">
                    <div class="profile-photo">
                        <img src="image/me.jpg">
                    </div>
                    <div class="message-body">
                        <h5>Name</h5>
                        <p class="text-muted">Wake up bro</p>
                    </div>
                </div>
                <div class="message">
                    <div class="profile-photo">
                        <img src="image/me.jpg">
                    </div>
                    <div class="message-body">
                        <h5>George Tomson</h5>
                        <p class="text-muted">Yo j'aime bien les pattes</p>
                    </div>
                </div>    
                <!------------------  End of message ----------------> 
            </div>
        </div>
        <!--------------------------- End of the Right ------------------->
        <div class="customize-theme">
            <div class="card">
                <h2>Changez de thème</h2>
                <p class="text-muted">
                    Vous pouvez modifier le thème de la page
                </p>
                <!---------------------- Primary Colors ------------->
                <div class="color">
                    <h4>Color</h4>
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
                    <h4>Background Theme</h4>
                    <div class="choose-bg">
                        <div class="bg-1 active">
                            <span></span>
                            <h5 for="bg-1">Light</h5>
                        </div>
                        <div class="bg-2">
                            <span></span>
                            <h5>Dim</h5>
                        </div>
                        <div class="bg-3">
                            <span></span>
                            <h5 for="bg-3">Dark</h5>
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