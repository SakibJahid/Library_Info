<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #4a148c;
            padding: 15px;
            color: white;
            text-align: center;
            position: relative;
        }
        .navbar .logout-button {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #d32f2f;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .navbar .logout-button:hover {
            background-color: #b71c1c;
        }
        .container {
            padding: 40px;
        }
        h2 {
            color: #ff9800;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4a148c;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #1e1e1e;
        }
        button {
            padding: 10px 20px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e68a00;
        }
        .add-book {
            text-align: right;
            margin-bottom: 20px;
        }
        .delete-button {
            background-color: #d32f2f;
        }
        .delete-button:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Book Information Storage System</h1>

        <form method="POST" action="/logout" style="display: inline;">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>

    </div>

    <div class="container">
        <h2>Manage Books</h2>

        <div class="add-book">
            <button onclick="window.location.href='/book/create'">Add New Book</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Year Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->year_published }}</td>
                        <td>
                            <button onclick="window.location.href='/book/{{ $book->id }}/edit'">Edit</button>
                            <form action="/book/{{ $book->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
