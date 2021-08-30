@extends('layout/main')
@section('title', 'Profile')
@section('container')

<section class="hero hero-bg d-flex justify-content-center align-items-center">
          <div class="container">
               <div class="row">

                    <!-- <div class="col-lg-12 col-12 py-5 mt-5 mb-3 text-center">

                      <h1 class="mb-4" data-aos="fade-up">Digital Trend Blog</h1>
                    </div> -->

                    <div class="container rounded bg-info mt-5 mb-5" data-aos="fade-up">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img class="rounded-circle mt-5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU">
                                        <span class="font-weight-bold"><strong>{{ Auth::user()->name }}</strong></span>
                                        <span class="text-white">{{ Auth::user()->email }}</span>
                                        <span> </span>
                                </div>
                                <div class="mt-5 text-center">
                                    <a href="/changePassword" class="custom-btn btn-bg btn mt-3">Ganti Password</a>
                                    <br>
                                    <br>    
                                </div>
                                
                            </div>
                            <div class="col-md-8 border-right">
                                <div class="p-3 py-5">
                                    <form action="/profile" method="post">
                                        @csrf
                                        <div class="card-body">
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
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-white">Profile Settings</h4>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="form-group">
                                                    <div class="col-md-12"><label class="text-white">Name</label><input type="text" name="name" class="form-control" value={{ Auth::user()->name }}></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><label class="text-white">Email</label><input type="text" name="email" class="form-control" value="" placeholder={{ Auth::user()->email }} disabled></div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="form-group">
                                                    <div class="col-md-12"><label class="text-white">PhoneNumber</label><input type="text" name="phoneNumber" class="form-control" placeholder="enter phone number" value=""></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><label class="text-white">Address</label><input type="text" name="address" class="form-control" placeholder="enter address" value=""></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><label class="text-white">Education</label><input type="text" name="education" class="form-control" placeholder="education" value=""></div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="mt-5 text-center">
                                                    <button type="submit" class="custom-btn btn-bg btn mt-3">Save Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div>
     </section>

@endsection