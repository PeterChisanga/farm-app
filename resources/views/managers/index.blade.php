@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Managers') }}</div>

                    <div class="card-body">

                    <div class="table-responsive">
                        <a href="{{ route('managers.create') }}" class="btn btn-primary">Register Farm Manager</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($managers as $manager)
                                <tr>
                                    <td>{{ $manager->first_name }}</td>
                                    <td>{{ $manager->last_name }}</td>
                                    <td>{{ $manager->phone_number }}</td>
                                    <td>{{ $manager->email }}</td>
                                    <td>
                                        <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('managers.destroy', $manager->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
