<template>
    <div class="col-lg aside">
        <div class="prd-grid-wrap">
            <!-- Filter Row -->
            <div class="filter-row invisible">
                <div class="row row-1 d-lg-none align-items-center">
                    <div class="col">
                        <h1 class="category-title">Products</h1>
                    </div>
                    <div class="col-auto ml-auto">
                        <div class="view-in-row d-md-none">
                            <span data-view="data-to-show-sm-1"
                                ><i class="icon icon-view-1"></i
                            ></span>
                            <span data-view="data-to-show-sm-2"
                                ><i class="icon icon-view-2"></i
                            ></span>
                        </div>
                        <div class="view-in-row d-none d-md-inline">
                            <span data-view="data-to-show-md-2"
                                ><i class="icon icon-view-2"></i
                            ></span>
                            <span data-view="data-to-show-md-3"
                                ><i class="icon icon-view-3"></i
                            ></span>
                        </div>
                    </div>
                </div>
                <div class="row row-2">
                    <div class="col-left d-flex align-items-center">
                        <div class="sort-by-holder">
                            <div class="select-label d-none d-lg-inline">
                                Sort by:
                            </div>
                            <div
                                class="select-wrapper-sm d-none d-lg-inline-block"
                            >
                                <select class="form-control input-sm">
                                    <option value="featured">Featured</option>
                                    <option value="rating">Rating</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>
                            <div class="select-directions d-none d-lg-inline">
                                <span
                                    ><i class="icon icon-arrow-down"></i
                                ></span>
                                <span><i class="icon icon-arrow-up"></i></span>
                            </div>
                            <div
                                class="dropdown d-flex d-lg-none align-items-center justify-content-center"
                            >
                                <span class="select-label">Sort By</span>
                                <div class="select-wrapper-sm">
                                    <select class="form-control input-sm">
                                        <option value="featured"
                                            >Featured</option
                                        >
                                        <option value="rating">Rating</option>
                                        <option value="price">Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="filter-button d-lg-none">
                            <a href="#" class="fixed-col-toggle">FILTER</a>
                        </div>
                    </div>
                    <div
                        class="col col-center d-none d-lg-flex align-items-center justify-content-center"
                    >
                        <div class="view-label">View:</div>
                        <div class="view-in-row">
                            <span data-view="data-to-show-3"
                                ><i class="icon icon-view-3"></i
                            ></span>
                            <span data-view="data-to-show-4"
                                ><i class="icon icon-view-4"></i
                            ></span>
                        </div>
                    </div>
                    <div
                        class="col-right ml-auto d-none d-lg-flex align-items-center"
                    >
                        <div class="items-count">35 item(s)</div>
                        <div class="show-count-holder">
                            <div class="select-label">Show:</div>
                            <div class="select-wrapper-sm">
                                <select class="form-control input-sm">
                                    <option value="featured">12</option>
                                    <option value="rating">36</option>
                                    <option value="price">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Filter Row -->
            <!-- Products Grid -->
            <template v-if="$store.getters.products">
                <div
                    class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid"
                >
                    <div
                        class="prd prd-new"
                        v-for="product in products"
                        :key="product.id"
                    >
                        <div class="prd-inside">
                            <div class="prd-img-area">
                                <a href="product.html" class="prd-img"
                                    ><img
                                        src="images/products/product-placeholder.png"
                                        :data-srcset="
                                            'http://nairobae/images/admin_images/product_images/' +
                                                product.product_image
                                        "
                                        alt="Glamor shoes"
                                        class="js-prd-img lazyload"
                                /></a>
                                <div class="label-new">NEW</div>
                                <a
                                    href="#"
                                    class="label-wishlist icon-heart js-label-wishlist"
                                ></a>
                                <ul
                                    class="list-options color-swatch prd-hidemobile"
                                >
                                    <li
                                        data-image="images/products/product-01.jpg"
                                    >
                                        <a href="#" class="js-color-toggle"
                                            ><img
                                                src="images/products/product-placeholder.png"
                                                data-srcset="images/products/xsmall/product-01.jpg"
                                                class="lazyload"
                                                alt="Color Name"
                                        /></a>
                                    </li>
                                    <li
                                        data-image="images/products/product-01-2.jpg"
                                    >
                                        <a href="#" class="js-color-toggle"
                                            ><img
                                                src="images/products/product-placeholder.png"
                                                data-srcset="images/products/xsmall/product-01-2.jpg"
                                                class="lazyload"
                                                alt="Color Name"
                                        /></a>
                                    </li>
                                </ul>
                                <div class="gdw-loader"></div>
                            </div>
                            <div class="prd-info">
                                <div class="prd-tag prd-hidemobile">
                                    <a href="#">under armor</a>
                                </div>
                                <h2 class="prd-title">
                                    <a href="product.html">{{
                                        product.product_name
                                    }}</a>
                                </h2>
                                <div class="prd-rating prd-hidemobile">
                                    <i class="icon-star fill"></i
                                    ><i class="icon-star fill"></i
                                    ><i class="icon-star fill"></i
                                    ><i class="icon-star fill"></i
                                    ><i class="icon-star"></i>
                                </div>
                                <div class="prd-price">
                                    <div class="price-new">
                                        {{ product.product_price }}
                                    </div>
                                </div>
                                <div class="prd-hover">
                                    <div class="prd-action">
                                        <form action="#">
                                            <input type="hidden" />
                                            <button
                                                class="btn"
                                                data-fancybox
                                                data-src="#modalCheckOut"
                                            >
                                                <i class="icon icon-handbag"></i
                                                ><span>Add To Cart</span>
                                            </button>
                                        </form>
                                        <div class="prd-links">
                                            <a
                                                data-toggle="modal"
                                                @click="viewproduct(product)"
                                                class="icon-eye prd-qview-link js-qview-link btn btn-primary"
                                            ></a>
                                        </div>
                                    </div>
                                    <div class="prd-options prd-hidemobile">
                                        <span class="label-options"
                                            >Sizes:</span
                                        >
                                        <ul class="list-options size-swatch">
                                            <li class="active">
                                                <span>xs</span>
                                            </li>
                                            <li><span>s</span></li>
                                            <li><span>m</span></li>
                                            <li><span>l</span></li>
                                            <li><span>xl</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template v-if="$store.getters.categoryproducts">
                <div
                    class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid"
                >
                    <div
                        class="prd prd-new"
                        v-for="product in categoryproducts"
                        :key="product.id"
                    >
                        <div class="prd-inside">
                            <div class="prd-img-area">
                                <a href="product.html" class="prd-img"
                                    ><img
                                        src="images/products/product-placeholder.png"
                                        :data-srcset="
                                            'http://nairobae/images/admin_images/product_images/' +
                                                product.product_image
                                        "
                                        alt="Glamor shoes"
                                        class="js-prd-img lazyload"
                                /></a>
                                <div class="label-new">NEW</div>
                                <a
                                    href="#"
                                    class="label-wishlist icon-heart js-label-wishlist"
                                ></a>
                                <ul
                                    class="list-options color-swatch prd-hidemobile"
                                >
                                    <li
                                        data-image="images/products/product-01.jpg"
                                    >
                                        <a href="#" class="js-color-toggle"
                                            ><img
                                                src="images/products/product-placeholder.png"
                                                data-srcset="images/products/xsmall/product-01.jpg"
                                                class="lazyload"
                                                alt="Color Name"
                                        /></a>
                                    </li>
                                    <li
                                        data-image="images/products/product-01-2.jpg"
                                    >
                                        <a href="#" class="js-color-toggle"
                                            ><img
                                                src="images/products/product-placeholder.png"
                                                data-srcset="images/products/xsmall/product-01-2.jpg"
                                                class="lazyload"
                                                alt="Color Name"
                                        /></a>
                                    </li>
                                </ul>
                                <div class="gdw-loader"></div>
                            </div>
                            <div class="prd-info">
                                <div class="prd-tag prd-hidemobile">
                                    <a href="#">under armor</a>
                                </div>
                                <h2 class="prd-title">
                                    <a href="product.html">{{
                                        product.product_name
                                    }}</a>
                                </h2>
                                <div class="prd-rating prd-hidemobile">
                                    <i class="icon-star fill"></i
                                    ><i class="icon-star fill"></i
                                    ><i class="icon-star fill"></i
                                    ><i class="icon-star fill"></i
                                    ><i class="icon-star"></i>
                                </div>
                                <div class="prd-price">
                                    <div class="price-new">
                                        {{ product.product_price }}
                                    </div>
                                </div>
                                <div class="prd-hover">
                                    <div class="prd-action">
                                        <form action="#">
                                            <input type="hidden" />
                                            <button
                                                class="btn"
                                                data-fancybox
                                                data-src="#modalCheckOut"
                                            >
                                                <i class="icon icon-handbag"></i
                                                ><span>Add To Cart</span>
                                            </button>
                                        </form>
                                        <div class="prd-links">
                                            <a
                                                data-toggle="modal"
                                                data-target=".bd-example-modal-lg"
                                                class="icon-eye prd-qview-link js-qview-link btn btn-primary"
                                            ></a>
                                        </div>
                                    </div>
                                    <div class="prd-options prd-hidemobile">
                                        <span class="label-options"
                                            >Sizes:</span
                                        >
                                        <ul class="list-options size-swatch">
                                            <li class="active">
                                                <span>xs</span>
                                            </li>
                                            <li><span>s</span></li>
                                            <li><span>m</span></li>
                                            <li><span>l</span></li>
                                            <li><span>xl</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <div class="loader-wrap">
                <div class="dots">
                    <div class="dot one"></div>
                    <div class="dot two"></div>
                    <div class="dot three"></div>
                </div>
            </div>

            <!-- /Products Grid -->
            <div
                class="show-more d-flex mt-4 mt-md-6 justify-content-center align-items-start"
                v-if="$store.getters.moreproducts"
            >
                <a
                    class="btn btn--alt js-product-show-more"
                    data-load="ajax-products-load.html"
                    @click="loadMore"
                    >show more</a
                >
                <!-- <ul class="pagination mt-0">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul> -->
            </div>
            <div
                class="show-more d-flex mt-4 mt-md-6 justify-content-center align-items-start"
                v-if="$store.getters.morecategoryproducts"
            >
                <a
                    class="btn btn--alt js-product-show-more"
                    data-load="ajax-products-load.html"
                    @click="loadMoreCategoryProducts"
                    >show more</a
                >
                <!-- <ul class="pagination mt-0">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul> -->
            </div>
        </div>
        <div>
            <viewproduct></viewproduct>
        </div>
    </div>
</template>

<script>
import viewproduct from "./viewproduct";
export default {
    name: "LoadProducts",
    components: {
        viewproduct
    },
    data() {
        return {};
    },
    mounted() {
        this.$store.dispatch("getProducts");
    },

    methods: {
        loadMore() {
            this.$store.dispatch("loadmore", this.$store.getters.nextpage);
        },
        loadMoreCategoryProducts() {
            let payload = {
                url: this.$store.getters.categoryproductsurl,
                nextpage: this.$store.getters.nextpagecatprod
            };
            this.$store.dispatch("loadmorecatprod", payload);
        },
        viewproduct(product) {
            this.$store.dispatch("viewproduct", product);
        }
    },

    computed: {
        products() {
            return this.$store.getters.products;
        },

        categoryproducts() {
            return this.$store.getters.categoryproducts;
        }
    }
};
</script>
