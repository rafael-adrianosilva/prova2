<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros - Sistema de Biblioteca</title>
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
            padding: 40px 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg width="80" height="80" xmlns="http://www.w3.org/2000/svg"><text x="5" y="40" font-size="30" opacity="0.02" fill="white">📖</text></svg>');
            background-repeat: repeat;
            pointer-events: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 3px solid #8b6914;
            border-top: 5px solid #daa520;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-content i {
            font-size: 55px;
            color: #8b6914;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .header-content h1 {
            color: #2c3e50;
            font-size: 2.2em;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .back-btn {
            background: linear-gradient(145deg, #8b6914 0%, #daa520 100%);
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-family: 'Segoe UI', sans-serif;
            transition: all 0.3s ease;
            border: 2px solid rgba(255,255,255,0.2);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139, 105, 20, 0.5);
            border-color: rgba(255,255,255,0.4);
        }

        .section {
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 2px solid #ddd;
            border-left: 5px solid #8b6914;
        }

        .section h2 {
            color: #2c3e50;
            margin-bottom: 25px;
            padding-bottom: 18px;
            border-bottom: 3px solid #daa520;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.8em;
            font-weight: bold;
        }

        .section h2 i {
            color: #8b6914;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .menu-card {
            background: linear-gradient(145deg, #8b6914 0%, #daa520 100%);
            border-radius: 12px;
            padding: 32px 28px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 20px;
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
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 30px rgba(139, 105, 20, 0.5);
            border-color: rgba(255,255,255,0.4);
        }

        .menu-card i {
            font-size: 45px;
            min-width: 45px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .menu-card span {
            font-size: 1.25em;
            font-weight: 700;
            font-family: 'Segoe UI', sans-serif;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        /* Cores diferentes para cada card */
        .menu-card:nth-child(1) {
            background: linear-gradient(145deg, #8b6914 0%, #daa520 100%);
        }

        .menu-card:nth-child(2) {
            background: linear-gradient(145deg, #9b6b1a 0%, #cd853f 100%);
        }

        .menu-card:nth-child(3) {
            background: linear-gradient(145deg, #2c5f7c 0%, #3498db 100%);
        }

        .menu-card:nth-child(4) {
            background: linear-gradient(145deg, #27ae60 0%, #2ecc71 100%);
        }

        .menu-card:nth-child(5) {
            background: linear-gradient(145deg, #c0392b 0%, #e74c3c 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <i class="fas fa-folder-plus"></i>
                <h1>Cadastros do Sistema</h1>
            </div>
            <a href="../index.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
        </div>

        <div class="section">
            <h2>
                <i class="fas fa-books"></i>
                Cadastro de Livro
            </h2>
            <div class="menu-grid">
                <a href="obra.php" class="menu-card">
                    <i class="fas fa-book"></i>
                    <span>Cadastro de Obra</span>
                </a>
            </div>
        </div>

        <div class="section">
            <h2>
                <i class="fas fa-users"></i>
                Cadastro de Usuários e Empréstimos
            </h2>
            <div class="menu-grid">
                <a href="usuario.php" class="menu-card">
                    <i class="fas fa-user-plus"></i>
                    <span>Cadastrar Usuário</span>
                </a>
                <a href="emprestimo.php" class="menu-card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Cadastrar Empréstimo</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>