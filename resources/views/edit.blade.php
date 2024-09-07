<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }

        h2 {
            color: #ff9800;
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"], input[type="number"] {
            border: 1px solid #333;
            background-color: #333;
            color: white;
        }

        button {
            background-color: #ff9800;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #e68a00;
        }

        .back-button {
            background-color: #4a148c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .back-button:hover {
            background-color: #3d0a6e;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="window.location.href='/dashboard'">Back to Dashboard</button>
        <h2>Edit Book</h2>
        <form method="POST" action="/book/{{ $book->id }}">
            @csrf
            @method('POST')
            <input type="text" name="title" value="{{ $book->title }}" required>
            <input type="text" name="author" value="{{ $book->author }}" required>
            <input type="text" name="publisher" value="{{ $book->publisher }}" required>
            <input type="number" name="year_published" value="{{ $book->year_published }}" required>
            <button type="submit">Update Book</button>
        </form>
    </div>
</body>
</html>
