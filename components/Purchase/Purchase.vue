<template>
  <div class="bg-primary py-24 sm:py-32 relative" v-if="purchaseList != null">
    <div
      class="absolute z-0 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none"
    >
      <div class="w-[108rem] flex-none flex justify-end">
        <img src="/bg.png" class="w-[90rem] flex-none max-w-none" />
      </div>
    </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div
        class="mx-autow-full sm:text-center bg-secondary/30 p-4 border-gray-700 border rounded-lg"
      >
        <h2 class="text-xl font-bold tracking-tight text-nr">
          خرید اشتراک پلاگ فیلم
        </h2>
      </div>
      <p class="mt-16 sm:mt-20 mb-10 text-white" style="margin-bottom: 16px;">
        به کلیه مبالغ مربوطه 9% مالیات بر ارزش افزوده تعلق میگیرد.     
      </p>
      <div
        v-for="(purchase, index) in purchaseList"
        :key="index"
        class="mx-auto  max-w-2xl rounded-3xl ring-1 ring-gray-700/50  lg:mx-0 lg:flex lg:max-w-none space-y-4"
        :class="index != 0 ? ['mt-16', 'sm:mt-20'] : []"
      >
        <div class="p-8 sm:p-10 lg:flex-auto">
          <h3 class="text-2xl font-bold tracking-tight text-white">
            {{ purchase.name }}
          </h3>
          <div class="mt-10 flex items-center gap-x-4">
            <h4 class="flex-none text-sm font-semibold leading-6 text-nr">
              جزئیات
            </h4>
            <div class="h-px flex-auto bg-gray-700"></div>
          </div>
          <ul
            role="list"
            class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-400 sm:grid-cols-2 sm:gap-6"
          >
            <li class="flex gap-x-3">
              <svg
                class="h-6 w-5 flex-none text-nr"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                  clip-rule="evenodd"
                />
              </svg>
              دسترسی نامحدود به فیلم ها و سریالها
            </li>
            <li class="flex gap-x-3">
              <svg
                class="h-6 w-5 flex-none text-nr"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                  clip-rule="evenodd"
                />
              </svg>
              دانلود رایگان فیلم ها با کیفیت اصلی
            </li>
            <li class="flex gap-x-3">
              <svg
                class="h-6 w-5 flex-none text-nr"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                  clip-rule="evenodd"
                />
              </svg>
              تماشای آنلاین و بدون وقفه فیلم و سریال
            </li>
            <li class="flex gap-x-3">
              <svg
                class="h-6 w-5 flex-none text-nr"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                  clip-rule="evenodd"
                />
              </svg>
              دسترسی به آرشیو هزاران فیلم و سریال
            </li>
          </ul>
        </div>
        <div class="lg:w-full lg:max-w-md lg:flex-shrink-0">
          <div
            class="rounded-2xl bg-gray-50/10 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16"
          >
            <div class="mx-auto max-w-xs px-8">
              <p class="flex items-baseline justify-center gap-x-2">
                <span class="text-5xl font-bold tracking-tight text-white"
                  >{{ rial_separate(purchase.main_mount) }} </span
                >
                <span
                  class="text-sm font-semibold leading-6 tracking-wide text-gray-100"
                  >ریال</span
                >
              </p>
              <nuxt-link
                :to="`/purchase/${purchase.id}`"
                class="mt-10 block w-full rounded-md bg-nr px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-nr focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-nr"
                >خرید اشتراک</nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "Purchase",
  data() {
    return {
      loading: false,
      purchaseList: null,
      activeItem: 1,
    };
  },
  props: {
    purchases: {
      type: [Array, Object],
      required: true,
    },
  },
  fetch() {
    if (this.purchases != null) {
      this.purchaseList = this.purchases;
    }
  },
  methods: {
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
    selectPur(id) {
      this.activeItem = id;
    },
    selectPurchase() {
      this.loading = true;
      if (this.activeItem != "") {
        this.loading = false;
        this.$router.push("/purchase/" + this.activeItem);
        return;
      }
      this.$swal.fire(
        "Not Selected",
        "لطفا یکی از اشتراک های بالا را انتخاب کنید"
      );
      this.loading = false;
    },
    activateItem(id) {
      this.activeItem = id;
    },
  },
};
</script>

<style>
a.active_purchase {
  background-color: #f7bb0d !important;
  -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.07);
  -moz-box-shadow: 0 0 20px rgba(0, 0, 0, 0.07);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.07);
  color: #333 !important;
}

a.active_purchase .ui-fw-bold {
  color: #333 !important;
}

a.active_purchase .price {
  color: #333 !important;
}

a.active_purchase .pmi-arrow_83 {
  color: #333 !important;
}

.btn-cuntinu {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  position: relative;
  display: block;
  width: 100%;
  height: 44px;
  line-height: 44px;
  letter-spacing: 0;
  padding: 0 16px;
  border-radius: 4px;
  font-size: 16px;
  text-align: center;
  font-weight: 600;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
  cursor: pointer;
  margin-top: 24px;
  color: #fff;
  background: #19ab56;
  border: none;
}

.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 18px;
}
.lds-ellipsis div {
  position: absolute;
  top: 8px;
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: rgb(31, 29, 29);
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 5px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 5px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 29px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 53px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}
</style>
