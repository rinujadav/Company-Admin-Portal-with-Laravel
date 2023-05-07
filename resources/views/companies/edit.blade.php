@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="login-container">

                <h1>Edit Company</h1>
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>&nbsp;
                <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <input id="name" type="text" class="@error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ $company->name }}" autocomplete="name" autofocus>
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="@error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $company->email }}" autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">logo</label>
                        <img src="{{ asset('storage/' . $company->logo) }}" width="80">&nbsp;
                        <input id="file" type="file" class="@error('logo') is-invalid @enderror" name="logo" placeholder="logo">
                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input id="website" type="text" class="@error('website') is-invalid @enderror" placeholder="Website" name="website" value="{{ $company->website }}" autocomplete="website" autofocus>
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
