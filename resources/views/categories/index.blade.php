@extends('layout.layout')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h2 class="card-title">Add a Post </h2>
        <!-- start page title -->
        <div class="row">
            <div class="col-15">

                {{-- <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                </div> --}}
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->

        <div class="row">
            <div class="col-xl-10">
                <div class="card overflow-hidden">
                    {{-- <div class="bg-primary bg-soft"> --}}
                    <div class="row">
                        <div class="col-12">
                            {{-- <div class="text-primary p-3"> --}}


                            <div class="card">
                                <div class="card-body">

                                    <form class="custom-validation" action="{{route('add-post')}}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ Session::get('success') }}
                                        @csrf
                                        <br>
                                        <div class="mb-3 row">
                                            <label for="image" class="col-md-2 col-form-label">Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" value="" id="image" name="image"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" id="description" name="description"
                                                    value="" rows="10" cols="100" required></textarea>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="title" class="col-md-2 col-form-label">Title</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" id="title" name="title" value=""
                                                    rows="10" cols="100" required></textarea>
                                                {{-- <input class="form-control" type="title" value="" id="title" name="title" required > --}}

                                            </div>
                                        </div>

                                        
                                        <div class="mb-3 row">
                                            <label for="tag" class="col-md-2 col-form-label">Tags</label>
                                            <div class="col-md-10">
                                                {{-- <textarea class="form-control" id="tags" name="tags" value="" rows="10" cols="100" required></textarea> --}}
                                                <input class="form-control" type="text" value="tagsValue"
                                                    id="tags-input" name="tag" required>

                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                AddPost
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>






                            {{-- </div> --}}
                        </div>
                    </div>
                    {{-- </div> --}}
                    <div class="card-body pt-0">
                        <div class="row">

                            <div class="col-sm-8">
                                <div class="pt-4">

                                    <div class="row">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection('content')
        @section('custom-scripts')
        @endsection