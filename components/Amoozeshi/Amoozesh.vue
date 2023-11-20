<template>
    <div class="lg:px-0 px-4">
      <div
        v-if="contents != null"
        class="absolute z-0 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none"
      >
        <div class="w-[108rem] flex-none flex justify-end">
          <img src="/bg.png" class="w-[90rem] flex-none max-w-none" />
        </div>
      </div>
      <div class="w-full max-w-7xl mx-auto mt-28 mb-6">
        <h2
          class="py-6 bg-secondary border rounded-lg border-gray-700 text-white pr-6"
        >
        آموزشی
        </h2>
      </div>
      <div class="grid grid-cols-2 lg:grid-cols-6 gap-6 max-w-7xl mx-auto">
        <nuxt-link
          :to="`/special-${movie.id}`"
          v-for="(movie, index) in contents"
          :key="index"
          class="relative overflow-hidden"
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
                      >0</span
                    >
                  </div>
                  <div
                    class="bookmark absolute right-3 top-3 justify-center flex items-center bg-secondary/20 backdrop-blur hover:bg-secondary/30 rounded-md lg:w-10 lg:h-10 w-8 h-8 cursor-pointer hover:!text-white shadow transition ease-in-out delay-150 text-white z-20"
                  >
                    <i class="fa-regular fa-bookmark"></i>
                  </div>
                  <div
                    class="play absolute place-content-center inset-0 flex items-center justify-center z-10"
                  >
                    <Play2 class="fill-white w-10" />
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
              -
              </p>
            </h1>
          </div>
        </nuxt-link>
      </div>
    </div>
</template>
  
  <script>
  import Play2 from "@/components/Icons/play2.vue";
  export default {
    name: "Movie",
    props: {
      contents: {
        type: [Array, Object],
        required: true,
      },
    },
    methods: {
      slug_generator(text) {
        return this.$slugGenerator(text);
      },
    },
    components: {Play2}
  };
  </script>
  
  <style></style>
  