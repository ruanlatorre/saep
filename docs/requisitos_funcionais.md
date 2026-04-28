# Lista de Requisitos Funcionais (Entrega 1)

O sistema de gerenciamento de estoque (SAEP) possui as seguintes funcionalidades obrigatórias:

| ID | Requisito Funcional | Descrição |
|:---|:---|:---|
| **RF01** | Autenticação de Usuário | O sistema deve permitir que usuários cadastrados façam login usando usuário e senha. |
| **RF02** | Cadastro de Produtos | O sistema deve permitir o registro de novos produtos (tipo, modelo, série, data, quantidade e preço). |
| **RF03** | Listagem de Produtos | O sistema deve exibir uma tabela com todos os produtos cadastrados no banco de dados. |
| **RF04** | Edição de Produtos | O sistema deve permitir alterar as informações de um produto já existente. |
| **RF05** | Exclusão de Produtos | O sistema deve permitir a remoção de produtos do banco de dados com confirmação. |
| **RF06** | Fluxo de Entrada/Saída | O sistema deve permitir registrar movimentações de entrada e saída de estoque. |
| **RF07** | Atualização Automática | Ao registrar uma entrada ou saída, o saldo total do produto deve ser atualizado automaticamente. |
| **RF08** | Alerta de Estoque Baixo | O sistema deve emitir um alerta visual (Toast/Notificação) caso o estoque de um produto seja menor que 5 unidades. |
| **RF09** | Histórico de Movimentações | O sistema deve manter um log (histórico) de todas as entradas e saídas realizadas. |
| **RF10** | Resumo de Operação | Após cada fluxo de estoque, o sistema deve exibir um resumo dos dados do produto e seu status atual. |
