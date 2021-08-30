@extends('layout/main')
@section('title', 'Blog')
@section('container')

<section class="blog section-padding">
          <div class="container">
               <div class="row">

                    <!-- <div class="col-lg-12 col-12 py-5 mt-5 mb-3 text-center">

                      <h1 class="mb-4" data-aos="fade-up">Digital Trend Blog</h1>
                    </div> -->
                    <div class="col-lg-12 col-12">
                      @if(session('errors'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Something it's wrong:
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                              <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                              </ul>
                          </div>
                      @endif
                      @if (Session::has('success'))
                          <div class="alert alert-success">
                              {{ Session::get('success') }}
                          </div>
                      @endif
                      @if (Session::has('error'))
                          <div class="alert alert-danger">
                              {{ Session::get('error') }}
                          </div>
                      @endif
                    </div>
                    <div class="col-lg-12 col-12 py-5 mb-3 text-center">

                      <table class="table" data-aos="fade-up">
                        <thead class="bg-info">
                          <tr>
                            <th scope="col" class="text-white">No.</th>
                            <th scope="col" hidden>user_id</th>
                            <th scope="col" class="text-white">Name</th>
                            <th scope="col" class="text-white">filename</th>
                            <th scope="col" class="text-white">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if($documents != null)
                        @foreach ($documents as $doc)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td hidden>{{ $doc->user_id }}</td>
                            <td>{{ $doc->name }}</td>
                            <td>{{ $doc->filename }} @if ($doc->deleted_at != null)
                              <strong>(Deleted)</strong>
                            @endif</td>
                            <td>
                            @role('admin')
                              <a href="/blog/restore/{{ $doc->document_id }}" class="btn btn-success" onclick="return confirm('Apakah anda ingin mengembalikan file?')">Restore</a>
                              <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#restoreModal">Restore</button> -->
                            @endrole
                              <a href="/blog/view/{{ $doc->document_id }}" class="btn btn-success">View</a>
                              <a href="/blog/delete/{{ $doc->document_id }}" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus file?')">Delete</a>
                              <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button> -->
                              <a href="/blog/download/{{ $doc->document_id }}" class="btn btn-primary">Download</a>
                            </td>
                          </tr>

                          
                          <!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah anda ingin menghapus file?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/blog/delete/{{ $doc->document_id }}" class="btn btn-primary">Delete</a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Restore</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah anda ingin mengembalikan file?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/blog/restore/{{ $doc->document_id }}" class="btn btn-primary">Restore</a>
                                </div>
                              </div>
                            </div>
                          </div> -->
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