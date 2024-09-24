@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Your Tickets</h2>
    <a href="{{ route('customer.tickets.create') }}" class="btn btn-primary mb-3">Create Ticket</a>
    <table class="table">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tickets as $ticket)
          <tr>
            <td>{{ $ticket->subject }}</td>
            <td>{{ $ticket->status }}</td>
            <td>{{ $ticket->created_at }}</td>
            <td><a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
