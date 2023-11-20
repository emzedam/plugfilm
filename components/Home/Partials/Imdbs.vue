<template>
  <section class="movies-slider my-20 px-6 overflow-hidden relative">
    <header
      class="flex items-center justify-between py-8 w-full mx-auto lg:max-w-7xl  overflow-hidden relative"
    >
      <div class="flex items-center justify-between">
        <h2 class="lg:text-2xl text-white">  امتیاز Imdb </h2>
        <span class="lg:text-xl text-sm mr-4 text-gray-200 flex items-center"
          ><nuxt-link to="/content/movies" class="lg:block hidden"
            >مشاهده بیشتر</nuxt-link
          ><i class="fa-solid fa-chevron-left text-nr lg:pr-2 text-xl"></i
        ></span>
      </div>
      <div class="slider-btn pr-0 relative overflow-hidden items-center flex">
        <div
          class="arrow-slider flex items-center w-16 justify-between text-white"
        >
          <div class="prev5 w-10 cursor-pointer">
            <i class="fa-solid fa-chevron-right"></i>
          </div>
          <div class="next5 w-10 cursor-pointer">
            <i class="fa-solid fa-chevron-left"></i>
          </div>
        </div>
      </div>
    </header>

    <div
      ref="swiper_imdbs"
      class="swiper relative overflow-visible md:w-[140%] sm:w-[140%] xs:w-[140%]  lg:w-full mx-auto  lg:max-w-7xl"
    >
      <div class="swiper-wrapper">
        <NuxtLink
          :to="`${slug_generator(movie.EnName)}-${movie.id}`"
          v-if="imdbs != null"
          v-for="(movie, index) in imdbs"
          :key="index"
          class="swiper-slide relative overflow-hidden"
        >
          <div class="w-full relative">
            <div
              class="cursor-pointer before:block before:pt-[150%] before:relative w-full h-full mb-[15px] relative shadow-md shadow-menu-mobile rounded-[30px] block before:rounded-[30px] before:bg-[url('/logo.png')] before:place-items-center before:justify-center before:bg-no-repeat before:items-center before:bg-opacity-10 before:bg-center before:bg-[length:150px_70px] shine"
            >
              <figure
                class="absolute inset-0 overflow-hidden after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 lg:after:rounded-[25px] after:bottom-0 after:bg-gradient-to-t after:from-secondary/30 after:via-secondary/10 after:to-secondary/10 after:h-full"
              >
                <img
                  :data-src="movie.Image"
                  onerror="javascript:this.src='/placeholder.svg'"
                  :alt="movie.FaName"
                  :title="movie.FaName"
                  v-lazy-load
                  class="rounded-[25px] w-full h-full object-cover"
                />

                <figcaption>
                  <div
                    class="imdb absolute left-3 top-3 justify-center flex items-center bg-secondary/30 backdrop-blur rounded-full w-10 h-10 cursor-pointer py-2 px-2 leading-[1px] shadow transition ease-in-out delay-150 font-en border-[2px] border-green-500 z-10"
                  >
                    <span
                      class="text-white justify-center items-center flex leading-[1px] text-sm"
                      >{{ movie.ImdbRate }}</span
                    >
                  </div>
                  <div
                    class="bookmark absolute right-3 top-3 justify-center flex items-center bg-secondary/20 backdrop-blur hover:bg-secondary/30 rounded-md lg:w-10 lg:h-10 w-8 h-8 cursor-pointer hover:!text-white shadow transition ease-in-out delay-150 text-white z-20"
                  >
                    <i class="fa-regular fa-bookmark"></i>
                  </div>
                  <div
                    class="play absolute place-content-center inset-0 flex items-center justify-center z-30"
                  >
                    <Play2 class="fill-white w-10" />
                  </div>
                  <div
                    class="category absolute bottom-4 z-30 text-gray-400 flex items-center justify-center inset-x-0 text-xs"
                  >
                    <ul
                      class="inline-flex gap-x-4 list-disc"
                      v-if="movie.categories.length != 0"
                    >
                      <li
                        v-for="(cat, index) in movie.categories"
                        :key="index"
                        class="hover:text-white"
                      >
                        {{ cat.title }}
                      </li>
                    </ul>
                  </div>
                </figcaption>
              </figure>
            </div>
          </div>
          <div class="block px-4">
            <h1 class="text-right text-white text-[14px] font-semibold">
              <p class="line-clamp-2 whitespace-nowrap">
                {{ movie.FaName }}
              </p>
            </h1>
            <h1 class="text-right text-white/50 text-[11px] mt-1">
              <p class="line-clamp-2 whitespace-nowrap">
                {{ movie.EnName }}
              </p>
            </h1>
          </div>
        </NuxtLink>
      </div>
    </div>
  </section>
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";
import Play2 from "@/components/Icons/play2.vue";

export default {
  name: "Imdbs",
  props: {
    imdbs: {
      required: true,
      type: [Array, Object],
    },
  },
  async mounted() {
    await this.$nextTick();
    new Swiper(this.$refs.swiper_imdbs, {
      slidesPerView: 15,
      loop: false,
      dir: "ltr",
      spaceBetween: 3,
      navigation: { nextEl: ".next5", prevEl: ".prev5" },
      watchSlidesVisibility: true,
      breakpoints: {
        3000: {
          slidesPerView: 8,
          spaceBetween: 15,
        },
        1920: {
          slidesPerView: 6,
          spaceBetween: 15,
        },
        1400: {
          slidesPerView: 6,
          spaceBetween: 15,
        },
        1200: {
          slidesPerView: 6,
          spaceBetween: 15,
        },
        640: {
          slidesPerView: 5,
          spaceBetween: 15,
        },
        320: {
          slidesPerView: 3,
          spaceBetween: 15,
        },
      },
    });
  },
  methods: {
    slug_generator(text) {
      return this.$slugGenerator(text);
    },
  },
  components: {
    Play2
  }
};
</script>

<style></style>
