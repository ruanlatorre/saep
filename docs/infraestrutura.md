# Lista de Requisitos de Infraestrutura (Entrega 9)

Para o correto funcionamento e deploy do sistema SAEP, são necessários os seguintes componentes:

### 1. Servidor Web (Backend)
- **Apache 2.4+**: Para processamento das requisições HTTP.
- **PHP 8.0+**: Linguagem de programação utilizada no desenvolvimento dos controladores e lógica de negócio.
- **Módulo MySQLi**: Habilitado no PHP para comunicação com o banco de dados.

### 2. Banco de Dados (Database)
- **MySQL 8.0+ ou MariaDB**: Sistema de gerenciamento de banco de dados relacional.
- **Estrutura**: Tabelas `usuarios`, `produtos` e `entrada_saida`.

### 3. Ambiente de Desenvolvimento (Local)
- **XAMPP / WAMPServer**: Pacote contendo Apache, PHP e MySQL pré-configurados.
- **Porta 80 (HTTP)**: Porta padrão para acesso ao sistema via `localhost`.

### 4. Cliente (Frontend)
- **Navegador Moderno**: Google Chrome, Microsoft Edge ou Mozilla Firefox (com suporte a ES6 e CSS3).
- **Conectividade**: Acesso via rede local ou servidor web configurado.

### 5. Segurança
- **Prepared Statements (MySQLi)**: Requisito de infraestrutura de software para prevenir ataques de SQL Injection.
