<!DOCTYPE html>
<html>
<head>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>User Details</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>City: {{ $user->city }}</p>
    <p>State: {{ $user->state }}</p>
    <p>Country: {{ $user->country }}</p>
    <p>Phone: {{ $user->phone }}</p>
</body>
</html>
