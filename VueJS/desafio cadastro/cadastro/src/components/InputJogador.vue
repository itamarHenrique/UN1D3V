<template>
    <div>
        <input type="text" id="jogadorNome" v-model="nomeJogador"> 
    </div>
    

</template>

<script>

export default{
    props: {
        texto: {
            type: String,
            required: true
        }
    }, data(){
        return{
            nomeJogador: this.texto
        }
    }
}

</script>

<style scoped>

input{
    margin-top: 10px;
    margin-bottom: 5px;
    padding: 10px;
    border-radius: 5px;
    border: 2px solid #000;
}

</style>