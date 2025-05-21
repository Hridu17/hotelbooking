@extends('layouts.main')

@section('container')
    <div class="container text-center py-5">
        <h2 class="text-danger">Payment Failed</h2>
        <p>{{ $errorMessage }}</p>
        <p>Please try again or contact support.</p>
    </div>
@endsection
