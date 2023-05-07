@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card style">
                <div class="card-header">
                    <h1>{{ $company->name }}</h1>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>&nbsp;
                        <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}"> Edit</a>
                    </div>
                </div>

                <div class="card-body">
                    <table>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td><img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} logo"
                                    width="100" height="100"></td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{ $company->website }}</td>
                        </tr>
                        <tr>
                            <td>Employees List</td>
                            <td>
                                {{ $company->employees->isNotEmpty() ? $company->employees->pluck('name')->implode(', ') : 'No Employees Yet' }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
