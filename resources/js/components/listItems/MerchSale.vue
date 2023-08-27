<template>
  <p>{{merchSale.name}} some fancy pants from you for {{ merchSale.amount * merchSale.merch.price }} USD!</p>
</template>

<script>
export default {
props:{
    merchSale:{
        type:Object,
        required:true,
    },
}
}
</script>

<style>

</style>