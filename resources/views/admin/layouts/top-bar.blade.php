    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
              
                <a class="navbar-brand" href="{{ route('admin.home', $user->username) }}">
                    <span class="logo-name">{{ request()->getHost() }}</span>
                </a>
            </div>

        </div>
    </nav>
    <!-- #Top Bar -->
