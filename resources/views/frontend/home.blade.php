@extends('layouts.app')

@section('content')
    <h1>Welcome to SA Car Rental</h1>
    <p>Browse and rent the car of your choice at the best prices.</p>
    <a href="{{ route('cars.index') }}">Browse Cars</a>
@endsection
