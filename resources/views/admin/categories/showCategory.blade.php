@extends('admin/layouts.app')


@section('title', 'Show ticket')
@section('content')
    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col">

                    <a href="{{ route('admin.showAllCategories') }}" class="m-4">Go back</a>
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



                    <div class="row mt-3 mb-5">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>CATEGORY INFORMATION</h5>
                                </div>
                                <div class="card-body">

                                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p> --}}
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <span class="text-muted pl-3"> Name: </span>
                                            <br>{{ $category->name }}
                                        </li>
                                        <li class="list-group-item"><span class="text-muted pl-3"> Description: </span>
                                            <br>{{ $category->description }}
                                        </li>
                                        <li class="list-group-item"><span class="text-muted pl-3"> Date created: </span>
                                            <br>{{ $category->created_at }}
                                        </li>
                                        {{-- <li class="list-group-item"><span class="text-muted pl-3"> Date updated: </span>
                                            <br> {{ $category->updated_at }}
                                        </li> --}}
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>



                    <div class="card mb-3" style="max-width: 540px;">

                        <div>
                            @forelse ($tickets as $ticket)
                                <div class="card mb-3" style="max-width: 540px;">

                                    <div class="row g-0">
                                        {{-- <div class="col-md-4">
                                <img src="..." class="img-fluid rounded-start" alt="...">
                            </div> --}}

                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $ticket->subject }}</h5>
                                                <p class="card-text">{{ $ticket->body }}</p>
                                                <p class="card-text"><small
                                                        class="text-muted">{{ $ticket->updated_at }}</small>
                                                </p>
                                                <p class="card-text"><small
                                                        class="text-muted">{{ $ticket->status }}</small>
                                                </p>
                                                @if ($ticket->status == 'closed')

                                                @else
                                                    <a href="{{ route('admin.closed_ticket', $ticket->id) }}"
                                                        class="  btn btn-warning" type="button">Closed</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection
