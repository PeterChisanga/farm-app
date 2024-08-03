@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Expense') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('expenses.store', $farm) }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="fertilizers" {{ old('category') == 'fertilizers' ? 'selected' : '' }}>Fertilizers</option>
                                    <option value="chemicals" {{ old('category') == 'chemicals' ? 'selected' : '' }}>Chemicals</option>
                                    <option value="equipment" {{ old('category') == 'equipment' ? 'selected' : '' }}>Equipment</option>
                                    <option value="feed" {{ old('category') == 'feed' ? 'selected' : '' }}>Feed</option>
                                    <option value="salaries" {{ old('category') == 'salaries' ? 'selected' : '' }}>Salaries</option>
                                    <option value="maintenance" {{ old('category') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    <option value="inputs" {{ old('category') == 'inputs' ? 'selected' : '' }}>Inputs</option>
                                    <option value="others" {{ old('category') == 'others' ? 'selected' : '' }}>Others</option>
                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Cost') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Expense') }}
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
