@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>All Tickets</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Created By</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tickets as $ticket)
          <tr>
            <td>{{ $ticket->subject }}</td>
            <td>{{ $ticket->status }}</td>
            <td>{{ $ticket->created_at }}</td>
            <td>{{ $ticket->user->name }} <br> {{ $ticket->user->email }}</td>
            <td><a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
