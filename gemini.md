Sempre responda em PT-BR

# 🚀 Customização Antigravity: Guia de Desenvolvimento Full-Stack Premium

Este documento define os padrões de excelência para o desenvolvimento no ecossistema Antigravity. O objetivo é ensinar e montar códigos pronta transição do básico para o nível médio-avançado, integrando animações dinâmicas e um backend PHP ultra-seguro.

---

## 1. 🏛️ Estrutura e Estética (HTML5 & CSS3)

Para sair do básico, não basta "funcionar". A interface deve ser **Premium**.

- **Semântica**: Use `<main>`, `<section>`, `<article>`, `<nav>` e `<footer>`. Isso ajuda no SEO e na acessibilidade.
- **Design System**: Use variáveis CSS (`:root`) para cores, fontes e espaçamentos.
- **Estética Visual**: Abuse de `backdrop-filter: blur()`, gradientes suaves e sombras sutis (`box-shadow: 0 10px 30px rgba(0,0,0,0.05)`).

---

## 2. ✨ Dinamismo e Vida (JavaScript Avançado)

O iniciante usa JS para alertas. O avançado usa JS para **experiência**.

### Regras de Animação:
- **Intersection Observer**: Não carregue animações de uma vez. se a API para disparar classes CSS quando o elemento entrar na tela.
- **Transições Suaves**: Use `requestAnimationFrame` ou classes de transição (`transform` e `opacity`) para evitar *jank* (travamentos).

**Exemplo de Observer para Animação:**


---

## 3. 🛡️ O Poder do Backend (PHP com MySQLi)

**IMPORTANTE**: Aqui, nunca usamos PDO. O padrão ouro é o **MySQLi com Prepared Statements**.

### Por que Prepared Statements?
Iniciantes concatenam variáveis em strings SQL (vulnerável a SQL Injection). O nível avançado separa a **lógica SQL** dos **dados**.

### O Fluxo Profissional (mysqli + bind_param):
1. **Preparar**: O banco "entende" a consulta antes de receber os dados.
2. **Vincular (Bind)**: Você diz quais variáveis vão nos lugares dos `?`.
3. **Executar**: O banco processa com segurança.

**Exemplo Avançado de Cadastro:**
```php
<?php
// config.php - Conexão
$conexao = mysqli_connect('localhost', 'root', '', 'meu_banco');

// Dados vindos do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

// 1. Prepara a query com placeholders (?)
$sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    // 2. Vincula os parâmetros (s = string, i = integer, d = double, b = blob)
    mysqli_stmt_bind_param($stmt, "ss", $nome, $email);

    // 3. Executa
    if (mysqli_stmt_execute($stmt)) {
        echo "Sucesso!";
    } else {
        echo "Erro na execução: " . mysqli_error($conexao);
    }

    // 4. Fecha o statement
    mysqli_stmt_close($stmt);
}
?>
```

---

## 4. 🔗 Integração: O Ciclo Completo

Para ser um desenvolvedor avançado, você deve conectar essas camadas usando **Fetch API** no JavaScript para enviar dados ao PHP sem recarregar a página (AJAX).

1. **Frontend (JS)**: Coleta dados e faz um `fetch()` para o PHP.
2. **Backend (PHP)**: Recebe, valida e salva usando `mysqli_prepare`.
3. **Resposta (JSON)**: O PHP retorna um JSON, e o JS anima o sucesso na tela.

---

## 🛑 Regras Proibidas para o Antigravity:
1. **NUNCA** use `mysql_query` ou funções depreciadas.
2. **NUNCA** use PDO neste projeto (conforme regra do usuário).
3. **NUNCA** use estilos inline no HTML.
4. **NUNCA** deixe o código PHP sem tratamento de erros.
