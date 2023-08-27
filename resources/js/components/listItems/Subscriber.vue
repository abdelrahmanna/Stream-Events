<template>
  <p>{{ subscriber.name }} ({{ subscriber.subscription_tier.name }}) subscribed to you!</p>
</template>

<script>
export default {
  props: {
    subscriber: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>