// Este código faz animações simples quando a página carrega
// Foi feito de um jeito fácil para quem está começando a estudar!

window.onload = function() {
    
    // 1. ANIMAÇÃO DE ENTRADA
    // Vamos pegar todos os formulários e tabelas da página
    var todosOsElementos = document.querySelectorAll('form, table, .summary-card');
    
    // Para cada elemento que a gente encontrou...
    todosOsElementos.forEach(function(item) {
        // Primeiro, deixamos ele invisível e um pouco para baixo
        item.style.opacity = "0";
        item.style.transform = "translateY(30px)";
        item.style.transition = "all 0.8s"; // Faz a mudança ser suave
        
        // Depois de um tempinho (100 milisegundos), mostramos ele
        setTimeout(function() {
            item.style.opacity = "1";
            item.style.transform = "translateY(0)";
        }, 100);
    });

    // 2. SISTEMA DE AVISO (ALERTA)
    // Vamos ver se tem alguma mensagem de sucesso ou alerta na URL
    var enderecoDaPagina = new URLSearchParams(window.location.search);
    
    if (enderecoDaPagina.has('success') || enderecoDaPagina.has('alerta')) {
        mostrarAvisoNaTela();
    }
};

// Esta função cria uma caixinha de aviso no topo da tela
function mostrarAvisoNaTela() {
    var parametros = new URLSearchParams(window.location.search);
    var texto = "";
    var corDeFundo = "green"; // Cor padrão

    // Se for sucesso, a mensagem é verde
    if (parametros.get('success') === 'true') {
        texto = "Concluído com Sucesso!";
        corDeFundo = "#28a745";
    } 
    // Se for estoque baixo, a mensagem é amarela
    else if (parametros.get('alerta') === 'estoque_baixo') {
        texto = "Atenção: Estoque Baixo!";
        corDeFundo = "#ffc107";
    }

    // Se tiver alguma mensagem para mostrar...
    if (texto !== "") {
        // Criamos um novo elemento (uma div)
        var caixa = document.createElement('div');
        caixa.innerText = texto;
        
        // Colocamos o estilo da caixinha (visual)
        caixa.style.position = "fixed";
        caixa.style.top = "20px";
        caixa.style.right = "20px";
        caixa.style.padding = "15px 30px";
        caixa.style.backgroundColor = corDeFundo;
        caixa.style.color = (corDeFundo === "#ffc107") ? "black" : "white";
        caixa.style.borderRadius = "5px";
        caixa.style.fontWeight = "bold";
        caixa.style.zIndex = "9999";
        caixa.style.boxShadow = "0 2px 10px rgba(0,0,0,0.2)";

        // Adicionamos a caixinha no site
        document.body.appendChild(caixa);

        // Depois de 3 segundos, a caixinha some
        setTimeout(function() {
            caixa.style.display = "none";
        }, 3000);
    }
}
