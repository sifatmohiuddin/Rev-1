<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Web Design Mastery | REV-1</title>
  </head>
  <body>
    <header>
      <x-navbar />
      <div class="section__container header__container" id="home">
        <div class="header__image">
          <img src="assets/header.png" alt="header" />
        </div>
        <div class="header__content">
          <h1>GET HEALTHY BODY WITH THE PERFECT EXERCISES</h1>
          <p class="section__description">
            Achieve your dream body with expertly designed exercises tailored
            for strength, endurance, and overall well-being. Whether you're a
            beginner or a fitness enthusiast, our workouts are crafted to help
            you stay active, build muscle, and improve flexibility.
          </p>
          <div class="header__btn">
            <button class="btn">Get Started</button>

          </div>
          <div class="header__stats">
            <div>
              <h4>5+</h4>
              <p>Expert Trainers</p>
            </div>
            <div>
              <h4>70+</h4>
              <p>Member Joined</p>
            </div>
            <div>
              <h4>13+</h4>
              <p>Fitness Programs</p>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="about" id="about">
      <div class="section__container about__container">
        <div class="about__image">
          <img src="assets/about.jpg" alt="about" />
        </div>
        <div class="about__content">
          <h2 class="section__header">Get Ready To Reach Your Fitness Goals</h2>
          <p class="section__description">
            At REV-1, we are committed to helping you achieve your fitness
            goals with expert guidance, personalized workouts, and a motivating
            environment. Whether you aim to build strength, improve endurance,
            or stay active, we provide the right support and training to keep
            you on track.
          </p>
          <p class="section__description">
            Start your journey today and transform your health with the perfect
            exercise routine!
          </p>
          <div class="about__btn">
            <button class="btn">Free Trail Today</button>
          </div>
        </div>
      </div>
    </section>

    <section class="program" id="program">
      <div class="section__container program__container">
        <div class="program__header">
          <h2 class="section__header">The Best Programs We Offer For You</h2>
          <p class="section__description">
            From strength training and yoga to cardio and weight loss programs,
            we offer a variety of workouts to keep you motivated and on track.
            Join us and find the perfect program for you.
          </p>
        </div>
        <div class="program__grid">
          <div class="program__card">
            <img src="assets/program-1.png" alt="program" />
            <h4>Strength Training</h4>
            <p>
              Build muscle, increase endurance, and enhance overall strength
              with our expert-led resistance and weight training sessions.
            </p>
            <a href="#">
              Learn More
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
          <div class="program__card">
            <img src="assets/program-2.png" alt="program" />
            <h4>Basic Yoga</h4>
            <p>
              Improve flexibility, balance, and mental well-being with guided
              yoga sessions designed for relaxation and inner peace.
            </p>
            <a href="#">
              Learn More
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
          <div class="program__card">
            <img src="assets/program-3.png" alt="program" />
            <h4>Body Building</h4>
            <p>
              Sculpt and define your physique with targeted workouts, expert
              coaching, and personalized training plans.
            </p>
            <a href="#">
              Learn More
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
          <div class="program__card">
            <img src="assets/program-4.png" alt="program" />
            <h4>Weight Loss</h4>
            <p>
              Burn calories, boost metabolism, and achieve your ideal weight
              with our effective fat-burning and cardio-based programs.
            </p>
            <a href="#">
              Learn More
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="program" id="program">
        <div class="section__container program__container">
          <div class="program__header">
            <h2 class="section__header">Our Fitness Plan</h2>
            <p class="section__description">
                From our 1-month plan for quick results to our comprehensive 3-month and 1-year programs,
                we offer flexible options tailored to your goals.
                Whether you're just starting or aiming for long-term transformation,
                we have the right plan to help you stay motivated and achieve your fitness aspirations.
                Choose the plan that suits you best and start your fitness journey today!
            </p>
          </div>
          <div class="program__grid">
            <x-price-card monthText="1 Month"   price="1200 "


            green="text-green-500"
            green2="text-green-500"
            green3="text-green-500"
            green4="text-gray-500"

            />

            <x-price-card monthText="3 Months"  price="3500 "

            green="text-green-500"
            green2="text-green-500"
            green3="text-green-500"
            green4="text-gray-500"

            />


            <x-price-card monthText="1 Year"  price="10000 "


            green="text-green-500"
            green2="text-green-500"
            green3="text-green-500"
            green4="text-green-500"

            />

            <x-price-card monthText="Life Time"  price="50000 "

            green="text-green-500"
            green2="text-green-500"
            green3="text-green-500"
            green4="text-green-500"

            />


          </div>
        </div>
      </section>

    <section class="service">
      <div class="section__container service__container">
        <div class="service__content">
          <h2 class="section__header">
            Why Should People Choose Rev-1 Services
          </h2>
          <ul class="service__list">
            <li>
              <h4>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Personal Training
              </h4>
              <p class="section__description">
                Get customized workout plans tailored to your fitness goals with
                one-on-one guidance from our professional trainers.
              </p>
            </li>
            <li>
              <h4>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Expert Trainer
              </h4>
              <p class="section__description">
                Train with highly qualified and experienced fitness experts who
                will motivate and support you every step of the way.
              </p>
            </li>
            <li>
              <h4>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Flexible Timing
              </h4>
              <p class="section__description">
                Enjoy the convenience of workout sessions that fit your
                schedule, making it easier to stay committed to your fitness
                journey.
              </p>
            </li>
          </ul>
          <div class="service__btn">
            <button class="btn">Join Today</button>
          </div>
        </div>
        <div class="service__image">
          <img src="assets/service.png" alt="service" />
        </div>
      </div>
    </section>

    <section class="testimonial" id="testimonial">
      <div class="section__container testimonial__container">
        <div class="testimonial__content">
          <h2 class="section__header">What Our Happy Clients Say About Us</h2>
          <p class="section__description">
            Hear from our satisfied members who have transformed their fitness
            journey with FITNESXIA! Their success stories and experiences
            showcase the effectiveness of our programs, expert guidance, and
            supportive environment.
          </p>
        </div>
        <div class="testimonial__swiper">
          <!-- Slider main container -->
          <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="swiper-slide">
                <div class="testimonial__card">
                  <div class="user__details">
                    <img src="assets/user-1.jpg" alt="user" />
                    <div>
                      <h4>Rayan</h4>
                      <h5>Software Engineer</h5>
                    </div>
                  </div>
                  <div class="user__ratings">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                  </div>
                  <p class="section__description">
                    Rev-1 has completely changed my approach to fitness. The
                    personal training sessions are amazing, and I've seen
                    incredible progress in my strength and endurance!
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonial__card">
                  <div class="user__details">
                    <img src="assets/user-2.jpg" alt="user" />
                    <div>
                      <h4>Sifat Mohiuddin</h4>
                      <h5>Yoga Instructor</h5>
                    </div>
                  </div>
                  <div class="user__ratings">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                  </div>
                  <p class="section__description">
                    The Basic Yoga program at Rev-1 is exactly what I
                    needed! The trainers are knowledgeable, and the sessions
                    have greatly improved my flexibility and mental well-being.
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonial__card">
                  <div class="user__details">
                    <img src="assets/user-3.jpg" alt="user" />
                    <div>
                      <h4>Ruptonu</h4>
                      <h5>Business Analyst</h5>
                    </div>
                  </div>
                  <div class="user__ratings">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                  </div>
                  <p class="section__description">
                    I joined Rev-1 for bodybuilding, and I couldn't be
                    happier with the results. The expert trainers provide the
                    best guidance, and the workout environment is super
                    motivating!
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <x-footer />

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </body>
</html>
