<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>TEST</h1>
</body>
</html>

@section('content')
    <h1>Place an Order</h1>

    <form method="POST" action="/orders">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="origin">Origin:</label>
            <input type="text" name="origin" id="origin">
        </div>
        <div>
            <label for="destination">Destination:</label>
            <input type="text" name="destination" id="destination">
        </div>
        <div>
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option value="standard">Standard</option>
                <option value="express">Express</option>
            </select>
        </div>
        <div>
            <button type="submit">Place Order</button>
        </div>
    </form>
@endsection



