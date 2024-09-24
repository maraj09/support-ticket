@extends('layouts.app')

@section('content')
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <div class="d-flex">
      <div>
        <h2>Ticket: {{ $ticket->subject }}</h2>
        <p>Status: {{ $ticket->status }}</p>
      </div>
      <div class="ms-auto">
        @if (Auth::user()->hasRole('admin') && $ticket->status !== 'closed')
          <form method="POST" action="{{ route('tickets.close', $ticket->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-warning mt-3">Close Ticket</button>
          </form>
        @endif
      </div>
    </div>
    <hr>
    <h4>Replies</h4>
    <div class="replies-container">
      @foreach ($ticket->replies as $reply)
        <div class="reply {{ $reply->user_id == auth()->id() ? 'reply-right' : 'reply-left' }}">
          <div class="reply-message">
            <p>{{ $reply->message }}</p>
            <small class="text-muted">Posted on {{ $reply->created_at->format('Y-m-d H:i') }}</small>
          </div>
        </div>
      @endforeach
    </div>
    <hr>

    <h4>Add a Reply</h4>
    <div class="d-flex">

    </div>
    <form method="POST" action="{{ route('tickets.reply', $ticket->id) }}">
      @csrf
      <div class="form-group">
        <textarea placeholder="Write here something..." class="form-control @error('message') is-invalid @enderror"
          id="message" name="message" rows="4">{{ old('message') }}</textarea>
        @error('message')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mt-3">Submit Reply</button>
    </form>

  </div>
  <script>
    window.onload = function() {
      var repliesContainer = document.querySelector('.replies-container');
      repliesContainer.scrollTop = repliesContainer.scrollHeight;
    };
  </script>
@endsection
