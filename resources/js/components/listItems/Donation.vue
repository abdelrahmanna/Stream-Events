<template>
  <div>
    <p>
      {{ donation.name }} donated
      {{ donation.amount + " " + donation.currency }} to you!
    </p>
    <p>"{{ donation.message }}"</p>
  </div>
</template>

<script>
export default {
  props: {
    donation: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>