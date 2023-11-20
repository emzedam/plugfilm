<template>
  <section class="movies-slider overflow-hidden relative mx-auto max-w-7xl" v-if="medias.length > 1">
      <header
        class="flex items-center justify-between py-8 w-full overflow-hidden relative"
      >
        <div class="flex items-center justify-between">
          <h2 class="text-md text-white">قسمت ها</h2>
        </div>
        <div class="slider-btn pr-0 relative overflow-hidden items-center flex">
          <div
            class="arrow-slider flex items-center w-16 justify-between text-white"
          >
            <div class="prev0 w-10 cursor-pointer">
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="next0 w-10 cursor-pointer">
              <i class="fa-solid fa-chevron-left"></i>
            </div>
          </div>
        </div>
      </header>
      <div
        ref="swiper_sessions"
        class="relative swiper"
      >
        <div class="swiper-wrapper">
          <a
            v-for="(media, index) in medias"
            :key="index"
            
            href="javascript:void(0)"
            class="swiper-slide relative overflow-hidden bg-secondary border border-gray-700 text-right text-white hover:bg-gray-600/50 duration-300 transition-all rounded-lg p-6 flex items-center justify-between"
          >
            <div
            @click="
              $nuxt.$emit(
                'onlinePlay',
                media.finalHlsUrl == ''
                  ? { type: 'mp4', url: media.finalMp4Url }
                  : { url: media.finalHlsUrl, type: 'hls' }
              )
            "
            class="bg-right bg-nr/100 absolute left-0 top-0 w-2/4 h-full rounded-s-2xl hue-rotate-15"
            ></div>
            <i v-if="allowForDownload == false" class="fa-duotone fa-film-canister text-3xl"></i>
            <a v-if="allowForDownload == true" target="_blank" :href="media.mediaUrl2" class="fa-duotone fa-download text-3xl border py-2 px-3 rounded-lg"></a>
            <span class="z-20 relative" @click="
              $nuxt.$emit(
                'onlinePlay',
                media.finalHlsUrl == ''
                  ? { type: 'mp4', url: media.finalMp4Url }
                  : { url: media.finalHlsUrl, type: 'hls' }
              )
            ">{{ media.title }}</span>
          </a>
        </div>

      </div>
    </section>
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";

export default {
  name: "Sessions",
  data: () => ({
    allowForDownload: false
  }),
  props: {
    detail: {
      type: [Array, Object],
      required: true,
    },
    medias: {
      type: [Array, Object],
      required: true,
      default: []
    },
  },
  async mounted() {
    await this.$nextTick();
    if(this.$store.state.activePurchase != null) {
      this.allowForDownload = true
    }

    new Swiper(this.$refs.swiper_sessions, {
        slidesPerView: 7,
        dir: "rtl",
        spaceBetween: 10,
        navigation:{ nextEl: '.next0', prevEl: '.prev0' },
        breakpoints:{
          3000: {
            slidesPerView: 7,
            spaceBetween: 20,
          },
          1920: {
            slidesPerView: 5,
            spaceBetween: 20,
          },
          1400: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
          1200: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          320: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
        }
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
