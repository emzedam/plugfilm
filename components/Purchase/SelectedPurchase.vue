<template>
  <div class="lg:flex overflow-hidden relative">
    <div
      class="absolute z-0 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none"
    >
      <div class="w-[108rem] flex-none flex justify-end">
        <img src="/bg.png" class="w-[90rem] flex-none max-w-none" />
      </div>
    </div>
    <div
      class="flex items-center justify-center bg-header flex-1 h-screen"
      v-if="selectedItem != null"
    >
      <div class="bg-movie w-full max-w-7xl h-auto p-6 rounded-lg shadow-secondary">
        <div class="header flex flex-col justify-center text-center">
          <div
            class="mx-auto w-full sm:text-center bg-secondary/30 p-4 border-gray-700 border rounded-lg mb-4"
          >
            <h2 class="text-xl font-bold tracking-tight text-nr">صورتحساب</h2>
          </div>
          <div
            class="pay grid grid-rows-4 grid-cols-2 py-6 border rounded-lg border-gray-300/10 mb-3 bg-header"
          >
            <div class="p-3 text-right font-bold text-white">نوع اشتراک</div>
            <div class="p-3 text-right font-bold text-nr text-sm">
              {{ selectedItem.name }}
            </div>
            <div class="p-3 text-right font-bold text-white">قیمت</div>
            <div class="p-3 text-right font-bold text-white text-sm">
              {{ rial_separate(selectedItem.main_mount) }} ریال
            </div>
            <div class="p-3 text-right font-bold text-white">تخفیف</div>
            <div class="p-3 text-right text-white font-bold text-sm">ندارد</div>
            <div class="p-3 text-right font-bold text-white">جمع کل</div>
            <div class="p-3 text-right font-bold text-white text-sm">
              {{ rial_separate(selectedItem.total_amount) }} ریال
            </div>
          </div>
          <div class="flex justify-between items-center">
            <button
              @click="OrderVip()"
              v-if="!loading"
              class="text-white bg-secondary rounded-lg p-4"
            >
              پرداخت فاکتور
            </button>
            <button
              type="button"
              v-if="loading"
              class="text-white bg-secondary rounded-lg p-4"
            >
              در حال اتصال به درگاه ...
            </button>
            <button @click="$router.back()" class="text-white bg-nr rounded-lg p-4">
              تغییر نوع اشتراک
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "SelectedPurchase",
  data() {
    return {
      loading: false,
      selectedItem: null,
    };
  },
  mounted() {
    this.selectedItem = this.selected;
  },
  methods: {
    async OrderVip() {
      if (this.$store.state.authUser != null) {
        this.loading = true;
        let id = this.$route.params.id;
        const connectToBank = await this.$store.dispatch("connectToBank", {
          purchaseid: id,
          amount: this.selectedItem.total_amount,
        });
        if (connectToBank.data.existPurchase == true) {
          this.loading = false;
          this.$swal.fire("Error", "این اشتراک فعلا برای اکانت شما فعال هست", "error");
          return;
        }
        if (connectToBank.data.authority) {
          location.replace(
            `${connectToBank.data.location}${connectToBank.data.authority}`
          );
          this.$cookies.set("coac", true, {
            maxAge: 60 * 1,
          });
        }
      } else {
        alert("لطفا لاگین شده و دوباره امتحان کنید");
      }
    },
    rial_separate(Number) {
      Number += "";
      Number = Number.replace(",", "");
      let x = Number.split(".");
      let y = x[0];
      let z = x.length > 1 ? "." + x[1] : "";
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(y)) y = y.replace(rgx, "$1" + "," + "$2");
      return y + z;
    },
  },
  computed: {
    ...mapGetters({
      purchase: "get_purchases",
    }),
    selected() {
      if (this.purchase != null) {
        let selected = this.purchase.filter((item, index) => {
          return item.id == this.$route.params.id;
        });
        if (selected != null) {
          return selected[0];
        }
        return null;
      }
    },
  },
};
</script>
