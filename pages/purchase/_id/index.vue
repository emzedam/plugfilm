<template>
      <SelectedPurchase />
</template>
  
  <script>
  import SelectedPurchase from '@/components/Purchase/SelectedPurchase.vue'
  export default {
      name: "index",
      middleware: ['auth' , 'purchase' , 'init'],
      layout: 'home',
      mounted() {
          if (!this.$route.params.id || !Number.isInteger(parseInt(this.$route.params.id))) {
              this.$router.push("/purchase");
          }
      },
      components: { SelectedPurchase }
  }
  </script>
  
  <style>
  
  </style>
  