@extends('layout.main')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h2 class="card-title"> Edit User Information</h2>
        <!-- start page title -->
        <div class="row">
            <div class="col-15">
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->

        <div class="row">
            <div class="col-xl-10">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class="card">
                                        <div class="">

                                            @foreach ($user as $row)
                                            <form action="/update-admin?id={{ $row->id }}" method="POST"
                                                enctype="multipart/form-data">
                                                {{ Session::get('success') }}
                                                @csrf
                                                
                                                <section class="h-100 h-custom" style="background-color: #8fc4b7;">
                                                    <div class="container py-5 h-100">
                                                        <div
                                                            class="row d-flex justify-content-center align-items-center h-100">
                                                            <div class="col-lg-8 col-xl-6">
                                                                <div class="card rounded-3">
                                                                    <div class="card-body p-4 p-md-5">
                                                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">
                                                                            Registration Info</h3>

                                                                        <form class="px-md-2">

                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="text" name="name"
                                                                                            id="name" value="{{ $row->name}}"
                                                                                            class="form-control" />
                                                                                        <label class="form-label"
                                                                                            for="name">Name</label>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="password"
                                                                                            name="password" value="{{ $row->password}}"
                                                                                            class="form-control"
                                                                                            id="password" />
                                                                                        <label for="password"
                                                                                            class="form-label">Password</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="text" name="email"
                                                                                            class="form-control" value="{{ $row->email}}"
                                                                                            id="email" />
                                                                                        <label for="email"
                                                                                            class="form-label">Email</label>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="text" name="phone"
                                                                                            class="form-control" value="{{ $row->phone}}"
                                                                                            id="phone" />
                                                                                        <label for="phone"
                                                                                            class="form-label">Phone</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="text" name="city"
                                                                                            class="form-control" value="{{ $row->city}}"
                                                                                            id="city" />
                                                                                        <label for="city"
                                                                                            class="form-label">City</label>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="text" name="state"
                                                                                            class="form-control" value="{{ $row->state}}"
                                                                                            id="state" />
                                                                                        <label for="state"
                                                                                            class="form-label">State</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="text"
                                                                                            name="country" value="{{ $row->country}}"
                                                                                            class="form-control"
                                                                                            id="country" />
                                                                                        <label for="country"
                                                                                            class="form-label">Country</label>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div
                                                                                        class="form-outline datepicker">
                                                                                        <input type="file" name="image"
                                                                                            class="form-control" value="{{ $row->image}}"
                                                                                            id="image" />
                                                                                        <label for="image"
                                                                                            class="form-label">Image</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <button type="submit"
                                                                                class="btn btn-success btn-lg mb-1">Submit</button>

                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                            </form>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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