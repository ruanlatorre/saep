# Descritivo de Casos de Teste de Software (Entrega 8)

Estes testes visam garantir a integridade e o correto funcionamento das regras de negócio do sistema.

| Caso de Teste | Objetivo | Passos | Resultado Esperado |
|:---|:---|:---|:---|
| **CT01 - Login** | Validar acesso | 1. Inserir usuário/senha válidos.<br>2. Clicar em Entrar. | Redirecionamento para a Home. |
| **CT02 - Cadastro** | Validar registro | 1. Preencher todos os campos do produto.<br>2. Clicar em Cadastrar. | Mensagem de sucesso e item na tabela. |
| **CT03 - Entrada** | Validar soma estoque | 1. Escolher produto.<br>2. Tipo: Entrada.<br>3. Qtd: 10.<br>4. Salvar. | Estoque atual deve aumentar em 10. |
| **CT04 - Saída** | Validar subtrair estoque | 1. Escolher produto.<br>2. Tipo: Saída.<br>3. Qtd: 5.<br>4. Salvar. | Estoque atual deve diminuir em 5. |
| **CT05 - Alerta** | Validar aviso de baixo estoque | 1. Deixar estoque com 4 unidades.<br>2. Realizar qualquer fluxo. | Exibição da notificação de "Estoque Baixo". |
| **CT06 - Histórico** | Validar log | 1. Realizar uma saída.<br>2. Acessar tela de Histórico. | A movimentação deve aparecer no topo da lista. |
| **CT07 - Edição** | Validar update | 1. Editar nome do produto na tabela.<br>2. Salvar. | O novo nome deve ser exibido na listagem. |
| **CT08 - Exclusão** | Validar remoção | 1. Clicar em excluir.<br>2. Confirmar no popup. | O produto deve sumir da tabela e do banco. |
