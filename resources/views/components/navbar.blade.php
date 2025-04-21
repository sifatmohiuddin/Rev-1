<nav>
    <div class="nav__header">
      <div class="nav__logo">
        <a href="#">
          <img src="{{ asset('assets/logo.png') }}" alt="logo" />
        </a>
      </div>
      <div class="nav__menu__btn" id="menu-btn">
        <i class="ri-menu-line"></i>
      </div>
    </div>
    <ul class="nav__links" id="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About Us</a></li>
      <li><a href="#plans">Plans</a></li>
      <li><a href="#program">Programs</a></li>
      <li><a href="#testimonial">Testimonials</a></li>
      <li>
        <a href="{{ route('signup') }}" class="btn">Sign Up</a>
      </li>
    </ul>
  </nav>



