<template>
  <div>
    <div class="loading-indicator bg-primary" :class="!loading ? 'hidee' : ''">
      <img
        alt="plugfilm logo"
        class="logo w-44 left-0"
        src="/logo.png"
        data-not-lazy
      />
    </div>
    <Category
      v-if="all_contents != null"
      :contents="all_contents"
      :catname="cat_name"
    />
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Category from "@/components/Category/Category.vue";

export default {
  name: "indexPage",
  middleware: ["init"],
  layout: "home",
  components: {
    Category,
  },
  data() {
    return {
      loading: true,
      all_contents: null,
      moviesContent: null,
      zhaners: null,
      cat_name: null,
    };
  },
  mounted() {
    setTimeout(() => {
      this.loading = false;
    }, 1000);
  },
  async fetch() {
    const param_cat = this.$route.params.slug.split("-").join(" ");
    this.cat_name = param_cat;

    await this.getContent(param_cat);
    // set Cats
    if (this.categories != null) {
      this.zhaners = this.categories;
    }

    if (this.contents != null) {
      this.moviesContent = {
        newers: this.contents.slice(3, 15),
        updates: this.contents.slice(51, 63),
        viewers: this.contents.slice(63, 75),
      };
    } else {
      this.moviesContent = null;
    }
  },
  computed: {
    ...mapGetters({
      contents: "get_contents",
      categories: "get_categories",
    }),
  },
  methods: {
    async getContent(param_cat) {
      const randomInt = Math.floor(1 + Math.random() * 1400);
      const loadData = await this.$axios.post(
        "/api/contents/get/category/movies",
        { skip: randomInt, limit: 500, cat_name: param_cat }
      );
      if (loadData.data != null) {
        this.loading = false;
        this.all_contents = loadData.data;
      } else {
        this.loading = false;
        this.all_contents = null;
      }
    },
  },
};
</script>

<style scoped>
.loading-indicator {
  position: fixed;
  width: 100%;
  height: 100%;
  background-color: rgb(17, 19, 25);
  top: 0;
  right: 0;
  z-index: 10000;
  text-align: center;
  font-size: 3rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  opacity: 1;
  visibility: visible;
}

.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}

.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 54px;
  height: 54px;
  margin: 8px;
  border: 3px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #1fae30 transparent transparent transparent;
}

.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}

.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}

.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}

@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

.loading-indicator.hidee {
  animation-name: hidePre;
  animation-duration: 0.3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease-in-out;
}

@keyframes hidePre {
  0% {
    opacity: 1;
    visibility: visible;
  }

  100% {
    opacity: 0;
    visibility: hidden;
  }
}
</style>
