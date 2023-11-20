<template>
  <div>
        <Partials v-if="moviesContent != null" :content="moviesContent" />
  </div>

</template>

<script>

import { mapGetters , mapActions } from 'vuex'

import Partials from '@/components/Home/Partials/Partials.vue'


export default {
  name: 'IndexPage',
  middleware: ['init'],  //,'irContents' 'getCats'
  head() {
    return {
      script: [
        // { type: 'text/javascript', src: '/js/swiper-bundle.min.js', body: true , defer:true },
        // { type: 'text/javascript', src: '/js/swiper.js', body: true, defer:true }
      ]
    }
  },
  layout: 'home',
  data(){
    return {
      moviesContent: null,
      sliderMovie: null
    }
  },
  // mounted(){
  //   console.log(this.updates);
  // },
  fetch(){
    
    //set Top Slider  
    this.sliderMovie = this.new_contents.slice(0 , 3)

    
    this.moviesContent = {
      movies: this.movies,
      series: this.series,
      newers: this.new_contents,
      animations: this.animations,
      doubleha: this.doubleha,
      fears: this.fears,
      imdbs: this.imdbs,
      fantezi: this.fantezi
    }
    
  },
  computed: {
    ...mapGetters({
      // contents: 'get_contents',
      movies: 'get_movies',
      series: 'get_series',
      new_contents: 'get_newers',
      animations: 'get_animations',
      doubleha: 'get_doubleha',
      fears: 'get_fears',
      imdbs: 'get_imdbs',
      fantezi: 'get_fantezi',
      categories: 'get_categories',
    })
  },
  components: {
    Partials
  }
}
</script>

<style>
.swal2-popup{
  background-color: #292929 !important;
}
.swal2-content , .swal2-title{
  color:#fff !important;
}

.swal2-popup .swal2-styled.swal2-confirm{
  background-color: #FF9800 !important;
    border-left-color: #FF9800 !important;
    border-right-color: #FF9800 !important;
}


.swiper-slide{
  height:auto !important;
}


</style>
