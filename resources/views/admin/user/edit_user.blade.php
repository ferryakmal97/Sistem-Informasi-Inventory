@extends('layouts.app')

@section('body-class','class=sidebar-mini')

@section('main')
    <div class="wrapper">
        {{-- topbar --}}
        @include('layouts.topbar')
        {{-- sidebar --}}
        @include('layouts.sidebar')

        {{-- content-wrapper --}}
        <div class="content-wrapper">
            {{-- main content --}}
            <div class="content">
                <div class="container-fluid">
                    <div class="row pt-3">
                        <div class="col-sm-6 m-auto">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h6 class="card-title">Input User</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('/user/edit_user/update') }}" method="POST" class="needs-validation" novalidate>
                                        @csrf

                                        @foreach($user as $row)
                                        <input type="text" value="{{$row->user_id}}" name="user_id" hidden>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$row->nama}}" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   @
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{$row->username}}"  required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$row->email}}"  required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" name="password" placeholder="password" minlength="8" required>
                                            <div class="invalid-feedback">
                                                Password Harus Berjumlah 8 Karakter!
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <label class="input-group-text" for="role">
                                                <i class="fas fa-key"></i>
                                              </label>
                                            </div>
                                            <select class="custom-select" id="role" name="role" required>
                                              @foreach ($role as $row)
                                                <option selected value="" >Pilih Role</option>
                                                <option value="{{$row->role_id}}">{{$row->role}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        @endforeach
                                        <div class="row justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <a href="{{ url('/user') }}" class="btn btn-warning d-block mr-2">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /main content --}}
        </div>
        {{-- /content wrapper --}}
    </div>
    {{-- /wrapper --}}
@endsection

@section('js')

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: "{{ session('error') }}",
        });
    </script>
    @endif

   <script>
       (function() {
        'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
   </script>
@endsection