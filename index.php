<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><text x="10" y="50" font-size="40" opacity="0.03" fill="white">📚</text></svg>');
            background-repeat: repeat;
            pointer-events: none;
        }

        .container {
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255,255,255,0.1);
            padding: 50px;
            max-width: 700px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 3px solid #8b6914;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, #8b6914, #daa520, #8b6914);
        }

        .header {
            margin-bottom: 40px;
        }

        .header i {
            font-size: 90px;
            color: #8b6914;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            color: #2c3e50;
            font-size: 2.8em;
            margin-bottom: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.05);
        }

        .header p {
            color: #555;
            font-size: 1.2em;
            font-style: italic;
            font-family: 'Segoe UI', sans-serif;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .menu-card {
            background: linear-gradient(145deg, #8b6914 0%, #daa520 100%);
            border-radius: 12px;
            padding: 45px 35px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            border: 2px solid rgba(255,255,255,0.2);
            position: relative;
            overflow: hidden;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .menu-card:hover::before {
            left: 100%;
        }

        .menu-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(139, 105, 20, 0.5);
            border-color: rgba(255,255,255,0.4);
        }

        .menu-card i {
            font-size: 55px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .menu-card span {
            font-size: 1.4em;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            font-family: 'Segoe UI', sans-serif;
        }

        .menu-card:nth-child(2) {
            background: linear-gradient(145deg, #2c5f7c 0%, #3498db 100%);
        }

        .menu-card:nth-child(2):hover {
            box-shadow: 0 20px 40px rgba(52, 152, 219, 0.5);
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
            color: #777;
            font-size: 0.95em;
            font-family: 'Segoe UI', sans-serif;
        }

        .footer p {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .footer i {
            color: #8b6914;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <i class="fas fa-book-reader"></i>
            <h1>Sistema de Biblioteca</h1>
            <p>Gestão completa do acervo bibliográfico</p>
        </div>

        <div class="menu-grid">
            <a href="cadastro/index.php" class="menu-card">
                <i class="fas fa-plus-circle"></i>
                <span>Cadastrar</span>
            </a>
            <a href="tabela/index.php" class="menu-card">
                <i class="fas fa-list-alt"></i>
                <span>Conferir</span>
            </a>
        </div>

        <div class="footer">
            <p><i class="fas fa-book"></i> © 2025 Sistema de Gestão Bibliotecária</p>
        </div>
    </div>
</body>
</html>