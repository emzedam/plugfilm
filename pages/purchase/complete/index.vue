<template>
  <div class="flex items-center justify-center bg-secondary flex-1 h-screen">
    <div
      class="bg-primary w-full max-w-md h-auto p-6 rounded-lg shadow-secondary"
    >
      <div class="header flex flex-col justify-center text-center">
        <i class="fa-duotone fa-check-circle text-[100px] text-green-500"></i>
        <!-- <i class="fa-duotone fa-circle-xmark text-red-500 text-[100px]"></i> -->
        <div class="text-3xl font-medium text-white pt-6">
          پرداخت با موفقیت انجام شد
        </div>

        <NuxtLink to="/" class="text-ptext bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg p-4 mt-5"
          >بازگشت به صفحه اصلی</NuxtLink
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index",
  // validate({ app }) {
  //   if (!app.$cookies.get("coac")) {
  //     return false;
  //   }
  //   return true;
  // },
  middleware: "init",
  layout: 'home',
};
</script>

<style scoped>
.success_payment {
  width: 100%;
  height: calc(100vh - 65px);
  display: flex;
  align-items: center;
  justify-content: center;
}

.center_into {
  width: 300px;
  height: 300px;
  padding: 0 20px;
  text-align: center;
  border-radius: 10px;
  background: #181a1e;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.videoList {
  background: #f7bb0d;
  padding: 6px 13px;
  border-radius: 4px;
  color: #ffffff;
  font-weight: 600;
  margin-top: 10px;
}
.check {
  margin-bottom: 22px;
  border-radius: 100px;
  border: 1px solid #f7bb0d;
  width: 100px;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 30px;
  color: #f7bb0d;
}
</style>
