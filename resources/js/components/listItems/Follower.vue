<template>
  <p>{{ follower.name }} followed you !!</p>
</template>

<script>
export default {
  props: {
    follower: {
      type: Object,
      required: true,
    },
  },
};
</script>