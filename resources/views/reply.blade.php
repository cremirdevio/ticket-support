@extends('layouts.app')


@section('title', 'Create your ticket')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Open a Ticket with us now!</h1>v
                        class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">

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


                    <form method="POST" action="{{ route('ticket.store') }}">
                        @csrf
                        <!-- Name input-->
                        {{-- <div class="form-floating mb-3">
                            <select class="form-control" id="category" type="text" name="category_id">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="name">Category</label>
                        </div> --}}

                        <div class="form-floating mb-3">
                            <input class="form-control" id="subject" name="subject" type="text" placeholder="Subject"
                                value="{{ old('subject') }}" />
                            <label for="name">Subject</label>
                        </div>

                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('body') is-invalid  @enderror" id="message" name="body"
                                type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                            <label for="message">Your reply</label>
                        </div>
                        <!-- Submit success message-->
                        <!---->

                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton"
                                type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
