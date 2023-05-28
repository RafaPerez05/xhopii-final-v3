<?php

class Controlador{

    //Atributo
    private $bancoDeDados;

    function __construct(){
        $this->bancoDeDados = new BancoDeDados("localhost","root","","xhopii");
    }
    //cadastra produtos
    public function cadastrarProduto($nome, $fabricante, $descricao, $valor){

        $produto = new Produto($nome,$fabricante,$descricao,$valor);
        $this->bancoDeDados->inserirProduto($produto);
    }
    //ver produto
    public function visualizarProdutos(){
        
        $listaProdutos = $this->bancoDeDados->retornarProdutos();
        while($produto = mysqli_fetch_assoc($listaProdutos)){
            return "<section class=\"conteudo-bloco\">" .
                   "<h2>" . $produto["nome"] . "</h2>" .
                   "<p>Fabricante: " . $produto["fabricante"] . "</p>" .
                   "<p>Descrição: " . $produto["descricao"] . "</p>" . 
                   "<p>Valor: " . $produto["valor"] . "</p>" .
                   "</section>";
        }
    }

    //cadastra cliente
    public function cadastrarCliente($nome, $sobrenome, $cpf, $dataNasc,$telefone,$email,$senha){

        $cliente = new Cliente($nome, $sobrenome, $cpf, $dataNasc,$telefone,$email,$senha);
        $this->bancoDeDados->inserirCliente($cliente);
    }

    //ver cliente
    public function visualizarCliente(){
        
    $listaClientes = $this->bancoDeDados->retornarClientes();
    while($cliente = mysqli_fetch_assoc($listaClientes)){
        return  "<section class=\"conteudo-bloco\">";
                "<h2>" . $cliente["nome"] . " " . $cliente["sobrenome"] . "</h2>";
                "<p>CPF: " . $cliente["cpf"] . "</p>";
                "<p>Data Nascimento: " . $cliente["dataNascimento"] . "</p>";
                "<p>Telefone: " . $cliente["telefone"] . "</p>";
                "<p>E-mail: " . $cliente["email"] . "</p>";
                "</section>";
                   
        }
    }

    //cadastra fun
    public function cadastrarFuncionario($nome, $sobrenome, $cpf, $dataNasc,$telefone,$email,$salario){

    $funcionario = new Funcionario($nome, $sobrenome, $cpf, $dataNasc,$telefone,$email,$salario);
    $this->bancoDeDados->inserirFuncionario($funcionario);
    }

    //ver fun
    public function visualizarFuncionario(){
        
        $listaFuncionario = $this->bancoDeDados->retornarFuncionario();
        while($funcionario = mysqli_fetch_assoc($listaFuncionario)){
            return  "<section class=\"conteudo-bloco\">";
                    "<h2>" . $funcionario["nome"] . " " . $funcionario["sobrenome"] . "</h2>";
                    "<p>CPF: " . $funcionario["cpf"] . "</p>";
                    "<p>Data Nascimento: " . $funcionario["dataNascimento"] . "</p>";
                    "<p>Telefone: " . $funcionario["telefone"] . "</p>";
                    "<p>E-mail: " . $funcionario["email"] . "</p>";
                    "<p>Salario: $" . $funcionario["salario"] . "</p>";
                    "</section>";
                       
            }
        }

}

?>