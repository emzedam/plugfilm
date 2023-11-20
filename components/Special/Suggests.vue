<template>
  <section aria-labelledby="slider-1">
    <div class="w-full px-4 mx-auto sm:px-6 lg:px-8 lg:pt-10">
      <div class="pb-2 flex items-center justify-between pt-6">
        <h2
          id="favorites-heading"
          class="lg:text-2xl font-bold tracking-tight text-white"
        >
          <i class="fa-duotone fa-films l-2 text-red-500"></i>
          فیلم های پیشنهادی
        </h2>
        <NuxtLink
          to="/content/movies"
          class="text-sm font-medium hover:text-slate-500 !text-ptext"
        >
          مشاهده بیشتر
          <span aria-hidden="true">
            <i class="fa-duotone fa-arrow-right rotate-180"></i>
          </span>
        </NuxtLink>
      </div>
      <div class="swiper Slider1 mt-4" v-if="contents != null" ref="swiper">
        <div class="swiper-wrapper">
          <NuxtLink
            v-for="(content, index) in contents"
            :key="index"
            :to="`${slug_generator(content.EnName)}-${content.id}`"
            class="swiper-slide opacity-90 hover:opacity-100 cursor-pointer bg-transparent rounded-[15px] relative before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:bg-50% before:content-[''] before:bg-gradient-to-t before:from-secondary/100 before:via-secondary/50 before:to-primary/0 before:rounded-[15px]"
          >
            <img
              class="object-cover rounded-[15px] shadow-lg"
                :data-src="content.Image"
                onerror="javascript:this.src='/placeholder.svg'"
                v-lazy-load
                :alt="content.FaName"
                :title="content.FaName"
            />
            <!-- Desktop  -->
            <NuxtLink
            :to="`${slug_generator(content.EnName)}-${content.id}`"
              class="Desktop absolute right-2 bottom-20 text-right text-white/80 w-full cursor-pointer hover:text-white/95 hidden xl:block"
            >
              <h2 class="font-bold xl:text-2xl text-sm">{{ content.FaName }}</h2>
              <h3 class="text-ptext font-en">{{ content.EnName }}</h3> 
            </NuxtLink>
            <div class="shadfilm-tools hidden xl:block">
              <a
                class="bookmark absolute right-2 top-2 justify-center flex items-center bg-white/10 hover:bg-white/30 rounded-md w-10 h-10 cursor-pointer hover:!text-ptext shadow transition ease-in-out delay-150 text-ptext"
              >
                <i class="fa-duotone fa-plus text-2xl"></i>
              </a>
              <a
                class="imdb absolute left-2 top-2 justify-center flex items-center bg-secondary/70 rounded-md w-20 h-8 cursor-pointer py-2 px-2 leading-[1px] shadow transition ease-in-out delay-150"
              >
                <span
                  class="text-white pl-2 justify-center items-center flex leading-[1px]"
                  >{{ content.ImdbRate }}</span
                >
                <i
                  class="fa-solid fa-star text-md text-yellow-500 justify-center items-center flex leading-[1px]"
                ></i>
              </a>
              <NuxtLink
              :to="`${slug_generator(content.EnName)}-${content.id}`"
                class="play absolute right-2 bottom-2 justify-center flex items-center bg-red-600/20 rounded-lg h-10 w-24 cursor-pointer px-2 text-right hover:!bg-red-600/50 transition ease-in-out delay-150"
              >
                <i class="fa-duotone fa-play text-2xl text-white/70 shadow"></i>
                <span class="text-white/70 pr-3">تماشا</span>
              </NuxtLink>
              <a
                class="swipe-button absolute left-2 bottom-2 justify-center flex items-center bg-white/10 rounded-full w-10 h-10 cursor-pointer p-4 hover:rotate-180 focus:rotate-180 active:rotate-180 transition ease-in-out delay-150"
              >
                <i
                  class="fa-duotone fa-chevrons-down text-xl text-ptext shadow"
                ></i>
              </a>
            </div>
            <!-- Desktop  -->
            <!-- MOBILE -->
            <div class="shadfilm-tools block xl:hidden">
              <a
                class="bookmark absolute right-2 top-2 justify-center flex items-center bg-white/10 hover:bg-white/30 rounded-md w-6 h-6 cursor-pointer hover:!text-ptext shadow transition ease-in-out delay-150 text-ptext"
              >
                <i class="fa-duotone fa-plus text-sm"></i>
              </a>
              <a
                class="imdb absolute left-1 top-2 justify-center flex items-center bg-secondary/70 rounded-md w-10 h-4 cursor-pointer py-3 px-2 leading-[1px] shadow transition ease-in-out delay-150"
              >
                <span
                  class="text-white pl-2 justify-center items-center flex leading-[1px] text-xs"
                  >{{ content.ImdbRate }}</span
                >
                <i
                  class="fa-solid fa-star text-xs text-yellow-500 justify-center items-center flex leading-[1px]"
                ></i>
              </a>
            </div>
            <NuxtLink
            :to="`${slug_generator(content.EnName)}-${content.id}`"
              class="Mobile text-right text-white/80 w-full cursor-pointer hover:text-white/95 block absolute right-2 bottom-2 xl:hidden"
            >
              <h2 class="font-bold text-xs">{{ content.FaName }}</h2>
              <h3 class="text-ptext font-en text-xs">{{ content.EnName }}</h3>
            </NuxtLink>
            <!-- MOBILE -->
          </NuxtLink>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";

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
    new Swiper(this.$refs.swiper, {
      spaceBetween: 10,
      breakpoints: {
        3440: {
          slidesPerView: 7,
        },

        1199: {
          slidesPerView: 4,
        },
        991: {
          slidesPerView: 4,
        },
        600: {
          slidesPerView: 5,
          grabCursor: true,
        },
        412: {
          slidesPerView: 3,
          grabCursor: true,
        },

        375: {
          slidesPerView: 3,
          grabCursor: true,
        },
        360: {
          slidesPerView: 3,
          grabCursor: true,
        },
        344: {
          slidesPerView: 3,
          grabCursor: true,
        },
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  },
  methods: {
    slug_generator(text) {
      return this.$slugGenerator(text);
    },
  },
};
</script>

<style></style>
