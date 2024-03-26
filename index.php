<!DOCTYPE html>
<html>

<head>
    <title>Exemplo PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Ricardo/Ian">

    <style>
        body {
            background-color: #315659;
        }

        h1 {
            color: #ffffff;
            background-color: #253031;
        }

        p {
            color: #C6E0FF;
        }

        .card {
            display: grid;
            justify-content: center;
        }
    </style>
</head>

<body>
    <h1>Codigos</h1>
    <div class="container">
        <!-- Abstração -->
        <div class="card">
            <img src="abstracao.png" alt="Abstração" width="900" height="400">
        </div>

        <!-- Encapsulamento -->
        <div class="card">
            <img src="encapsulamento.png" alt="Encapsulamento" width="900" height="600">
        </div>

        <!-- Herança -->
        <div class="card">
            <img src="heranca.png" alt="Herança" width="900" height="400">
        </div>

        <!-- Polimorfismo -->
        <div class="card">
            <img src="polimorfismo.png" alt="Polimorfismo" width="900" height="200">
        </div>
    </div>

    <?php
    // Abstração - Classe abstrata representando um ItemMenu genérico
    abstract class ItemMenu
    {
        protected $nome;
        protected $preco;

        public function __construct($nome, $preco)
        {
            $this->nome = $nome;
            $this->preco = $preco;
        }

        abstract public function descrever();
    }



    // Herança - Classes concretas que herdam de ItemMenu
    class Prato extends ItemMenu
    {
        public function descrever()
        {
            return "Prato: {$this->nome}, Preço: {$this->preco} reais";
        }
    }


    class Bebida extends ItemMenu
    {
        public function descrever()
        {
            return "Bebida: {$this->nome}, Preço: {$this->preco} reais";
        }
    }


    // Encapsulamento - Classe Restaurante que encapsula a lógica de manipulação do menu
    class Restaurante
    {
        private $menu;

        public function __construct()
        {
            $this->menu = [];
        }

        public function adicionarItemMenu(ItemMenu $item)
        {
            $this->menu[] = $item;
        }

        public function mostrarMenu()
        {
            $descricaoMenu = "Menu:\n";
            foreach ($this->menu as $item) {
                $descricaoMenu .= "- " . $item->descrever() . "\n";
            }
            return $descricaoMenu;
        }
    }


    // Polimorfismo - Criando instâncias de Prato e Bebida e usando-os como itens do menu
    $restaurante = new Restaurante();
    $restaurante->adicionarItemMenu(new Prato("Lasanha", 25));
    $restaurante->adicionarItemMenu(new Bebida("Refrigerante", 5));

    // Mostrando o menu
    echo "<br> <p>output: </p>";
    echo $restaurante->mostrarMenu();
    ?>
</body>

</html>