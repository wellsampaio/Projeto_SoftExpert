const app = Vue.createApp({
  data() {
    return {
      produtos: [], // Array para armazenar os nomes dos produtos
      items: [{ produto: '', tipoproduto: '', preco: '', icms: '', pis: '', cofins: '', qtde: '1', total_item: '', total_item_imposto: '' }], // Array de itens
      totalGeral: 0,
      totalGeralImposto: 0
    }
  },
  methods: {
    async adicionarItem() {
      // Adicionar um novo item ao array de items
      this.items.push({ produto: '', tipoproduto: '', preco: '', icms: '', pis: '', cofins: '', qtde: '1', total_item: '', total_item_imposto: '' });
      this.calcularTotalGeral();
      this.calcularTotalGeralImposto();  // Chama a função para recalcular o total geral
    },
    async carregarDados(index) {
      const selectedProduto = this.items[index].produto;
      const urlProduto = urlGlobal + '/api/produtos/' + encodeURIComponent(selectedProduto);
      const request = await fetch(urlProduto);
      const response = await request.json();
      
      if (response.length > 0) {
        const produtoSelecionado = response[0];
        this.items[index].tipoproduto = produtoSelecionado.tipoproduto;
        this.items[index].preco = produtoSelecionado.preco;
        this.items[index].icms = produtoSelecionado.icms;
        this.items[index].pis = produtoSelecionado.pis;
        this.items[index].cofins = produtoSelecionado.cofins;
        this.calcularTotal(index); // Calcula o total 
        this.calcularTotalImposto(index); // Calcula o total do imposto
        this.calcularTotalGeral();// Chama a função para recalcular o total geral 
        this.calcularTotalGeralImposto(); // Chama a função para recalcular o total geral imposto
      } else {
        console.error('Nenhum produto encontrado com o nome selecionado.');
      }
    },

    removerItem(index) {
      // Remover o item da lista de itens
      this.items.splice(index, 1);
      this.calcularTotalGeral();
      this.calcularTotalGeralImposto();
    },
    calcularTotal(index) {
      const preco = parseFloat(this.items[index].preco);
      const qtde = parseFloat(this.items[index].qtde);
      if (!isNaN(preco) && !isNaN(qtde)) {
        this.items[index].total_item = (preco * qtde).toFixed(2);
        this.calcularTotalGeral(); // Chama a função para recalcular o total geral
      }
    },
    calcularTotalImposto(index) {
      const icms = parseFloat(this.items[index].icms);
      const pis = parseFloat(this.items[index].pis);
      const cofins = parseFloat(this.items[index].cofins);
      if (!isNaN(icms) && !isNaN(pis) && !isNaN(cofins)) {
        this.items[index].total_item_imposto = (icms + pis + cofins).toFixed(2);
        this.calcularTotalGeral(); // Chama a função para recalcular o total geral
      }
    },

    calcularTotalGeral() {
      // Calcula o total geral somando todos os total_item
      this.totalGeral = this.items.reduce((acc, curr) => acc + parseFloat(curr.total_item || 0), 0).toFixed(2);
    },

    calcularTotalGeralImposto() {
      // Calcula o total geral imposto somando todos os total_item_imposto
      this.totalGeralImposto = this.items.reduce((acc, curr) => acc + parseFloat(curr.total_item_imposto || 0), 0).toFixed(2);
    }
  },
  mounted() {
    // Carregar os produtos disponíveis da api
    const urlProdutos = urlGlobal + '/api/produtos';
    fetch(urlProdutos)
      .then(response => response.json())
      .then(data => this.produtos = data.map(produto => produto.produto)) // Apenas mapeie os nomes dos produtos
      .catch(error => console.error('Erro ao carregar produtos:', error));
  }
});


app.mount('#app');
