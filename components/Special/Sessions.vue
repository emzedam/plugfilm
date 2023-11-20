<template>
  <section aria-labelledby="Genre-heading">
    <div
      class="w-full px-4 mx-auto sm:px-6 lg:px-8 lg:pt-3 md:mt-20 xs:mt-20 sm:mt-20"
    >
      <div class="pb-2 md:flex md:items-center md:justify-between">
        <h2
          id="favorites-heading"
          class="lg:text-2xl font-bold tracking-tight text-white"
        >
          <i
            class="fa-duotone fa-rectangle-history-circle-plus pl-2 text-red-500"
          ></i>
          قسمت ها
        </h2>
      </div>
      <div class="mt-4">
        <ul class="w-full h-full" v-if="medias != null">
          <div class="swiper Episod" ref="swiper">
            <div class="swiper-wrapper">
              <li
              v-for="(media, index) in medias"
                :key="index"
                @click="$nuxt.$emit('onlinePlay', media.finalHlsUrl == null ? {type:'mp4' , url: media.finalMp4Url} : {url: media.finalHlsUrl , type: 'hls'} )" 
                class="flex bg-transparent swiper-slide">
                <div
                  class="flex items-center justify-center w-16 h-16 bg-red-800 text-white text-2xl font-medium rounded-r-md text-center"
                >
                  <i class="fa-duotone fa-rectangle-vertical-history"></i>
                </div>
                <div
                  class="flex flex-1 items-center justify-between truncate rounded-l-md bg-secondary"
                >
                  <div
                    class="flex-1 truncate px-4 py-2 text-lg w-16 h-full items-center flex"
                  >
                    <a href="javascript:void(0)" class="font-medium text-white hover:text-ptext"
                      >{{ media.title }}</a
                    >
                  </div>
                </div>
              </li>
            </div>
            <div class="swiper-button-next"></div>
            <!-- <div class="swiper-button-prev"></div> -->
          </div>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";
export default {
  name: "Sessions",
  props: {
    detail: {
      type: [Array, Object],
      required: true,
    },
    medias: {
      type: [Array, Object],
      required: true,
    },
  },
  async mounted() {
    await this.$nextTick();
    new Swiper(this.$refs.swiper, {
      autoHeight: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      spaceBetween: 10,
      breakpoints: {
        3440: {
          slidesPerView: 9,
        },
        1199: {
          slidesPerView: 4,
        },
        991: {
          slidesPerView: 4,
        },
        600: {
          slidesPerView: 3,
          grabCursor: true,
        },
        412: {
          slidesPerView: 2,
          grabCursor: true,
        },

        375: {
          slidesPerView: 2,
          grabCursor: true,
        },
        360: {
          slidesPerView: 2,
          grabCursor: true,
        },
        344: {
          slidesPerView: 2,
          grabCursor: true,
        },
      },
      keyboard: true,
    });
  },
};
</script>

<style scoped>
.circle_play_sessions {
  border-radius: 100%;
  padding: 4px 8px;
  background: #1cc749;
  margin-right: 4px;
}

.circle_play_sessions:hover i {
  color: #fff !important;
  transition: all 0.3s ease-in;
}

.menu-cat ul li:hover a {
  color: #fff !important;
}

.menu-cat ul li {
  border-right: 2px solid #1cc749;
}
</style>
