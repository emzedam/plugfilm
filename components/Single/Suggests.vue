<template>
  <section class="movies-slider my-10 px-6 overflow-hidden relative">
      <header
        class="flex items-center justify-between py-8 w-full lg:mx-auto lg:max-w-7xl overflow-hidden relative"
      >
        <div class="flex items-center justify-between">
          <h2 class="lg:text-2xl text-white">پیشنهاد پلاگ فیلم</h2>
          <span class="lg:text-xl text-sm mr-4 text-gray-200 flex items-center"
            ><span class="lg:block hidden">مشاهده بیشتر</span
            ><i class="fa-solid fa-chevron-left text-nr lg:pr-2 text-xl"></i
          ></span>
        </div>
        <div class="slider-btn pr-0 relative overflow-hidden items-center flex">
          <div
            class="arrow-slider flex items-center w-16 justify-between text-white"
          >
            <div class="prev9 w-10 cursor-pointer">
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="next9 w-10 cursor-pointer">
              <i class="fa-solid fa-chevron-left"></i>
            </div>
          </div>
        </div>
      </header>
      <div
        v-if="contents != null"
        ref="swiper_suggests2"
        class="swiper relative overflow-hidden max-w-7xl"
      >
        <div class="swiper-wrapper">
          <nuxt-link
            v-for="(movie, index) in contents"
            :key="index"
            :to="movie.is_special == 0 ? `${slug_generator(movie.EnName)}-${movie.id}` : `special-${movie.id}`"
            class="swiper-slide relative overflow-hidden"
          >
            <div class="w-full relative">
              <div
                class="cursor-pointer before:block before:pt-[150%] before:relative w-full h-full mb-[15px] relative shadow-md shadow-menu-mobile rounded-[30px] block before:rounded-[30px] before:bg-[url('/logo.png')] before:place-items-center before:justify-center before:bg-no-repeat before:items-center before:bg-opacity-10 before:bg-center before:bg-[length:150px_70px] shine"
              >
                <figure
                  class="absolute inset-0 overflow-hidden after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 lg:after:rounded-[25px] after:bottom-0 after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
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
                      class="imdb absolute left-3 top-3 justify-center flex items-center bg-secondary/30 backdrop-blur rounded-full w-10 h-10 cursor-pointer py-2 px-2 leading-[1px] shadow transition ease-in-out delay-150 font-en border-[2px] border-red-500 z-10"
                    >
                      <span
                        class="text-white justify-center items-center flex leading-[1px] text-sm"
                        >{{ movie.is_special == 0 ? movie.ImdbRate : 0 }}</span
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
                      v-if="movie.is_special == 0"
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
          </nuxt-link>
        </div>
      </div>
  </section>
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";
import Play2 from "@/components/Icons/play2.vue";
export default {
  name: "Suggests",
  props: {
    contents: {
      type: [Array, Object],
      required: true,
    },
  },
  async mounted() {
    await this.$nextTick();
    new Swiper(this.$refs.swiper_suggests2, {
      slidesPerView: 7,
      loop: false,
      dir: "ltr",
      spaceBetween: 3,
      navigation: { nextEl: ".next9", prevEl: ".prev9" },
      watchSlidesVisibility: true,
      breakpoints: {
        3000: {
          slidesPerView: 8,
          spaceBetween: 20,
        },
        1920: {
          slidesPerView: 6,
          spaceBetween: 20,
        },
        1400: {
          slidesPerView: 6,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 6,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
    });
  },
  components: {Play2},
  methods: {
    slug_generator(text) {
      return this.$slugGenerator(text);
    },
  },
};
</script>

<style></style>
