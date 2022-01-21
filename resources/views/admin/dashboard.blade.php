@extends('admin/layouts.app')


@section('title', 'Admin Dashboard')
@section('content')


    <div class="row">

        <!-- Area Chart -->
        <div class="col">
            <a href="{{ route('admin.showAllCategories') }}" class="btn btn-secondary m-4">View
                categories</a>
            <div class="card shadow mb-4">


                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Tickets</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">


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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tickets as $ticket)

                                    <tr>
                                        <th scope="row">
                                            <a
                                                href="{{ url('admin/tickets', $ticket->id) }}">{{ $ticket->reference }}</a>
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
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="4">
                                            <p class="text-center"> no Open ticket available!</p>
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>


@endsection
