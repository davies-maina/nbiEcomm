import Axios from "axios";

export default {
    state: {
        products: [],
        moreproducts: false,
        nextpage: 0
    },

    getters: {
        products(state) {
            return state.products;
        },

        moreproducts(state) {
            return state.moreproducts;
        },
        nextpage(state) {
            return state.nextpage;
        }
    },

    mutations: {
        getProducts(state, payload) {
            state.products = payload.data.data;

            if (payload.data.current_page < payload.data.last_page) {
                state.moreproducts = true;
                state.nextpage = payload.data.current_page + 1;
            } else {
                state.moreproducts = false;
            }
        },

        loadmore(state, payload) {
            if (payload.data.current_page < payload.data.last_page) {
                state.moreproducts = true;
                state.nextpage = payload.data.current_page + 1;
            } else {
                state.moreproducts = false;
            }

            payload.data.data.forEach(product => {
                state.products.push(product);
            });
        }
    },

    actions: {
        getProducts({ commit }) {
            Axios.post("/loadproducts").then(res => {
                /*  console.log(res.data.data); */
                commit("getProducts", res);
            });
        },

        loadmore({ commit }, payload) {
            Axios.post(`/loadproducts?page=${payload}`).then(res => {
                commit("loadmore", res);
            });
        }
    }
};