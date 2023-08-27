<template>
  <div class="container">
    in the past 30 day:
    <ul>
      <li>total revenue in: {{ totalRevenue }} USD</li>
      <li>amount of followers: {{ numberOfFollowers }} follower</li>
      <li>
        top items sold:
        <ul>
          <li v-for="(item, index) in topItems" :key="index">
            {{ item.name }} sold {{ item.total }} times
          </li>
        </ul>
      </li>
    </ul>

    <List v-if="events.length > 0" :events="events" />
  </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations, mapState } from "vuex";
import List from "./List.vue";
export default {
  props: {
    token: {
      type: String,
      required: true,
    },
  },
  components: {
    List,
  },
  created() {
    this.setUserToken(this.token);
    this.getEvents();
    this.getNumberOfFollowers();
    this.getTopItems();
    this.getDonationRevenue();
    this.getSubscriberRevenue();
    this.getMerchSales();
  },
  methods: {
    ...mapActions([
      "getEvents",
      "getSubscriberRevenue",
      "getDonationRevenue",
      "getMerchSales",
      "getNumberOfFollowers",
      "getTopItems",
    ]),
    ...mapMutations(["setUserToken"]),
  },
  computed: {
    ...mapState(["events", "numberOfFollowers", "topItems"]),
    ...mapGetters(["totalRevenue"]),
  },
};
</script>

<style>
</style>