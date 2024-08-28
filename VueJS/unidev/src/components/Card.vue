<template>
    
    <div class="card">
        <h1>{{ texto }}</h1>
        <p :class="{verde: temDesconto}" >Preco: R$ {{ precoFinal }}</p>
    </div>
</template>



<script>

export default{
    props: {
        texto: String,
        preco: {
            type: Number,
            required: true
        },
        desconto: Number
    },
    data(){
        return{

        }
    },
    computed: {
        precoFinal(){
            if(this.desconto > 0){
                return this.preco * this.desconto / 100    
            }

            return this.preco
            
        },
        temDesconto(){
            return this.desconto;
        }
    }

}
</script>

<style scoped>


.card{
    padding: 30px;
    background-color: aliceblue;
    border-radius: 15px;
    color: #666; 
    margin-bottom: 7px;
}

.verde{
    color: green;
}
</style>