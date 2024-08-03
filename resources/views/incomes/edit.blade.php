@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Income') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('incomes.update', $income) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required autofocus>
                                    <option value="">Select Category</option>
                                    <option value="soya beans sales" {{ $income->category == 'soya beans sales' ? 'selected' : '' }}>Soya Beans Sales</option>
                                    <option value="maize sales" {{ $income->category == 'maize sales' ? 'selected' : '' }}>Maize Sales</option>
                                    <option value="sunflower sales" {{ $income->category == 'sunflower sales' ? 'selected' : '' }}>Sunflower Sales</option>
                                    <option value="pig sales" {{ $income->category == 'pig sales' ? 'selected' : '' }}>Pig Sales</option>
                                    <option value="cattle sales" {{ $income->category == 'cattle sales' ? 'selected' : '' }}>Cattle Sales</option>
                                    <option value="sheep sales" {{ $income->category == 'sheep sales' ? 'selected' : '' }}>Sheep Sales</option>
                                    <option value="goat sales" {{ $income->category == 'goat sales' ? 'selected' : '' }}>Goat Sales</option>
                                    <option value="other" {{ $income->category == 'other' ? 'selected' : '' }}>Other</option>
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
                                <input id="amount" type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $income->amount }}" required>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $income->date }}" required>

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
                                    {{ __('Update Income') }}
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
