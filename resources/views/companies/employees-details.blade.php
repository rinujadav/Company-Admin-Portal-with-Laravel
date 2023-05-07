@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card style">
                <div class="card-header">
                    <h1>Employees Details</h1>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>&nbsp;
                    </div>
                </div>
                @if($employees->isEmpty())
                <div class="card">
                    <div class="card-body">
                        No Employees Found
                    </div>
                  </div>
                @else
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Details</th>
                        </tr>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>
                                <p>First Name: {{ $employee->first_name }}</p>
                                <p>Last Name: {{ $employee->last_name }}</p>
                                <p>Email: {{ $employee->email }}</p>
                                <p>Phone: {{ $employee->phone }}</p>
                                <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}"> Edit</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </table>
                    {!! $employees->links('pagination::bootstrap-4') !!}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

