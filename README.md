# KageHand
Trabalho proposto pelo docente da disciplina de Banco de Dados II.

**ROTEIRO PARA TRABALHO DA DISCIPLINA DE BANCO DE DADOS II**

O   presente   trabalho   se   constitui   da   implementação   computacional   de   um   sistema   de
informação que realize operações de inserção, seleção, atualização e remoção de informações em
uma base de dados Mysql; operações estas que implementarão as funcionalidades do sistema.
O trabalho é em grupo de até 4 alunos e pode ser feito na linguagem de programação de escolha do
aluno. O sistema pode ser um sistema Web ou Desktop, ficando também à escolha do aluno.

1 -  Na data estipulada para apresentação do trabalho, cada grupo deverá:

a) Primeiramente apresentar os requisitos funcionais do sistema;
b) Realizar uma demonstração do sistema em execução;
c) No que se refere à programação em banco de dados, o aluno deverá explicitar:
- os trechos de código referentes à conexão com a base de dados
- os trechos de código referentes à chamadas de consultas
- os trechos de código referentes à chamada de procedimentos armazenados (stored 
   procedures) com passagem de parâmetros

2 – Os códigos em linguagem Transact-Sql devem atender aos seguintes requisitos:
a)   Deve-se   usar   do   recurso   de   transações   para   implementar   funcionalidades   do   sistema   que
compõem-se de mais de 1 operação (comando) em Transact-sql
b) Deve haver pelo menos uma consulta sql com o uso de junções
c) Pelo menos uma funcionalidade do sistema deve envolver o uso de chamadas à procedimentos
armazenados (stored procedures) com passagem de pelo menos 1 parâmetro
c) Deve haver o uso de todos os comandos básicos da sql: select, update, delete e insert.

**No   moodle   estará   disponível   um   modelo   de   um   sistema  Web   básico   escrito   em   php   para
manipulação de uma base dados bancária, para servir de exemplo. Para que este possa ser testado,
os arquivos do sistema devem ser copiados para o diretório de publicação no servidor web utilizado.
(no caso servidor Apache, geralmente é a pasta var/www/html). A página inicial é empbanco.php
**No moodle também está disponível um exemplo de stored procedure com uso de transação.
