@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{ __('Employees') }}</h1>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('employees.create') }}"> Create New Employee</a>
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Company</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>
                                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                   
                                    <a class="btn btn-secondary" href="{{ route('employees.show',$employee->id) }}">Show</a>&nbsp;
                    
                                    <a class="btn btn-secondary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {!! $employees->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

