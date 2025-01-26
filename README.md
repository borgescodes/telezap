# TeleZap Beta

**TeleZap Beta** é um sistema de chat em tempo real desenvolvido com tecnologias como **PHP**, **JavaScript**, **MySQL** e **CSS**. O objetivo principal do projeto é oferecer uma plataforma simples e funcional onde usuários podem se cadastrar, fazer login, trocar mensagens em tempo real e gerenciar suas contas.

## Funcionalidades Principais

- **Cadastro e Login:** 
  - Permite que usuários se registrem com informações básicas, como nome, e-mail, senha e imagem de perfil.
  - Autenticação segura com criptografia de senha.
- **Mensagens em Tempo Real:** 
  - Envio e recebimento de mensagens sem recarregar a página, com atualização automática da interface.
- **Gerenciamento de Usuários:** 
  - Lista de usuários disponíveis para chat.
  - Pesquisa por nome para facilitar a interação.
- **Exclusão de Conta:** 
  - Usuários podem excluir permanentemente suas contas.
- **Status Online/Offline:** 
  - Indica a disponibilidade dos usuários em tempo real.

## Estrutura do Projeto

O sistema é organizado em uma estrutura clara, separando lógica de backend, frontend e banco de dados para facilitar manutenção e expansão:

### **Frontend**
- **HTML/CSS:** Define o layout e estilo das páginas.
- **JavaScript:** Gerencia interações e comunicação com o backend via AJAX.

### **Backend**
- **PHP:** Processa requisições, manipula o banco de dados e gerencia sessões.

### **Banco de Dados**
- **MySQL:** Armazena informações dos usuários e mensagens trocadas.

### **Arquivos do Sistema**

#### **Subpasta `javascript`**
- `chat.js`: Gerencia envio e recebimento de mensagens no chat.
- `delete-account.js`: Lida com a exclusão de contas.
- `login.js`: Processa o login do usuário.
- `pass-show-hide.js`: Alterna a visibilidade da senha nos formulários.
- `signup.js`: Gerencia o cadastro de novos usuários.
- `users.js`: Atualiza e exibe a lista de usuários em tempo real.

#### **Subpasta `php`**
- `config.php`: Configura a conexão com o banco de dados.
- `data.php`: Formata e exibe a lista de usuários no frontend.
- `get-chat.php`: Recupera mensagens entre dois usuários.
- `insert-chat.php`: Insere novas mensagens no banco de dados.
- `login.php`: Valida credenciais de login e gerencia sessões.
- `logout.php`: Atualiza o status para offline e encerra a sessão.
- `search.php`: Realiza buscas de usuários por nome.
- `signup.php`: Realiza o cadastro de novos usuários.
- `users.php`: Recupera e exibe a lista de usuários no frontend.

#### **Raiz do Projeto**
- `chat.php`: Página principal do chat.
- `delete-account.php`: Script para exclusão permanente de conta.
- `header.php`: Estrutura básica de cabeçalho.
- `index.php`: Página de cadastro de novos usuários.
- `login.php`: Página de login para usuários existentes.
- `users.php`: Lista os usuários disponíveis para chat.

#### **Outros**
- `style-main.css`: Define os estilos do sistema.
- `telezap.sql`: Script para criação do banco de dados (tabelas `users` e `messages`).

## Requisitos

- **Servidor Local:** XAMPP, WAMP ou equivalente.
- **Banco de Dados:** MySQL ou MariaDB.
- **Editor de Código:** VS Code, PHPStorm ou outro de sua preferência.

## Como Executar

1. Instale e configure um servidor local como o **XAMPP**.
2. Coloque os arquivos do projeto na pasta `htdocs` do XAMPP.
3. Importe o arquivo `telezap.sql` para o banco de dados MySQL via phpMyAdmin.
4. Inicie o servidor Apache e o MySQL no painel do XAMPP.
5. Acesse o projeto no navegador através de `http://localhost/telezap`.

```bash
# Passos para configuração no terminal
cd /caminho/para/xampp/htdocs/telezap
