<?php
$svname = "localhost";
$user = "root";
$password = "";
$db = "biblioteca";

$conn = mysqli_connect($svname, $user, $password, $db);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Biblioteca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
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
        padding: 30px 20px;
        position: relative;
    }

    /* Efeito de estante de livros no fundo */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            repeating-linear-gradient(
                0deg,
                transparent,
                transparent 35px,
                rgba(139, 105, 20, 0.03) 35px,
                rgba(139, 105, 20, 0.03) 180px
            ),
            repeating-linear-gradient(
                90deg,
                transparent,
                transparent 10px,
                rgba(255, 255, 255, 0.02) 10px,
                rgba(255, 255, 255, 0.02) 80px
            );
        pointer-events: none;
    }

    /* Ícones de livros decorativos */
    body::after {
        position: fixed;
        top: 20px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 30px;
        opacity: 0.1;
        pointer-events: none;
        letter-spacing: 50px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .header {
        background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
        border-radius: 15px;
        padding: 25px 35px;
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
        gap: 15px;
    }

    .header-content i {
        font-size: 45px;
        color: #8b6914;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }

    .header-content h1 {
        color: #2c3e50;
        font-size: 1.8em;
        font-weight: bold;
        letter-spacing: 0.5px;
    }

    .back-btn {
        background: linear-gradient(145deg, #8b6914 0%, #daa520 100%);
        color: white;
        text-decoration: none;
        padding: 12px 24px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        font-family: 'Segoe UI', sans-serif;
        transition: all 0.3s ease;
        border: 2px solid rgba(255,255,255,0.2);
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        font-size: 1em;
    }

    .back-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(139, 105, 20, 0.5);
        border-color: rgba(255,255,255,0.4);
    }

    /* Formulário estilo ficha de biblioteca */
    form {
        background: linear-gradient(to bottom, #ffffff 0%, #fef9f3 100%);
        border-radius: 15px;
        padding: 40px 45px;
        box-shadow: 
            0 15px 40px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255,255,255,0.8);
        border: 3px solid #8b6914;
        border-left: 8px solid #daa520;
        position: relative;
        margin-bottom: 30px;
    }

    /* Efeito de papel vintage */
    form::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            repeating-linear-gradient(
                180deg,
                transparent,
                transparent 31px,
                rgba(139, 105, 20, 0.05) 31px,
                rgba(139, 105, 20, 0.05) 32px
            );
        pointer-events: none;
        border-radius: 15px;
    }

    /* Carimbo decorativo */
    form::after {
        content: '✓';
        position: absolute;
        top: 15px;
        right: 30px;
        font-size: 55px;
        color: rgba(139, 105, 20, 0.08);
        font-weight: bold;
        transform: rotate(-15deg);
        border: 4px solid rgba(139, 105, 20, 0.08);
        border-radius: 50%;
        width: 75px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-title {
        text-align: center;
        margin-bottom: 35px;
        padding-bottom: 20px;
        border-bottom: 3px solid #daa520;
        position: relative;
    }

    .form-title i {
        font-size: 50px;
        color: #8b6914;
        margin-bottom: 15px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }

    .form-title h2 {
        color: #2c3e50;
        font-size: 2em;
        font-weight: bold;
        margin-top: 10px;
    }

    .form-title p {
        color: #666;
        font-size: 1em;
        font-family: 'Segoe UI', sans-serif;
        font-style: italic;
        margin-top: 8px;
    }

    form > div {
        margin-bottom: 25px;
        position: relative;
    }

    form > div span {
        display: block;
        color: #2c3e50;
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 1.05em;
        font-family: 'Segoe UI', sans-serif;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    form > div span::before {
        content: '📌';
        font-size: 14px;
        opacity: 0.6;
    }

    input[type="text"],
    input[type="date"],
    input[type="tel"],
    input[type="datetime-local"] {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #d4af37;
        border-radius: 8px;
        font-size: 1em;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(to bottom, #ffffff 0%, #fefdfb 100%);
        transition: all 0.3s ease;
        color: #333;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="tel"]:focus,
    input[type="datetime-local"]:focus {
        outline: none;
        border-color: #8b6914;
        box-shadow: 
            0 0 0 3px rgba(139, 105, 20, 0.1),
            inset 0 2px 4px rgba(0,0,0,0.05);
        background: #fff;
        transform: translateY(-2px);
    }

    input::placeholder {
        color: #999;
        font-style: italic;
    }

    /* Ícones nos campos */
    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #8b6914;
        font-size: 18px;
        pointer-events: none;
    }

    button[type="submit"] {
        width: 100%;
        padding: 18px;
        background: linear-gradient(145deg, #8b6914 0%, #daa520 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.2em;
        font-weight: bold;
        font-family: 'Segoe UI', sans-serif;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 15px;
        box-shadow: 0 6px 20px rgba(139, 105, 20, 0.3);
        border: 2px solid rgba(255,255,255,0.2);
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
    }

    button[type="submit"]::before {
        content: '📝';
        font-size: 24px;
    }

    button[type="submit"]::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s ease;
    }

    button[type="submit"]:hover::after {
        left: 100%;
    }

    button[type="submit"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(139, 105, 20, 0.5);
        border-color: rgba(255,255,255,0.4);
    }

    button[type="submit"]:active {
        transform: translateY(-1px);
    }

    /* Info box decorativo */
    .info-note {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        border-left: 5px solid #f39c12;
        border-radius: 8px;
        padding: 15px 20px;
        margin-top: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: 'Segoe UI', sans-serif;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .info-note i {
        font-size: 24px;
        color: #e67e22;
    }

    .info-note p {
        color: #333;
        font-size: 0.95em;
        line-height: 1.4;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        form {
            padding: 30px 25px;
        }

        .header-content h1 {
            font-size: 1.4em;
        }

        .back-btn {
            padding: 10px 18px;
            font-size: 0.9em;
        }
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <i class="fas fa-user-plus"></i>
                <h1>Cadastro de Usuário</h1>
            </div>
            <a href="./index.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
        </div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-title">
                <i class="fas fa-id-card"></i>
                <h2>Ficha de Cadastro</h2>
                <p>Preencha os dados do novo usuário da biblioteca</p>
            </div>

            <div>
                <span>Nome Completo</span>
                <input type="text" name="nomeUser" placeholder="Digite o nome completo do usuário" required>
            </div>
            <div>
                <span>Data de Nascimento</span>
                <input type="date" name="dataNascimento" required>
            </div>
            <div>
                <span>Endereço Residencial</span>
                <input type="text" name="enderecoUser" placeholder="Rua, número, bairro, cidade - UF" required>
            </div>
            <div>
                <span>Telefone para Contato</span>
                <input type="tel" name="telefoneUser" placeholder="(00) 00000-0000">
            </div>
            <div>
                <span>Data e Hora do Cadastro</span>
                <input type="datetime-local" name="dataCadastro" required>
            </div>

            <button type="submit">Cadastrar Usuário</button>
        </form>
    </div>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nomeUser'];
    $nascimento = $_POST['dataNascimento'];
    $endereco = $_POST['enderecoUser'];
    $telefone = $_POST['telefoneUser'];
    $cadastro = $_POST['dataCadastro'];

    $sql = "INSERT INTO usuariocadastro(
    nomeUsuario,
    dataNascimento,
    endereco,
    telefone,
    dataCadastro
    ) VALUES
    ('$nome', '$nascimento', '$endereco', '$telefone', '$cadastro')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

?>