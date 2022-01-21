@extends('admin/layouts.app')


@section('title', 'Admin Dashboard')
@section('content')


    <div class="row">

        <!-- Area Chart -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">All Categories</h6>

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
                                    <th scope="col">name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Date</th>
                                    {{-- <th scope="col">Numbers of replies</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)

                                    <tr>
                                        <th scope="row">
                                            <a
                                                href="{{ url('admin/category', $category->id) }}">{{ $category->name }}</a>

                                        </th>
                                        <td>
                                            <b>{{ $category->description }}</b>
                                        </td>
                                        <td>{{ $category->created_at }}</td>
                                        {{-- <td>{{ $replies = \App\Models\Reply::where('ticket_id', $ticket->id)->count() }}
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="3">
                                            <p class="text-center"> no categories available!</p>
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
