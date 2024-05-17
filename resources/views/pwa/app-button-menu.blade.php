  <!-- App Bottom Menu -->
  <div class="appBottomMenu">
      @guest
          <a href="{{ route('home') }}" class="item ">
              <div class="col">
                  <ion-icon name="home-outline">
                      <i class="fas fa-home " aria-hidden="true"></i>
                  </ion-icon>
              </div>
          </a>
        
      @endguest
      @auth
          @if (request()->segment(1) == '' || request()->segment(1) == '/')
              <a href="{{ route('home') }}" class="item active">
                  <div class="col">
                      <ion-icon name="home-outline">
                          <i class="fas fa-home " aria-hidden="true"></i>
                      </ion-icon>
                  </div>
              </a>
          @else
              <a href="{{ route('home') }}" class="item">
                  <div class="col">
                      <ion-icon name="home-outline">
                          <i class="fas fa-home " aria-hidden="true"></i>
                      </ion-icon>
                  </div>
              </a>
          @endif

          <a href="" class="item ">
            <div class="col">
                <ion-icon name="layers-outline">
                    <i class="fas fa-camera" aria-hidden="true"></i>
                </ion-icon>
            </div>
        </a>

          <a href="#sidebarPanel" class="item" data-bs-toggle="offcanvas">
              <div class="col">
                  <ion-icon name="menu-outline">
                      <i class="fas fa-user " aria-hidden="true"></i>
                  </ion-icon>
              </div>
          </a>
      @endauth
  </div>
  <!-- * App Bottom Menu -->
