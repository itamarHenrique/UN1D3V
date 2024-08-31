<template>
  <div class="container">
    <div class="header">
      <h1>{{ textoInicio }}</h1>
      <hr class="divisao">
    </div>
    <div class="form-section">
      <div class="form-grupo">
        <h4>{{ textoPadraoTime }}</h4>
        <input type="text" id="nomeTime" v-model="nomeTime">
      </div>
      <div class="form-grupo-lista">
        <div class="form-grupo">
          <h4>{{ textoPadraoNome }}</h4>
          <input type="text" id="nomeJogador" v-model="nomeJogador">
        </div>
        <div class="form-grupo">
          <h4>{{ textoCPF }}</h4>
          <input type="text" id="cpfJogador" v-model="cpfJogador">
        </div>
        <div class="form-grupo botao">
          <button v-on:click="Addjogador" type="submit" class="btn-small-submit">Cadastrar jogadores</button>
        </div>
      </div>
      <div v-if="mensagemErro" class="error-message">
        {{ mensagemErro }}
      </div>
    </div>
    <div class="list-section">
      <h3>Lista de jogadores</h3>
      <hr class="divisao">
      <table>
        <thead>
          <tr>
            <th scope="col">Nome</th> 
            <th scope="col">Time</th>
            <th scope="col">CPF</th>
            <hr class="divisao">
          </tr>
        </thead>
        <tbody>
          <div v-if="mensagemCadastro" class="error-message">
            {{ mensagemCadastro }}
          </div>
          <tr v-for="jogador in jogadores">
            <td>{{ jogador.nomeJogador }}</td>
            <td>{{ jogador.nomeTime }}</td>
            <td>{{ jogador.cpfJogador }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      textoInicio: 'Bem-vindo ao gestor da SuperLiga',
      textoPadraoTime: 'Qual o nome do time?',
      textoPadraoNome: 'Nome do jogador',
      textoCPF: 'CPF',

      jogadores: [],
      nomeTime: "",
      nomeJogador: "",
      cpfJogador: "",
      mensagemErro: "",
      mensagemCadastro: ''
    };
  },

  mounted() {
    this.validandoJogadoresCadastrados();
  },

  methods: {
    formatarCPF(cpf) {
      if (!cpf) return '';
      cpf = cpf.replace(/\D/g, ''); // Remove tudo que não é dígito
      cpf = cpf.padStart(11, '0'); // Garante que tenha 11 dígitos
      return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    },

    validaTamanho() {
      if (this.nomeTime.length < 3 || this.nomeJogador.length < 2 ||  this.cpfJogador.length != 11) {
        return false;
      }
      return true; 
    },

    validarTimeCom5Jogadores() {
      const jogadoresDoTime = this.jogadores.filter(jogador => jogador.nomeTime === this.nomeTime);
      if (jogadoresDoTime.length >= 5) {
        this.mensagemErro = `Erro: O time "${this.nomeTime}" já possui 5 jogadores cadastrados.`;
        return false;
      }
      this.mensagemErro = '';
      return true;
    },

    validandoJogadoresCadastrados(){
      if(this.jogadores.length == 0){
        this.mensagemCadastro = 'Ops: Ainda não há jogadores cadastrados';
      } else {
        this.mensagemCadastro = '';
      }
    },

    limparCampos() {
      this.nomeTime = '';
      this.nomeJogador = '';
      this.cpfJogador = '';
    },

    Addjogador() {
      if (!this.validaTamanho()) {
        this.mensagemErro = "Erro: O nome do time deve ter pelo menos 3 caracteres, o nome do jogador deve ter pelo menos 2 caracteres e o CPF tem que ter 11 caracteres.";
        return;
      }

      if (!this.validarTimeCom5Jogadores()) {
        return;
      }

      this.jogadores.push({
        nomeTime: this.nomeTime,
        nomeJogador: this.nomeJogador,
        cpfJogador: this.formatarCPF(this.cpfJogador)
      });

      this.validandoJogadoresCadastrados(); // Chama a validação após adicionar um jogador
      this.limparCampos();
    }
  }
};

</script>

<style scoped>

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f8f8f8;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header {
  text-align: center;
  margin-bottom: 20px;
}

.divisao {
  margin: 10px 0;
  border: 1px solid #ddd;
}

.form-section {
  margin-bottom: 20px;
}

.list-section{
  margin-top: 30px;
  padding: 15px;
  background-color: #ffffff;
  border-radius: 8px;
}

.form-grupo {
  margin-bottom: 15px;
}

.form-grupo h4 {
  margin-bottom: 5px;
  color: #333;
}

.form-grupo-lista {
  display: flex;
  align-items: flex-end; /* Alinha os elementos ao final */
  justify-content: space-between;
}

.form-grupo-lista .form-grupo {
  flex: 1;
  margin-right: 10px;
}

.form-grupo-lista .botao {
  margin-right: 0;
}

.btn-small-submit {
  padding: 5px 10px; 
  font-size: 14px;  
  border-radius: 4px;
  background-color: #007bff;
  color: white; 
  border: none; 
  cursor: pointer;
}

input{
    margin-top: 10px;
    margin-bottom: 5px;
    padding: 10px;
    border-radius: 5px;
    border: 2px solid #000;
}

table{
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 12px;
}

th{
  padding: 8px;
  text-align: left;
  border-bottom: 3px;
  background-color: #f4f4f4;
  font-weight: bold;
}

td{
  padding: 8px;
  text-align: left;
  border-bottom: 3px;
}

</style>