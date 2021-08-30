@extends('layout/main')
@section('title', 'Home')
@section('container')

     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center">
               <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                              <div class="hero-text">

                              <h2 class="text-white" data-aos="fade-up">Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h2>

                              @if(count($errors) > 0)
                              <div class="alert alert-danger">
                                   @foreach ($errors->all() as $error)
                                   {{ $error }} <br/>
                                   @endforeach
                              </div>
                              @endif

                                   <h1 class="text-white" data-aos="fade-up">Input your document here!</h1>
                                   <form action="/upload" method="POST" enctype="multipart/form-data">
					          {{ csrf_field() }}
                                        <div class="custom-file">
                                             <input type="file" class="custom-file-input" id="customFile" name="customFile" accept="image/*">
                                             <label class="custom-file-label" for="customFile" data-aos="fade-up">Choose file(.png)</label>
                                        </div>

                                        <input type="submit" value="Upload" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">
                                   </form>
                              </div>
                        </div>

                        <div class="col-lg-6 col-12">
                          <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                            <img src="images/working-girl.png" class="img-fluid" alt="working girl">
                          </div>
                        </div>

                    </div>
               </div>
     </section>


     <!-- ABOUT -->
     <section class="about section-padding pb-0" id="about">
          <div class="container">
               <div class="row">

                    <div class="col-lg-7 mx-auto col-md-10 col-12">
                         <div class="about-info">

                              <h2 class="mb-4" data-aos="fade-up">About <strong>DoctorScanner</strong></h2>

                              <p class="mb-0" data-aos="fade-up">DoctorScanner adalah sebuah platform yang berbasis website yang bertujuan untuk mempermudah proses pengelolaan data dari transkrip nilai.
                              <br><br>Kamu dapat menggunakan website ini untuk membuat data transkrip nilai secara digital.</p>
                         </div>

                         <div class="about-image" data-aos="fade-up" data-aos-delay="200">

                          <img src="images/office.png" class="img-fluid" alt="office">
                        </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- PROJECT
     <section class="project section-padding" id="project">
          <div class="container-fluid">
               <div class="row">

                    <div class="col-lg-12 col-12">

                        <h2 class="mb-5 text-center" data-aos="fade-up">
                            Please take a look through our
                            <strong>featured Digital Trends</strong>
                        </h2>

                         <div class="owl-carousel owl-theme" id="project-slide">
                              <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                                   <img src="images/project/project-image01.jpg" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>Marketing</small>

                                        <h3>
                                             <a href="/project-detail">
                                                  <span>Sweet Go Agency</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="images/project/project-image02.jpg" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>Website</small>

                                        <h3>
                                             <a href="/project-detail">
                                                  <span>Smart Ladies</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="images/project/project-image03.jpg" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>Branding</small>

                                        <h3>
                                             <a href="/project-detail">
                                                  <span>Shoes factory</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="images/project/project-image04.jpg" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>Social Media</small>

                                        <h3>
                                             <a href="/project-detail">
                                                  <span>Race Bicycle</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="images/project/project-image05.jpg" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>Video</small>

                                        <h3>
                                             <a href="/project-detail">
                                                  <span>Ultimate HealthCare</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section> -->


     <!-- TESTIMONIAL
     <section class="testimonial section-padding">
          <div class="container">
               <div class="row">

                    <div class="col-lg-6 col-md-5 col-12">
                        <div class="contact-image" data-aos="fade-up">

                          <img src="images/female-avatar.png" class="img-fluid" alt="website">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-7 col-12">
                      <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">Client Testimonials</h4>

                      <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                      <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo.</h2>

                      <p data-aos="fade-up" data-aos-delay="400">
                        <strong>Mary Zoe</strong>

                        <span class="mx-1">/</span>

                        <small>Digital Agency (CEO)</small>
                      </p>
                    </div>

               </div>
          </div>
     </section> -->

@endsection
