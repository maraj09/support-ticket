@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Create New Ticket</h2>
    <form method="POST" action="{{ route('customer.tickets.store') }}">
      @csrf
      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject"
          value="{{ old('subject') }}">
        @error('subject')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4">{{ old('message') }}</textarea>
        @error('message')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
  </div>
@endsection
