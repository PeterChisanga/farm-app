@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Workers List') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{route('workers.create')}}" class="btn btn-primary">Register Worker</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workers as $worker)
                                <tr>
                                    <th scope="row">{{ $worker->id }}</th>
                                    <td>{{ $worker->first_name }}</td>
                                    <td>{{ $worker->last_name }}</td>
                                    <td>{{ $worker->phone_number }}</td>
                                    <td>{{ $worker->start_date }}</td>
                                    <td>K {{ $worker->salary }}</td>
                                    <td>
                                        <a href="{{ route('workers.edit', $worker) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('workers.destroy', $worker) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this worker?')">Delete</button>
                                        </form>
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
@endsection
