@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to Your Farm Dashboard</h1>
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-white bg-success">
                <div class="card-header  bg-success">
                    Workers
                </div>
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-friends"></i></h5>
                    <a href="{{ route('workers.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12  mt-4">
            <div class="card text-white bg-info">
            <div class="card-header bg-info"">
                Fields
            </div>
            <div class="card-body" >
                <h5 class="card-title"><i class="fas fa-leaf"></i></h5>
                <a href="{{ route('fields.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-white bg-primary">
            <div class="card-header bg-primary">
                Crops
            </div>
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-seedling"></i></h5>
                <a href="{{ route('fields.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-white bg-warning">
            <div class="card-header bg-warning">
                Animals
            </div>
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-horse"></i></h5>
                <a href="{{ route('animals.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-white bg-danger">
            <div class="card-header bg-danger">
                Feeds
            </div>
            <div class="card-body">
                <h5 class="card-title"> <i class="fas fa-horse"></i></h5>
                <a href="{{ route('feed_ingredients.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-white bg-secondary">
            <div class="card-header bg-secondary">
                Expenses
            </div>
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-dollar-sign"></i></h5>
                <a href="{{ route('expenses.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-white bg-success">
            <div class="card-header bg-success">
                Income
            </div>
            <div class="card-body ">
                <h5 class="card-title"><i class="fas fa-chart-line"></i></h5>
                <a href="{{ route('incomes.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-white bg-secondary">
            <div class="card-header bg-secondary">
                Reports
            </div>
            <div class="card-body ">
                <h5 class="card-title"><i class="fas fa-file-alt"></i></h5>
                <a href="{{ route('reports.index') }}" class="card-link text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>

    </div>
</div>
@endsection
