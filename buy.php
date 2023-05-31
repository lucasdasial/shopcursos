<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/global.css">
    <title>Comprar</title>
</head>

<body>
    <main>
        <div class='card'>
            <a href="../home.php">🔙 Voltar</a>

            <?php
            include('./config/db.php');
            error_reporting(E_ERROR | E_PARSE);
            $findById = "SELECT * FROM tbl_courses WHERE id = '$_GET[id]' ";

            $query = $mysqli->query($findById);
            $freteValue = 13.99;

            if ($query->num_rows == 1) {

                $data = $query->fetch_assoc();

                $total = $data['price'] + $freteValue;

                echo "<div class='card__header'>
                        <img class='card__img'
                         src=\"$data[img]\" />
                        <div>
                            <p>$data[name]</p>
                            <p class='card__price' id='price'> R$ $data[price] </p>
                            <i id='total' class='hidden' >TOTAL R$ $total </i>
                            <p>Para onde devemos enviar?</p>


                            <input type='text' placeholder='CEP' name='cep' id='cep' required>
                            <button id='calc-frete'> Calcular</button>
                            <p id='result'></p>
                        </div>
                    </div>";
            }
            ?>
        </div>


        <script>
        let cepInput = document.querySelector("#cep")
        let total = document.querySelector("#total")
        let btnCalcFrete = document.querySelector("#calc-frete")
        let msg = document.querySelector("#result")

        btnCalcFrete.addEventListener('click', () => {
            fetch(`https://viacep.com.br/ws/${cepInput.value}/json/`)
                .then(response => response.json())
                .then(result => {

                    total.classList.remove('hidden')

                    msg.innerHTML =
                        ` RS 13,99 para ${result.logradouro}, ${result.bairro} - ${result.localidade}`
                })

        })
        </script>
    </main>


    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

        font-family: 'Poppins', sans-serif;
        font-size: 18px;

        transition: 0.3s;
    }

    .hidden {
        visibility: hidden;
    }

    a {
        text-decoration: none;

    }

    input,
    button {
        width: 100%;
        height: 50px;
    }

    input {

        padding-left: 16px;

    }

    button {

        cursor: pointer;
        margin-top: 18px;
        border-radius: 18px;

        border: none;

        background-color: #dfc329;
        color: white
    }


    button:hover {
        filter: brightness(1.1);
        transform: translate(-8px, -8px);

    }

    body {
        width: 100vw;
        height: 100vh;
        background-color: #f2f2f2;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {

        max-width: 700px;
        width: 100%;

        padding: 16px;

        border-radius: 12px;

        background-color: #fff;
    }

    .card__header {
        display: flex;
        gap: 12px;
    }

    .card__img {
        background-color: #f2f2f2;
        width: 50%;

    }

    .card__price {
        font-size: 34px;
        font-weight: bold;
    }

    #calc-frete {
        margin-bottom: 16px;
    }

    @media (max-width:768px) {

        .card__header {
            flex-direction: column;
        }
    }
    </style>

</body>

</html>