<template>
  <main>
    
    <HeaderSlider v-if="content.newers != null" :sliderMovie="content.newers"  />
    <CatSlider v-if="categories != null" :categories="categories"/>
    <Sinamayi v-if="content.movies != null" :movies="content.movies" />
    <Serials v-if="content.series != null" :series="content.series" />
    <Newer v-if="content.newers != null" :newers="content.newers" /> 
    <Special v-if="content.newers.length != 0" :content="content.newers[1]" :bgSpecial="['after:bg-gradient-to-l after:from-indigo-800/100 after:via-indigo-800/100 after:to-indigo-800/40']"/> 
    <Animations v-if="content.animations != null" :animations="content.animations" />
    <Doubleha v-if="content.doubleha != null" :specials="content.doubleha" /> 
    <Special v-if="content.newers.length != 0" :content="content.newers[2]" :bgSpecial="['after:bg-gradient-to-l after:from-green-600/100 after:via-green-600/100 after:to-green-600/40']" /> 
    <Fears v-if="content.fears.length != 0" :fears="content.fears" /> 
    <Imdbs v-if="content.imdbs != null" :imdbs="content.imdbs" />
    <Special v-if="content.newers.length != 0" :content="content.newers[3]" :bgSpecial="['after:bg-gradient-to-l after:from-[#af1919]/100 after:via-[#af1919]/100 after:to-[#af1919]/40']" /> 
    <Fantezi v-if="content.fears.length != 0" :fantezi="content.fantezi" />
    
  </main>
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";

import IconPlay from "@/components/Icons/IconPlay.vue";
import Play2 from "@/components/Icons/play2.vue";

import HeaderSlider from "@/components/Home/HeaderSlider/HeaderSlider.vue";
import Sinamayi from "@/components/Home/Partials/Sinamayi.vue";
import Serials from "@/components/Home/Partials/Serials.vue";
import Newer from "@/components/Home/Partials/Newer.vue";
import Animations from "@/components/Home/Partials/Animations.vue";
import Doubleha from "@/components/Home/Partials/Doubleha.vue";
import Fears from "@/components/Home/Partials/Fears.vue";
import Imdbs from "@/components/Home/Partials/Imdbs.vue";
import Fantezi from "@/components/Home/Partials/Fantezi.vue";
import Special from "@/components/Home/Partials/Special.vue";
import CatSlider from "@/components/Home/Partials/CatSlider.vue";

import { mapGetters } from "vuex";

export default {
  name: "Partials",
  props: {
    content: {
      type: [Array, Object],
      required: true,
    },
  },
  data() {
    return {
      irMovies: null,
      irSeries: null,
      zhanerFilms: null,
      zhanerSerial: null,
      specialContent: null,
    };
  },
  async mounted() {
    console.log(this.content)
    new Swiper(this.$refs.swiper, {
      spaceBetween: 5,
      slidesPerView: 1,
      dir: "ltr",
      loop: false,
      navigation: true,
      pagination: { clickable: true },
    });

  },
  async fetch() {
    // const randomFilm = Math.floor(1 + Math.random() * 178);

    // set irani content
    // if (this.content.irMovies != null) {
    //   this.irMovies = this.content.irMovies;
    // }

    await this.getDetail();
  },
  components: {
    IconPlay,
    Play2,
    HeaderSlider,
    Sinamayi,
    Serials,
    Newer,
    Animations,
    Doubleha,
    Fears,
    Imdbs,
    Fantezi,
    Special,
    CatSlider
  },
  computed: {
    ...mapGetters({
      categories: "get_categories",
    }),
  },
  methods: {
    async getDetail() {
      const id = 1;
      const get_data = await this.$store.dispatch(
        "get_special_content_details",
        id
      );
      if (get_data.specialDetail.length != 0) {
        this.specialContent = get_data.specialDetail;
      }
    },
  },
};
</script>
