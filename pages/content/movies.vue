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

    <Movie v-if="all_contents != null" :contents="all_contents" />
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Movie from "@/components/Movie/Movie.vue";

export default {
  name: "movies",
  middleware: ["init"],
  layout: "home",
  components: {
    Movie,
  },
  data() {
    return {
      loading: true,
      all_contents: null,
    };
  },
  mounted() {
    setTimeout(() => {
      this.loading = false;
    }, 1000);
  },
  async fetch() {
    await this.getContent();
  },
  methods: {
    async getContent() {
      const loadData = await this.$axios.post("/api/contents/get/movie_types", {
        type: "movies",
      });
      if (loadData.data != null) {
        this.all_contents = loadData.data;
      } else {
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
