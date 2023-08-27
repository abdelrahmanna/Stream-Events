.<template>
  <div>
    <follower :follower="event.eventable" v-if="event.eventable_type == 'App\\Models\\Follower'"/>
    <donation :donation="event.eventable" v-else-if="event.eventable_type == 'App\\Models\\Donation'"/>
    <subscriber :subscriber="event.eventable" v-else-if="event.eventable_type == 'App\\Models\\Subscriber'"/>
    <merch-sale :merchSale="event.eventable" v-else-if="event.eventable_type == 'App\\Models\\MerchSale'"/>
  </div>
</template>

<script>
import Follower from './Follower.vue';
import Donation from './Donation.vue';
import MerchSale from './MerchSale.vue';
import Subscriber from './Subscriber.vue';
export default {
  components: {
    Follower,
    Donation,
    Subscriber,
    MerchSale,
  },
  props: {
    event: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>