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
            <ion-icon name="log-out-outline">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </ion-icon>
        </a>
    @endauth
</div>
<!-- * sidebar buttons -->
<div class="section mt-3 mb-3">
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-end">
            <div>
                <h5 class="card-title mb-0 d-flex align-items-center justify-content-between">
                    نسخه تاریک
                </h5>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodecontent">
                <label class="form-check-label" for="darkmodecontent"></label>
            </div>

        </div>
    </div>
</div>
