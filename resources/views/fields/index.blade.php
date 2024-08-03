@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Fields') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{route('fields.create')}}" class="btn btn-primary">Register Field</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Crops</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fields as $field)
                                <tr>
                                    <td>{{ $field->name }}</td>
                                    <td>{{ $field->size }} Hectres</td>
                                    <td>
                                        @foreach($field->crops as $crop)
                                            <span class="badge badge-primary">{{ $crop->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('fields.edit', $field->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('fields.destroy', $field->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this field?')">Delete</button>
                                        </form>
                                        <a href="{{ route('fields.crops.create', ['field' => $field->id]) }}" class="btn btn-success">Add Crop</a>
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
