      <!-- Left Sidebar -->
      @php
          $user = auth()->user();
      @endphp
      <aside id="leftsidebar" class="sidebar">
          <!-- Menu -->
          <div class="menu">
              <ul class="list">
                  <li>
                      <div class="clearfix sidebar-profile">
                          <div class="profile-img">
                              <img src="{{ asset($user->profile) }}" alt="profile">
                          </div>
                          <div class="profile-info">
                              <h3>{{ $user->username }}</h3>
                              <p>خوش آمدید !</p>
                          </div>
                      </div>
                  </li>
                  @if (request()->segment(1) == 'admin')
                      <li class="active">
                          <a href="{{ route('admin.home', $user->username) }}">صفحه پنل ادمین</a>
                      </li>
                  @else
                      <li class="active">
                          <a href="{{ route('admin.home', $user->username) }}">صفحه پنل ادمین</a>
                      </li>
                  @endif

                  @if ($user->user_type == 2)
                      <li>
                          <a href="#" onClick="return false;" class="menu-toggle">
                              <i class="menu-icon ti-shopping-cart-full"></i>
                              <span>محتوا سایت</span>
                          </a>
                          <ul class="ml-menu">
                              <li>
                                  <a href="{{ route('admin.faq.index',$user->username) }}">سوالات متداول</a>
                              </li>
                          </ul>
                      </li>
                  @endif

              </ul>
          </div>
          <!-- #Menu -->
      </aside>
      <!-- #END# Left Sidebar -->
