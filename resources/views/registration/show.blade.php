@extends('layout.main')
@section('content')

<table class="table table-striped">
    <thead>
</thead>
<tbody>
    <tr>
   <th>Name</th>
   <th>Email</th>
   <th>City</th>
   <th>State</th>
   <th>Country</th>
   <th>Phone</th>
   <th>Image</th>
   <th>Download</th>
</th>
</tr>
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->city}}</td>
    <td>{{$user->state}}</td>
    <td>{{$user->country}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->image}}</td>
    <td><a href="{{ route('admin.pdf', ['id' => $user->id]) }}" class="btn btn-primary">Download PDF</a></td>
</tr>
</tbody>
</table>

@endsection('content')
@section('custom-scripts')
@endsection