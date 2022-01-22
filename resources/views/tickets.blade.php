@extends('layouts.app')


@section('title', 'Open Tickets')
@section('content')
    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">

            <div class="row gx-5 justify-content-center">
                <div class="col">

                    @if (session('success'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-error">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped text-center table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Numbers of replies</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tickets as $ticket)

                                    <tr>
                                        <th scope="row">
                                            <a href="{{ url('tickets', $ticket->id) }}">{{ $ticket->reference }}</a>
                                            <br>
                                            {{ $ticket->user_id }}
                                        </th>
                                        <td>
                                            <b>{{ $ticket->subject }}</b> <br>
                                            {{ $ticket->body }}
                                        </td>
                                        <td>{{ $ticket->status }}</td>
                                        <td>{{ $ticket->created_at }}</td>

                                        <td>{{ $replies = \App\Models\Reply::where('ticket_id', $ticket->id)->count() }}
                                        </td>
                                        <td> <a class="btn btn-outline-primary "
                                                href="{{ url('tickets', $ticket->id) }}">View
                                                Ticket</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="4">
                                            <p class="text-center"> You have no Open ticket!</p>
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
