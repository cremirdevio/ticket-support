@extends('layouts.app')
{{-- base('/public') --}}


@section('title', 'Show Tickets')
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



                    <div class="row mt-3 mb-5">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>TICKET INFORMATION</h5>
                                </div>
                                <div class="card-body">

                                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p> --}}
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <span class="text-muted pl-3"> Username: </span>
                                            <br>{{ $ticket->user->username }}
                                        </li>
                                        <li class="list-group-item"><span class="text-muted pl-3"> Reference: </span> <br>
                                            {{ $ticket->reference }}</li>
                                        <li class="list-group-item"><span class="text-muted pl-3"> Status: </span>
                                            <br>{{ $ticket->status }}
                                        </li>
                                        <li class="list-group-item"><span class="text-muted pl-3"> Message: </span>
                                            <br>{{ $ticket->subject }}
                                        </li>
                                        <li class="list-group-item"><span class="text-muted pl-3"> Date created: </span>
                                            <br>{{ $ticket->created_at }}
                                        </li>
                                        <li class="list-group-item"><span class="text-muted pl-3"> Date updated: </span>
                                            <br> {{ $ticket->updated_at }}
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="accordion mb-5" id="accordionExample">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Reply
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form method="POST" action="{{ route('reply.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control"
                                                id="exampleInputEmail1" value="{{ $ticket->subject }}"
                                                aria-describedby="emailHelp" placeholder="Enter subject">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="p-3">Message</label>
                                            <textarea class="form-control @error('body') is-invalid  @enderror" id="message"
                                                name="body" type="text" placeholder="Enter your reply here..."
                                                value="{{ old('body') }}" style="height: 10rem"></textarea>

                                        </div>
                                        <input type="hidden" value="{{ $ticket->id }}" name="ticketID"
                                            aria-describedby="emailHelp">
                                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div>
                            @forelse ($replies as $reply)
                                <div class="row g-0">
                                    {{-- <div class="col-md-4">
                                <img src="..." class="img-fluid rounded-start" alt="...">
                            </div> --}}

                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $reply->subject }}</h5>
                                            <p class="card-text">{{ $reply->body }}</p>
                                            <p class="card-text"><small
                                                    class="text-muted">{{ $reply->updated_at }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                        </div>

                    </div>

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
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
