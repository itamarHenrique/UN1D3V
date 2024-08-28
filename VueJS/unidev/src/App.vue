<template>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <Card texto="E ai, blz?" :preco=20 />
        <Card texto="Salve coisa louca!" :preco=18 :desconto="50" />
    
        
        <h1>Bem-vindo ao {{nomeDoAplicativo}}</h1><br>
        <div>Você clicou no botão <span :class="backgroundContador">{{ contador }}</span> vez(es)</div><br>
        <button @click="atualizarContador">Clique aqui</button>
      </div>
  </div>
</div>
  
  


</template>

<script>
import Card from './components/Card.vue';


export default{
  components: {
    Card
  },
  data(){ //Tudo que for variavel/coisa estatica, vai ficar dentro do data
    return {
      nomeDoAplicativo: 'VueTech APP',
      contador: 0,
      backgroundContador: 'ok'
    }
  },
  methods: { //Tudo que for ação, vai ficar dentro do methods
    atualizarContador(){
      this.contador++
    }
  },
  watch: {

    contador(newValue, oldValue){
      this.backgroundContador = this.contador < 8 ? 'ok' : 'cuidado'
    }

  }
}

</script>

<style scoped>


.ok{
  background-color: greenyellow;
}

.cuidado{
  background-color: beige;
}
</style>