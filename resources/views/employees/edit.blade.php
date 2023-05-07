@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="login-container">

                <h1>Edit Employee</h1>
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>&nbsp;
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" class="@error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" value="{{ $employee->first_name }}" autocomplete="first_name" autofocus>
                        
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" class="@error('last_name') is-invalid @enderror" placeholder="last Name" name="last_name" value="{{ $employee->last_name }}" autocomplete="last_name" autofocus>
                        
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="@error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $employee->email }}" autocomplete="email" autofocus>
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No.</label>
                        <input id="phone" type="text" class="@error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ $employee->phone }}" autocomplete="phone" autofocus>
                        
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <select id="company" name="company_id" class="@error('company_id') is-invalid @enderror">
                            <option value="">Select Company</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
