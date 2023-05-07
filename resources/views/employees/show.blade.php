@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card style">
                <div class="card-header"><h1>{{ $employee->first_name }} {{ $employee->last_name }}</h1>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>&nbsp;
                        <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}"> Edit</a>
                    </div>
                </div>

                <div class="card-body">
                    <table>
                        <tr>
                          <th>Field</th>
                          <th>Value</th>
                        </tr>
                        <tr>
                          <td>First Name</td>
                          <td>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                          <td>Last Name</td>
                          <td>{{ $employee->last_name }}</td>
                        </tr>
                        <tr>
                          <td>Company</td>
                          <td>{{ $employee->company->name }}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                          <td>{{ $employee->phone }}</td>
                        </tr>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection

