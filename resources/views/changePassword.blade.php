@extends('layout/main')
@section('title', 'Profile')
@section('container')

<section class="hero hero-bg d-flex justify-content-center align-items-center">
          <div class="container">
               <div class="row">
                    <div class="container rounded bg-info mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img class="rounded-circle mt-5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU">
                                    <span class="font-weight-bold"><strong>{{ Auth::user()->name }}</strong></span>
                                    <span class="text-white">{{ Auth::user()->email }}</span>
                                    <span> </span>
                                </div>
                                <div class="mt-5 text-center">
                                    <a href="/profile" class="custom-btn btn-bg btn mt-3">Profile</a>
                                    <br>
                                    <br>
                                </div>
                                
                            </div>
                            <div class="col-md-8 border-right">
                                <div class="p-3 py-5">
                                    <form action="/changePassword" method="post">
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
                                            <div class="form-group">
                                                <div class="col-md-12"><label class="text-white">Password Lama</label><input type="password" name="passwordLama" class="form-control" placeholder="Enter Old Password"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><label class="text-white">Password Baru</label><input type="password" name="password" class="form-control" placeholder="Enter New Password"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><label class="text-white">Konfirmasi Password Baru</label><input type="password" name="password_confirmation" class="form-control" placeholder="Enter New Password"></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="mt-5 text-center"><button type="submit" class="custom-btn btn-bg btn mt-3">Save</button></div>
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