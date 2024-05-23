<!-- sidebar buttons -->
<div class="sidebar-buttons">
    @auth
        <a href="{{ route('user.logout') }}" class="button">
            <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
        </a>
    @endauth
</div>
