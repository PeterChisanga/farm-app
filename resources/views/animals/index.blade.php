@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Animals') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{route('animals.create')}}" class="btn btn-primary">Register Animal</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Date of Birth</th>
                                    <th>Type</th>
                                    <th>Breed</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($animals as $animal)
                                <tr>
                                    <td>{{ $animal->name }}</td>
                                    <td>{{ $animal->sex }}</td>
                                    <td>{{ $animal->date_of_birth }}</td>
                                    <td>{{ $animal->type }}</td>
                                    <td>{{ $animal->breed }}</td>
                                    <td>{{ $animal->weight }}</td>
                                    <td>
                                        <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this animal?')">Delete</button>
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
</div>
@endsection
