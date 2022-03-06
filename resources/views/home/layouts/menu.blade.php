{{-- <div class="card-header">
    <a href="{{ route('post.create') }}" class="p-2">Add Post</a>
    <a href="{{ route('post.index') }}" class="p-2">Posts</a>
</div> --}}

<div class="home-sidebar mb-col-2 p-3 bg-white" style="width: 280px;">
    <a href="{{ route('home') }}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-5 fw-semibold">Menu</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            {{-- <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                Posts
            </button> --}}
            <div class="ps-2">
                Posts
            </div>
            
            <div class="" id="home-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    <li><a href="{{ route('post.index') }}" class="link-dark rounded">View posts</a></li>
                    <li><a href="{{ route('post.create') }}" class="link-dark rounded">Create post</a></li>
                </ul>
            </div>
            
        </li>
        <li class="mb-1">
           
            {{-- <div class="collapse" id="dashboard-collapse"> --}}
            <div class="ps-2">
                Comments
            </div>
            <div>
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small  ps-4">
                    <li><a href="{{ route('comment.index') }}" class="link-dark rounded">View all comments</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <div class="ps-2">
                Category
            </div>
            <div>
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small  ps-4">
                    <li><a href="#" class="link-dark rounded">All category</a></li>
                    <li><a href="#" class="link-dark rounded">New</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li><a href="#" class="link-dark rounded">New...</a></li>
                        @endif
                    @endauth
                    <li><a href="#" class="link-dark rounded">Profil</a></li>
                    <li><a href="#" class="link-dark rounded">Setting</a></li>
                    <li>
                        <a class="link-dark rounded" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
