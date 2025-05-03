@extends('layouts.app')

@section('content')
    <h2>Contact Us</h2>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST" style="max-width: 600px;">
        @csrf

        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name') <div style="color:red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div style="color:red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Subject:</label><br>
            <input type="text" name="subject" value="{{ old('subject') }}" required>
            @error('subject') <div style="color:red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Message:</label><br>
            <textarea name="message" rows="5" required>{{ old('message') }}</textarea>
            @error('message') <div style="color:red">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Send Message</button>
    </form>
@endsection
