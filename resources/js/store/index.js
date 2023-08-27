import { createStore } from 'vuex';


export default createStore({
    state: {
        events: [],
        subscriberRevenue: 0,
        donationRevenue: 0,
        merchSales: 0,
        numberOfFollowers: 0,
        topItems: [],
        eventsPage: 0,
        userToken: null
    },
    mutations: {
        setEvents(state, events) {
            state.events = state.events.concat(events);
        },
        setSubscriberRevenue(state, revenue) {
            state.subscriberRevenue = revenue;
        },
        setDonationRevenue(state, revenue) {
            state.donationRevenue = revenue;
        },
        setMerchSales(state, sales) {
            state.merchSales = sales;
        },
        setNumberOfFollowers(state, followers) {
            state.numberOfFollowers = followers;
        },
        setTopItems(state, items) {
            state.topItems = items;
        },
        setUserToken(state, token) {
            state.userToken = token;
            window.axios.defaults.headers.common['Authorization'] = "Bearer " + token;
        }
    },
    actions: {
        getEvents({ commit, state }) {
            state.eventsPage++;
            axios.get('/api/events', {
                params: {
                    page: state.eventsPage,
                },
            })
                .then(response => {
                    commit('setEvents', response.data.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getSubscriberRevenue({ commit }) {
            axios.get('/api/subscribers/revenue')
                .then(response => {
                    commit('setSubscriberRevenue', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getDonationRevenue({ commit }) {
            axios.get('/api/donations/revenue')
                .then(response => {
                    commit('setDonationRevenue', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getMerchSales({ commit }) {
            axios.get('/api/merchSales/revenue', {
                headers: {
                    Authorization: "Bearer " + state.userToken,
                },
            })
                .then(response => {
                    commit('setMerchSales', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getNumberOfFollowers({ commit }) {
            axios.get('/api/followers/count')
                .then(response => {
                    commit('setNumberOfFollowers', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getTopItems({ commit }) {
            axios.get('/api/merchSales/popular')
                .then(response => {
                    commit('setTopItems', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        updateEvent({ state }, payload) {
            const { event, index } = payload;
            axios
                .patch(
                    "/api/events/" + event.id,
                    { read: !event.read },
                )
                .then((response) => {
                    state.events[index].read = !event.read;
                });
        },
    },
    getters: {
        totalRevenue(state) {
            if (state.subscriberRevenue && state.donationRevenue && state.merchSales)
                return state.subscriberRevenue + state.donationRevenue + state.merchSales;
            return 0;
        }
    }
});