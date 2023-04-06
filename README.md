<h1 align="center"> Sistema de cadastro com PHP </h1>

<p align="center">
Um sistema feito para cadastrar clientes e produtos
</p>

<p align="center">
  <a href="#-tecnologias">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
</p>

<br>

## 🚀 Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

-> Front-end:

- HTML e CSS
- JavaScript

-> Back-end:

- PHP e SQL
- phpMyAdmin (usado na gestão do banco)

## 💻 Projeto

O projeto funciona da seguinte maneira:
-> É realizada uma conexão com o banco de dados com PDO, onde incluimos isso no index do projeto;
-> No index do PHP é feito uma validação que verifica se existe uma ação e tabela, caso existam é enviado para essa página, senão é renderizado uma pagina de erro (404);
-> O READ do CRUD é a action=list, que pode enviar para as varias tabelas do projeto;
-> O CREATE e UPDATE ficam na action=register que verifica se existe um id, caso não exista inserimos algo novo no banco, senão realizamos um UPDATE;
-> O DELETE deleta normalmente quando o id recebido é igual ao do banco;
