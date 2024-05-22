<!-- sidebar buttons -->
<div class="sidebar-buttons">
    @guest
        <a href="" class="button">
            <ion-icon name="person-outline">
                <i class="fa fa-user" aria-hidden="true"></i>
            </ion-icon>
        </a>
        <a aria-disabled="true" class="button">
            <ion-icon name="settings-outline">
                <i class="fa fa-cog" aria-hidden="true"></i>
            </ion-icon>
        </a>
        <a aria-disabled="true" class="button">
            <ion-icon name="log-out-outline">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </ion-icon>
        </a>
    @endguest
    @auth
        <a href="" class="button">
            <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
        </a>
    @endauth
</div>
