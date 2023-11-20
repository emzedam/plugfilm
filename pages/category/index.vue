<template>
  <div v-if="catList != null" class="lg:px-0 px-4">
    <div
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
        ژانرها
      </h2>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-6 max-w-7xl mx-auto">
      <NuxtLink
        v-for="(cat, index) in catList"
        :key="index"
        :to="`/category/${persian_slug(cat.name)}`"
        class="relative overflow-hidden bg-secondary border border-gray-700 text-right text-white hover:bg-gray-600/50 duration-300 transition-all rounded-lg p-6 flex items-center justify-between"
      >
        <div
          class="bg-right bg-nr/100 absolute left-0 top-0 w-2/4 h-full rounded-s-2xl hue-rotate-15"
        ></div>
        <i class="fa-duotone fa-folder text-3xl"></i>
        <span class="z-20 relative">{{ cat.name }}</span>
      </NuxtLink>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "IndexPage",
  layout: "home",
  middleware: ["getCats" , 'init'],
  data() {
    return {
      catList: null,
    };
  },
  async fetch() {
    await this.filterCat();
  },
  computed: {
    ...mapGetters({
      categories: "get_categories",
    }),
  },
  methods: {
    persian_slug(text) {
      return this.$PersianSlugGenerator(text);
    },
    filterCat() {
      const filteredCats = this.categories.filter((val, index) => {
        return val.type == "film";
      });

      if (filteredCats.length != 0) {
        this.catList = filteredCats;
      }
    },
  },
};
</script>

<style scoped>
.contact_page {
  direction: rtl;
  flex-direction: column;
  height: 650px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.contact_container {
  border: 2px solid #30c65d;
  padding: 56px 74px;
  border-radius: 10px;
}

.heading {
  color: #fff;
  font-size: 40px;
  margin-bottom: 30px;
}
</style>
