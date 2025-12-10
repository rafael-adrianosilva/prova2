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
    <title>Cadastrar Empréstimo - Biblioteca</title>
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
    input[type="datetime-local"],
    select {
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
        appearance: none;
    }

    select {
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%238b6914%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
        background-repeat: no-repeat;
        background-position: right 15px top 50%;
        background-size: 12px auto;
        padding-right: 40px;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #8b6914;
        box-shadow: 
            0 0 0 3px rgba(139, 105, 20, 0.1),
            inset 0 2px 4px rgba(0,0,0,0.05);
        background-color: #fff;
        transform: translateY(-2px);
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
        content: '🤝';
        font-size: 24px;
    }

    button[type="submit"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(139, 105, 20, 0.5);
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        form {
            padding: 30px 25px;
        }
        .header-content h1 {
            font-size: 1.4em;
        }
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <i class="fas fa-hand-holding"></i>
                <h1>Registro de Empréstimo</h1>
            </div>
            <a href="./index.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
        </div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-title">
                <i class="fas fa-file-signature"></i>
                <h2>Ficha de Saída</h2>
                <p>Registre a retirada de obras do acervo</p>
            </div>

            <div>
                <span>Nome do Leitor</span>
                <?php
                echo "<select name='idusuarioCadastro' id='nomeUsuario'>";
                echo "<option value='' disabled selected>Selecione um leitor...</option>";

                $con_leitor = new mysqli($svname, $user, $password, $db);
                if (!$con_leitor) {
                    die("Falha na Conexão.");
                };

                $sql = "SELECT * from usuariocadastro";
                $resulta = mysqli_query($con_leitor, $sql);

                while ($linha = mysqli_fetch_array($resulta)) {
                    echo "<option value='" . $linha['idusuarioCadastro'] . "'>" . $linha['nomeUsuario'] . "</option>";
                }

                mysqli_close($con_leitor);
                echo "</select>";
                ?>
            </div>
            <div>
                <span>Obra</span>
                <?php
                echo "<select name='idobraCadastro' id='titulo'>";
                echo "<option value='' disabled selected>Selecione uma obra...</option>";

                $con_obra = new mysqli($svname, $user, $password, $db);
                if (!$con_obra) {
                    die("Falha na Conexão.");
                };

                $sql = "SELECT * from obracadastro";
                $resulta = mysqli_query($con_obra, $sql);

                while ($linha = mysqli_fetch_array($resulta)) {
                    echo "<option value='" . $linha['idobraCadastro'] . "'>" . $linha['titulo'] . "</option>";
                }

                mysqli_close($con_obra);
                echo "</select>";
                ?>
            </div>
            <div>
                <span>Data do Empréstimo</span>
                <input type="datetime-local" name="dataEmprestimo">
            </div>
            <div>
                <span>Data Prevista de Devolução</span>
                <input type="date" name="dataPrev">
            </div>
            <button type="submit">Cadastrar Empréstimo</button>
        </form>
    </div>
</body>

</html>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['idusuarioCadastro'];
    $obra = $_POST['idobraCadastro'];
    $emprestimo = $_POST['dataEmprestimo'];
    $previsao = $_POST['dataPrev'];

    $sql = "INSERT INTO emprestimocadastro(
    usuarioCadastro_idusuarioCadastro,
    obraCadastro_idobraCadastro,
    dataEmprestimo,
    dataPrevistaDevolucao
    ) VALUES
    ('$usuario', '$obra', '$emprestimo', '$previsao')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

?>
