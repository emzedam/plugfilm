<template>
  <div
    class="fixed inset-0 z-50 flex items-start justify-center pt-16 sm:pt-24"
    :class="showModal == true ? '' : 'hidden'" 
  >
    
    <div
      @click="closeModal()"
      class="fixed inset-0 bg-primary/25 backdrop-blur transition-opacity opacity-100"
    >
  
    </div>
    <div
      class="relative w-full max-w-3xl transform px-4 transition-all opacity-100 scale-100"
    >
    <div>
      <!-- <i
      style="z-index:1;cursor:pointer;"
      @click="closeModal()"
      class="fa-light fa-times text-[30px] text-ptext pointer-events-none absolute top-4 left-4 h-6 w-6 fill-slate-400"
    ></i> -->
    </div>
    
      <div class="overflow-hidden rounded-lg bg-secondary shadow-md">
        <div class="relative">
          <input
            class="block w-full appearance-none text-white bg-primary/70 py-4 pl-4 pr-12 text-ptext placeholder:text-ptext focus:outline-none sm:text-sm sm:leading-6"
            placeholder="جستجو در پلاگ فیلم   ..."
            :value="searchInput"
            @input="searchStart"
          />
          
        </div>
      </div>
      <div class="relative w-full max-w-3xl transform mt-2 transition-all z-1000">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-primary/70 shadow rounded-lg z-1000">
          <div class="py-5">
            <div
              class="scrollbar scrollbar-thumb-custom scrollbar-track-custom-light overflow-y-scroll h-96"
            >


              <NuxtLink
              v-if="searchResult.length != 0"
              v-for="(item , index) in searchResult" :key="index"
              :to="`${slug_generator(item.EnName)}-${item.id}`">
                <div class="rounded-md bg-primary px-6 py-5">
                  <div class="flex items-center">
                    <img
                      class="h-30 w-24 object-cover rounded-md"
                      :data-src="item.Image"
                      :alt="item.FaName"
                      :title="item.FaName"
                      v-lazy-load 
                    />
                    <div class="mt-3 mr-3 w-full flex flex-col">
                      <div class="text-sm font-medium text-white">
                        {{ item.FaName }}
                      </div>
                      <div class="font-medium pt-2 text-ptext text-white text-sm">
                        {{ item.EnName }}
                      </div>
                      <div class="mt-1 text-sm text-ptext">
                        <div class="mt-1 w-full text-xs text-white">
                          {{ item.FaStoryline.substr(0,100)+'...' }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </NuxtLink> 
              <div v-if="searchResult.length == 0" class="text-center mt-5 text-white">نتیجه ای یافت نشده !</div>
              <div v-if="loading == true" class="text-center mt-5 pt-5 text-white border-t border-ptext/10 ">
                در حال جستجوی فیلم ...
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  data() {
    return {
      searchInput: "",
      searchResult: [],
      loading: false
    };
  },
  mounted() {
    // console.log(this.showModal);
  },
  props: {
    showModal: {
      type: Boolean,
      required: true,
    },
  },
  methods: {
    redirectToCat(path) {
      this.closeModal();
      this.$router.push(path);
    },
    closeModal() {
      this.searchInput = "";
      this.$nuxt.$emit("unsetSearchModal");
    },
    async searchStart(e) {
      this.loading = true
      this.searchInput = e.target.value
      if (e.target.value != "") {
        this.$cookies.set("search", e.target.value);
        const result = await this.$axios.post("/api/contents/search", {
          search: e.target.value,
        });

        await this.$store.commit("set_search_result", result.data);

        if (result.data != null) {
          // return this.$router.push("/content/searchs");
          this.loading = false
          this.searchResult = result.data
        }
      }else{
        this.loading = false
        this.searchResult = []
      }
    },
    slug_generator(text) {
        return this.$slugGenerator(text);
    },
  },
};
</script>

<style scoped>
.lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid #fff;
  border-color: #fff transparent #fff transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


.searchModal {
  width: 100%;
  height: 10vh;
  position: fixed;
  top: 100px;
  right: 0;
  left: 0;
  bottom: 0;
  background-color: rgb(52 51 59);
  z-index: 1002;
  opacity: 0;
  visibility: hidden;
  transition: 0.2s all ease-in-out;
  display: flex;
  align-items: center;
  justify-content: center;
}

.modalsearch{
  opacity: 0;
  visibility: hidden;
  top: 100px;
}

.modalsearch.show {
  animation-name: showStream;
  animation-duration: 0.3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease-in-out;
}

.modalsearch.hide {
  animation-name: hideStream;
  animation-duration: 0.3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease-in-out;
}

@keyframes showStream {
  0% {
    opacity: 0;
    visibility: hidden;
    top: 100px;
  }

  100% {
    opacity: 1;
    visibility: visible;
    top: 0;
  }
}

@keyframes hideStream {
  0% {
    opacity: 1;
    visibility: visible;
    top: 0;
  }

  100% {
    opacity: 0;
    visibility: hidden;
    top: 100px;
  }
}

.closeStream {
  position: absolute;
  top: 15px;
  left: 15px;
  width: 30px;
  height: 35px;
  z-index: 100000;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 5px;
  font-size: 54px;
  cursor: pointer;
  color: rgb(212, 191, 5);
}

.search-box {
  display: flex;
  align-items: center;
  justify-content: space-around;
  background: rgb(219 219 219 / 20%);
  border-radius: 50px;
  padding: 10px 10px;
}

.searchin {
  border: none;
  font-size: 14px;
  padding: 6px 10px;
  width: 227px;
  background: transparent;
  color: #fff;
  outline: none;
}
</style>
