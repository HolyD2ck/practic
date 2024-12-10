<!-- resources/views/project/books.blade.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список книг</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a7f7b, #e4e9eb);
            color: #333;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 40px;
            color: #333;
            margin-top: 20px;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        th {
            background-color: #4c9f70;
            color: #fff;
            font-size: 18px;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:hover {
            background-color: #d9f4e3;
            cursor: pointer;
        }

        td {
            font-family: 'Arial', sans-serif;
        }

        td:nth-child(4), td:nth-child(5), td:nth-child(6) {
            font-weight: bold;
            color: #4c9f70;
        }

        td:nth-child(7) {
            font-style: italic;
            color: #007b5e;
        }

        td:nth-child(8), td:nth-child(9) {
            font-size: 14px;
            color: #888;
        }

        a {
            color: #007b5e;
            text-decoration: none;
        }

        a:hover {
            color: #4c9f70;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Список всех книг</h1>

    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Автор</th>
                <th>Дата публикации</th>
                <th>Цена</th>
                <th>Страницы</th>
                <th>Доступность</th>
                <th>Рейтинг</th>
                <th>Добавлено</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->название }}</td>
                <td>{{ $book->автор }}</td>
                <td>{{ \Carbon\Carbon::parse($book->дата_публикации)->format('d.m.Y') }}</td>
                <td>{{ $book->цена }} ₽</td>
                <td>{{ $book->страницы }}</td>
                <td>{{ $book->доступность ? 'Доступно' : 'Недоступно' }}</td>
                <td>{{ $book->рейтинг }}</td>
                <td>{{ \Carbon\Carbon::parse($book->добавлено)->format('d.m.Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($book->created_at)->format('d.m.Y H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($book->updated_at)->format('d.m.Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
