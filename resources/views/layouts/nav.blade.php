<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
           @foreach ($categories as $category)
            <li class="{{ (Request::segment(1)== str_slug($category->name,'-'))?'active':'' }}"><a  href="{{ url('/',str_slug($category->name,'-')) }}">{{ $category->name }}</a></li>         
         @endforeach
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if(Auth::guest())
                <li><a href="{{url('login')}}">Login</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('article/create')}}">Create Article</a></li>
                        <li><a href="{{url('category')}}">Catagories</a></li>
                        <li><a href="{{url('logout')}}">Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>