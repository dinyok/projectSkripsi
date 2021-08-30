@extends('layout/main')
@section('title', 'Blog')
@section('container')

<section class="blog section-padding">
          <div class="container">
               <div class="row">
                    <div class="col-lg-12 col-12 py-1 mt-1 mb-1">
                      <h3 class="mb-4" data-aos="fade-up">Nama      : {{ $file->name }}</h3>
                      <br>
                      <h3 class="mb-4" data-aos="fade-up">Nim       : {{ $file->nim }}</h3>
                      <br>
                      <h3 class="mb-4" data-aos="fade-up">Jurusan   : {{ $file->jurusan }}</h3>
                    </div>
                    <!-- <div class="col-lg-12 col-12 py-5 mt-5 mb-3 text-center">

                      <h1 class="mb-4" data-aos="fade-up">Digital Trend Blog</h1>
                    </div> -->

                    <div class="col-lg-12 col-12 py-5 mt-5 mb-3 text-center">

                      <table class="table" data-aos="fade-up">
                        <thead class="bg-info">
                          <tr>
                            <th scope="col" class="text-white">No.</th>
                            <th scope="col" hidden>user_id</th>
                            <th scope="col" class="text-white">Code</th>
                            <th scope="col" class="text-white">Courses</th>
                            <th scope="col" class="text-white">Scu</th>
                            <th scope="col" class="text-white">Grade</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if($documents != null)
                        @foreach ($documents as $doc)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td hidden>{{ $doc->user_id }}</td>
                            <td>{{ $doc->code }}</td>
                            <td>{{ $doc->courses }}</td>
                            <td>{{ $doc->scu }}</td>
                            <td>{{ $doc->grade }}</td>
                          </tr>
                        @endforeach
                        @else
                        <tr>
                            <th scope="row"></th>
                            <td hidden></td>
                            <td>No Data</td>
                            <td>
                              
                            </td>
                          </tr>
                        @endif
                        </tbody>
                      </table>
                    </div>

                    <!-- <div class="col-lg-7 col-md-7 col-12 mb-4">
                      <div class="blog-header" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/blog/blog-header-image.jpg" class="img-fluid" alt="blog header">

                        <div class="blog-header-info">
                          <h4 class="blog-category text-info">Creative</h4>

                          <h3><a href="/blog-detail">The Key to Creative Work is Knowing When to Walk Away</a></h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-12 mb-4">
                      <div class="blog-sidebar d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <img src="images/blog/blog-sidebar-image.jpg" class="img-fluid" alt="blog">

                        <div class="blog-info">
                          <h4 class="blog-category text-danger">Design</h4>

                          <h3><a href="/blog-detail">Why Truly Accessible Design Benefits Everyone</a></h3>
                        </div>
                      </div>

                      <div class="blog-sidebar py-4 d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <img src="images/blog/blog-sidebar-image01.jpg" class="img-fluid" alt="blog">

                        <div class="blog-info">
                          <h4 class="blog-category text-success">lifestyle</h4>

                          <h3><a href="/blog-detail">Be Humble About What You Know</a></h3>
                        </div>
                      </div>

                      <div class="blog-sidebar d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <img src="images/blog/blog-sidebar-image02.jpg" class="img-fluid" alt="blog">

                        <div class="blog-info">
                          <h4 class="blog-category text-primary">Coding</h4>

                          <h3><a href="/blog-detail">The Mistakes I Made As a Coding Beginner</a></h3>
                        </div>
                      </div>

                    </div>

                    <div class="col-lg-5 ml-auto mt-5 pt-5 col-md-6 col-12">

                      <img src="images/newsletter.png" data-aos="fade-up" data-aos-delay="100" class="img-fluid" alt="newsletter">
                    </div>

                    <div class="col-lg-5 mr-auto mt-5 pt-5 col-md-6 col-12 newsletter-form">
                      <h4 data-aos="fade-up" data-aos-delay="200">Email Newsletter</h4>

                      <h2 data-aos="fade-up" data-aos-delay="300">Let’s stay up-to-date. We'll share you all good stuffs.</h2>
                      <form action="#" method="get" enctype="multipart/form-data">
                      <div class="form-group mt-4" data-aos="fade-up" data-aos-delay="400">
                        <input name="email" type="email" class="form-control" 
                        		id="email" aria-describedby="emailHelp" placeholder="Please enter your email" required>

                        <small id="emailHelp" class="form-text text-muted">We'll NOT share your email address to anyone else.</small>

                      </div>

                      <div class="form-group form-check" data-aos="fade-up" data-aos-delay="500">
                        <input name="monthly" type="checkbox" class="form-check-input" id="monthly">

                        <label class="form-check-label" for="monthly">Please send me a monthly newsletter.</label>
                      </div>

                        <button type="submit" data-aos="fade-up" data-aos-delay="500" class="btn w-100 mt-3">Sign up</button>
                      </form>
                    </div> -->

               </div>
          </div>
     </section>

@endsection