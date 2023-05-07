@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{ __('Companies') }}</h1>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('companies.create') }}"> Create New Company</a>&nbsp;
                        <a class="btn btn-primary" href="{{ route('employees.create') }}"> Add Employee</a>&nbsp;
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Employees Details</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($companies as $company)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td><img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} logo" width="100" height="100"></td>
                            <td>{{ $company->website }}</td>
                            <td><a class="btn btn-secondary" href="{{ route('employees.details', $company->id) }}">Employee Details</a></td>
                            <td>
                                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                   
                                    <a class="btn btn-secondary" href="{{ route('companies.show',$company->id) }}">Show</a>&nbsp;
                    
                                    <a class="btn btn-secondary" href="{{ route('companies.edit',$company->id) }}">Edit</a>&nbsp;
                                    
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {!! $companies->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

