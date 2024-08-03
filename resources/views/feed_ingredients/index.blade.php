@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Feed Ingredients') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{route('feed_ingredients.create')}}" class="btn btn-primary">Register Feed</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Weight </th>
                                    <th>Price </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feedIngredients as $ingredient)
                                <tr>
                                    <td>{{ $ingredient->name }}</td>
                                    <td>{{ $ingredient->weight }} kg</td>
                                    <td>K {{ $ingredient->price }}</td>
                                    <td>
                                        <a href="{{ route('feed_ingredients.edit', $ingredient->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('feed_ingredients.destroy', $ingredient->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this feed ingredient?')">Delete</button>
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
