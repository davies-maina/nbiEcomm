import Axios from "axios";

export default {
    state: {
        products: [],
        moreproducts: false,
        nextpage: 0,

        categoryproducts: [],
        morecategoryproducts: false,
        nextpagecatprod: 0,
        categoryproductsurl: '',
        productscount: '',


        categories: [],
        sections: [],
        viewproduct: [],



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
        },
        categories(state) {

            return state.categories;
        },
        sections(state) {

            return state.sections;
        },

        categoryproducts(state) {
            return state.categoryproducts;
        },
        morecategoryproducts(state) {

            return state.morecategoryproducts;
        },
        nextpagecatprod(state) {

            return state.nextpagecatprod;
        },
        categoryproductsurl(state) {
            return state.categoryproductsurl;
        },
        productscount(state) {
            return state.productscount
        },
        viewproduct(state) {
            return state.viewproduct

        }


    },

    mutations: {
        getProducts(state, payload) {
            state.categoryproducts = [];
            state.morecategoryproducts = false;
            state.products = payload.data.data;

            if (payload.data.current_page < payload.data.last_page) {
                state.moreproducts = true;
                state.nextpage = payload.data.current_page + 1;
            } else {
                state.moreproducts = false;
            }

            if (payload = []) {
                state.productscount = true;
            } else {
                state.productscount = false;
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
        },

        loadmorecategoryproducts(state, payload) {

            if (payload.data.current_page < payload.data.last_page) {
                state.morecategoryproducts = true;
                state.nextpagecatprod = payload.data.current_page + 1;
            } else {
                state.morecategoryproducts = false;
            }

            payload.data.data.forEach(product => {
                state.categoryproducts.push(product);
            });
        },

        getcategories(state, payload) {
            state.categories = payload;

        },
        getsections(state, payload) {



        },
        categoryproductsurl(state, payload) {

            state.categoryproductsurl = payload;
        },
        getcategoryproducts(state, payload) {
            state.products = [];
            state.moreproducts = false;
            state.categoryproducts = payload.data.data;

            if (payload.data.current_page < payload.data.last_page) {
                state.morecategoryproducts = true;
                state.nextpagecatprod = payload.data.current_page + 1;
            } else {
                state.morecategoryproducts = false;
            }
            if (payload = []) {
                state.productscount = true;
            } else {
                state.productscount = false;
            }

        },
        viewproduct(state, payload) {
            state.viewproduct = payload;
            $(".viewproduct").modal("show");

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
        },

        loadmorecatprod({ commit }, payload) {
            Axios.get(`/listproducts/${payload.url}?page=${payload.nextpage}`)
                .then((res) => {

                    commit("loadmorecategoryproducts", res);
                })

        },

        getCategories({ commit }) {

            Axios.post('/loadcategories')
                .then((res) => {

                    /* console.log(res.data); */
                    commit('getcategories', res.data);
                })
        },

        getSections({ commit }, payload) {


            /* commit('getsections', payload); */
        },

        loadcategoryproducts({ commit }, payload) {
            commit('categoryproductsurl', payload);
            Axios.get(`/listproducts/${payload}`)
                .then((res) => {

                    commit("getcategoryproducts", res);
                })

        },

        viewproduct({ commit }, payload) {

            /* $(".viewproduct").modal("show"); */
            /*  console.log(payload) */
            commit('viewproduct', payload);
        }


    }
};

/* window.location.href = "http://nairobae/listproducts"; */