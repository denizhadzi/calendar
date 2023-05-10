<template>
  <div>
    <button @click="fetchEvents">Refetch events</button>
    <ul>
      <li v-for="event in events" :key="event.id" @click="showOrHideDescription(event)">
        <div>{{ formatDate(event.start_date) }} - {{ event.title }}</div>
        <div v-if="event.showDescription">{{ event.description }}</div>
      </li>
    </ul>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    data() {
      return {
        events: [],
      };
    },

    methods: {

      getEvents() {
        axios.get("/events/list").then((response) => {
          this.events = response.data;
        }).catch((error) => {
          console.log(error);
        });
      },

      formatDate(date) {
        const dateString = date;
        const dateRaw = new Date(dateString);
        const dateISO = dateRaw.toISOString().slice(0,10);
        return dateISO;
      },

      showOrHideDescription(event) {
        event.showDescription = !event.showDescription;
      },
    },

    mounted() {
      this.getEvents();
    },
  };
</script>
