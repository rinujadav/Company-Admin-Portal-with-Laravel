@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="login-container">

                <h1>Create Company</h1>
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>&nbsp;
                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="@error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="@error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">logo</label>
                        <input type="file" name="logo" class="@error('logo') is-invalid @enderror">
                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input id="website" type="text" class="@error('website') is-invalid @enderror" placeholder="Website" name="website" value="{{ old('website') }}" autocomplete="website" autofocus>
                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
