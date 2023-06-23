<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@auth
    <p>Congrats you're logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
    <div style="border: 3px solid;"></div>
    <h2>Create new expense</h2>
    <form action="/create-expense" method="POST">
        @csrf
        <input type="number" name="title">
        <button>Save Expense</button>
    </form>
    <div style="border: 3px solid black;">
        <h2>All Expenses</h2>
        @foreach($expenses as $expense)
            <div style="background-color: gray; margin: 10px; padding: 10px;" >
            <h3>{{$expense['title']}}</h3>
                <p><a href="/edit-expense/{{$expense->id}}">Edit</a></p>
                <form action="/delete-expense/{{$expense->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <div style="border: 3px solid black;">
        <h2>Register</h2>.
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>.
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
    </div>
@endauth

</body>
</html>
