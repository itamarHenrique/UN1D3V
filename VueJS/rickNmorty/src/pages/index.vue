<template>
  <v-card-text>
    <v-select
    label="Lista de Episódios"
    :items="episodios.map(epi => epi.name)"
    v-model="episodioSelecionado"
    @change="carregaDetalhesEpisodio"
    variant="solo-filled"
    >

    </v-select>
  </v-card-text>

  <v-card
    class="mx-auto"
    max-width="344"
    title="Personagens: "
  >

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
      detalheDoEpisodio: null
    };
  },
  mounted() {
    this.carregarEpisodios();
  },
  methods: {
    carregarEpisodios() {
      const url = 'https://rickandmortyapi.com/api/episode';
      axios
        .get(url)
        .then(response => {
          this.episodios = response.data.results;
          console.log('Episódios carregados:', this.episodios);
        })
        .catch(error => {
          console.log(error);
        });
},
    carregaDetalhesEpisodio() {
      const episodio = this.episodios.find(ep => ep.name === this.episodioSelecionado);

      console.log('Episódio selecionado:', this.episodioSelecionado);
      console.log('Episódio encontrado:', episodio);

      if (episodio && episodio.id) {
        const url = `https://rickandmortyapi.com/api/episode/${episodio.id}`;
        console.log('URL de requisição:', url);

        axios
          .get(url)
          .then(response => {
            this.detalheDoEpisodio = response.data;
            console.log('Detalhes do episódio:', this.detalheDoEpisodio);
            this.carregaPersonagens(response.data.characters);
          })
          .catch(error => {
            console.log('Erro na requisição do episódio:', error);
          });
      } else {
        console.log('Episódio não encontrado ou sem ID.');
      }
},
      carregaPersonagens(urls) {
        console.log('URLs recebidas para personagens:', urls);

        const requisicoes = urls.map(url => axios.get(url));

        Promise.all(requisicoes)
          .then(responses => {
            console.log('Respostas das requisições:', responses);
            this.personagens = responses.map(response => response.data);
            console.log('Personagens carregados:', this.personagens);
          })
          .catch(error => {
            console.log('Erro ao carregar personagens:', error);
          });
}

  }
};
</script>
