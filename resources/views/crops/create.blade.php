@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Crop') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('fields.crops.store', $field) }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="variety" class="col-md-4 col-form-label text-md-right">{{ __('Variety') }}</label>

                            <div class="col-md-6">
                                <input id="variety" type="text" class="form-control @error('variety') is-invalid @enderror" name="variety" value="{{ old('variety') }}" required>

                                @error('variety')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="planting_date" class="col-md-4 col-form-label text-md-right">{{ __('Planting Date') }}</label>

                            <div class="col-md-6">
                                <input id="planting_date" type="date" class="form-control @error('planting_date') is-invalid @enderror" name="planting_date" value="{{ old('planting_date') }}" required>

                                @error('planting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="expected_yield" class="col-md-4 col-form-label text-md-right">{{ __('Expected Yield') }}</label>

                            <div class="col-md-6">
                                <input id="expected_yield" type="number" step="0.01" class="form-control @error('expected_yield') is-invalid @enderror" name="expected_yield" value="{{ old('expected_yield') }}" required>

                                @error('expected_yield')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Crop') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

