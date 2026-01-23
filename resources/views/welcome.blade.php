<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tablero Agro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left {
            width: 50%;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .left iframe {
            width: 90%;
            height: 90%;
            border-radius: 12px;
        }

        .right {
            width: 50%;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card h2 {
            margin: 0 0 10px 0;
            font-size: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 8px;
        }

        .card-content {
            font-size: 16px;
        }

        .precio {
            font-size: 28px;
            font-weight: bold;
            margin-top: 10px;
            color: #2c7be5;
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>