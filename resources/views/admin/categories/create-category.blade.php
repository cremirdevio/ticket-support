@extends('admin.layouts.app')


@section('title', 'Create Category')
@section('content')
    <!-- Header-->

    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">
            <div class="row gx-5 justify-content-center">
                <h3 class="text-center mb-5">Create Category</h3>
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


                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <!-- Name input-->


                        <div class="form-floating mb-3">
                            <input class="form-control" id="categoryName" name="categoryName" type="text"
                                placeholder="category Name" value="{{ old('categoryName') }}" />
                            <label for="categoryName">Category name</label>
                        </div>

                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('description') is-invalid  @enderror" id="description"
                                name="description" type="text" value="{{ old('description') }}"
                                placeholder="Enter your description here..." style="height: 10rem"></textarea>
                            <label for="description">Description</label>
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
