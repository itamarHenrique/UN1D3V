<template>
    <div>
        <input type="text" id="nomeTime" v-model="nomeTime">
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
            nomeTime: this.texto
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