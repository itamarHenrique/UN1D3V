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
          <tr v-for="jogador in jogadores">
            <td>{{ jogador.nomeTime }}</td>
            <td>{{ jogador.nomeJogador }}</td>
            <td>{{ jogador.cpfJogador }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import CardInput from './components/CardInput.vue';
import InputCpf from './components/InputCpf.vue';
import InputJogador from './components/InputJogador.vue';

export default {
components: {
    CardInput,
    InputJogador,
    InputCpf
  },

  data() {
    return {
      textoInicio: 'Bem-vindo ao gestor da SuperLiga',
      textoPadraoTime: 'Qual o nome do time?',
      textoPadraoNome: 'Nome do jogador',
      textoCPF: 'CPF',

      jogadores: [],
      nomeTime: "",
      nomeJogador: "",
      cpfJogador: ""
    };
  },

  methods: {
    validaTamanho() {
      console.log(`Validação: nomeTime = "${this.nomeTime}", nomeJogador = "${this.nomeJogador}"`);
      if (this.nomeTime.length < 3 || this.nomeJogador.length < 2) {
        return false;
      }
      return true; 
    },
    
    Addjogador() {
      if (!this.validaTamanho()) {
        alert("Erro: O nome do time deve ter pelo menos 3 caracteres e o nome do jogador pelo menos 2 caracteres.");
        return; 
      }

      this.jogadores.push({
        nomeTime: this.nomeTime,
        nomeJogador: this.nomeJogador,
        cpfJogador: this.cpfJogador
      });

      this.nomeTime = '';
      this.nomeJogador = '';
      this.cpfJogador = '';
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