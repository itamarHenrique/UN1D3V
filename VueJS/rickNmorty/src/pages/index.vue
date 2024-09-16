<template>

  <v-combobox class="mx-auto my-8"
  label="Lista de Episódios"
  :items="episodios.map(ep => ep.name)"
  v-model="episodioSelecionado"
  @change="carregaDetalhesEpisodio"
  ></v-combobox>


<v-card
    class="mx-auto my-8"
    elevation="16"
    max-width="344"
  >
    <v-card-item>
      <v-card-title>
        Personagens:
      </v-card-title>
    </v-card-item>

    <v-img
      v-if="detalheEpisodios"
      :src="detalheEpisodios.image"
      aspect-ratio="1"
    ></v-img>


      <v-list>
        <v-list-item
          v-for="personagem in personagens"
          :key="personagem.id"
        >
          <v-avatar>
            <v-img :src="personagem.image" />
          </v-avatar>


            <v-list-item-title>{{ personagem.name }}</v-list-item-title>
            <v-list-item-subtitle>Last known location: {{ personagem.location.name }}</v-list-item-subtitle>
            <v-list-item-subtitle>First seen in: {{ personagem.episode[0] }}</v-list-item-subtitle>

        </v-list-item>
    </v-list>
  </v-card>


</template>

<script>

import axios from 'axios';

  export default {
    data() {
      return {
        episodios: [],
        personagens: [],
        episodioSelecionado: null,
        carregaDetalhes: null,
        detalheEpisodios: null
      }
    },
    mounted() {
      this.carregarEpisodios()
    },
    methods: {
      carregarEpisodios(){
          const url = 'https://rickandmortyapi.com/api/episode'

        axios.get(url)
        .then( response => {
          this.episodios = response.data.results;
        }).catch( error => {
          console.log(error)
        })

      },

      carregaDetalhesEpisodio() {
      const episodio = this.episodios.find(ep => ep.name === this.episodioSelecionado);

      if (episodio) {
        const url = `https://rickandmortyapi.com/api/episode/${episodio.id}`;

        axios.get(url)
          .then(response => {
            this.carregaDetalhes = response.data;
            this.carregaDetalhesPersonagens(response.data.characters);
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    carregaDetalhesPersonagens(personagensUrls) {
      const requisicoes = personagensUrls.map(url => axios.get(url));

      Promise.all(requisicoes)
        .then(response => {
          this.personagens = response.map(res => res.data);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
}
</script>
