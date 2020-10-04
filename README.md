# Projeto realizado com PHP e HTML5 + CSS3. 
Foi utilizado o framework Bootstrap para as telas.
____
# Para rodar o projeto, é necessário:
- Wampserver;
- Importar o banco de dados para um banco 'publica' - O Arquivo encontra-se na pasta /_banco/publica.sql;
- Usei a inclusão do Bootstrap via CDN, é necessário conexão com Internet.

____

# index.php
- Home do Projeto, com links para Listagem de Jogadores e Partidas.

____
# lista.php
- Listagem de Jogadores. Faz conexão com o Banco via classe de conexão.
- Pode-se adicionar novo jogador(a).

____
# partidas.php
- Lista todas as partidas de um determinado jogador.
	- Para listar as partidas, é necessário selecionar um(a) Jogador(a) e clicar em 'Ver';
- Adiciona uma partida para o Jogar(a) Selecionado(a).
	- Após selecionar um(a) jogador(a), pode-se clicar em 'Adicionar Partida'.
	
____
# conexao.php
- Realiza a conexão com a base de dados.

____
# controlador.php
- Responsável por inserir Jogador e Partidas.
- Responsável pela lógica de recordes mínimos e máximos, e quebra de recordes.
