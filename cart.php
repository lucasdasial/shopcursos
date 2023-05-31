<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources//global.css">
    <title>Carrinho</title>
</head>

<body>
    <div>
        <h1> 🛒carrinho</h1>
    </div>
    <main id="main">
    </main>
    <a href="./home.php">Voltar</a>
    <script>
    let main = document.querySelector("#main")
    let listInMemory = JSON.parse(localStorage.getItem('cardList'))
    let list = [...listInMemory]

    list.forEach(item => {

        const div = document.createElement("div")
        const couseName = document.createElement("p")
        const quantity = document.createElement("p")
        const price = document.createElement("h1")
        const remove = document.createElement("button")

        remove.classList.add("btn-remove")
        remove.onclick = function() {
            removeFromCard(item.id)
        };
        remove.innerHTML = "🗑️ remover"



        couseName.innerHTML = `${item.name}`
        quantity.innerHTML = `Quantidade: ${item.quantity}`
        price.innerHTML = `Total R$ ${(item.price * item.quantity).toFixed(2)}`

        div.append(couseName, quantity, price, remove)
        div.classList.add('card')

        main.append(div)
    })


    function removeFromCard(id) {

        let list = []

        let listInMemory = JSON.parse(localStorage.getItem('cardList'))


        if (listInMemory) {

            list = [...listInMemory]

            let itemExisting = list.find(item => item.id == id)

            if (itemExisting) {
                let index = list.indexOf(itemExisting)

                if (itemExisting.quantity < 1) {
                    list.splice(index, 1)
                    localStorage.setItem('cardList', JSON.stringify(list))
                    alert("Excluído")
                    location.reload()
                    return
                }

                itemExisting.quantity = itemExisting.quantity - 1

                localStorage.setItem('cardList', JSON.stringify(list))
                alert("Excluído")
                location.reload()
                return
            }



        }





    }
    </script>

    <style>
    .card {
        background: #fff;
        margin: 12px;
        padding: 24px;
    }

    .btn-remove {
        background-color: #c94b51;
    }
    </style>
</body>

</html>