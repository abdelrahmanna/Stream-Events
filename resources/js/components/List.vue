..<template>
  <div>
    <h1>events</h1>
    <template v-for="(event, index) in events" :key="index">
      <div class="list-container">
        <ListItem :event="event" class="list-item" />
        <button @click="updateEvent({event, index})">
          {{ event.read ? "unread" : "read" }}
        </button>
      </div>
    </template>
    <u @click="getEvents">show more</u>
  </div>
</template>

<script>
import { ListItem } from "./listItems";
import { mapActions } from 'vuex';
export default {
  components: {
    ListItem,
  },
  methods: {
    ...mapActions(["updateEvent", "getEvents"]),
  },
  props: {
    events: {
      required: true,
    },
  },
};
</script>

<style>
</style>