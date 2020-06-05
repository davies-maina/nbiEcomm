<template>
    <div>
        <header class="hdr global_width hdr_sticky hdr-mobile-style2">
            <!-- Promo TopLine -->
            <!-- <div class="bgcolor" style="background-image: url(images/promo-topline-bg.png);">
            <div class="promo-topline" data-expires="1" style="display: none;">
                <div class="container">
                    <div class="promo-topline-item"><b>GET 10% OFF YOUR FIRST ORDER WITH CODE <span style="color: #000">GOODWIN</span>&nbsp;<span class="hidden-xs">&nbsp;|&nbsp;&nbsp; FREE GROUND SHIPPING OVER $250</span></b></div>
                </div><a href="#" class="promo-topline-close js-promo-topline-close"><i class="icon-cross"></i></a>
            </div>
        </div> -->
            <!-- /Promo TopLine -->
            <!-- Mobile Menu -->
            <div class="mobilemenu js-push-mbmenu">
                <div class="mobilemenu-content">
                    <div class="mobilemenu-close mobilemenu-toggle">CLOSE</div>
                    <div class="mobilemenu-scroll">
                        <div class="mobilemenu-search"></div>
                        <div class="nav-wrapper show-menu">
                            <div class="nav-toggle">
                                <span class="nav-back"
                                    ><i class="icon-arrow-left"></i
                                ></span>
                                <span class="nav-title"></span>
                            </div>
                            <ul class="nav nav-level-1">
                                <li>
                                    <a href="category.html">Categories</a
                                    ><span class="arrow"></span>
                                    <ul class="nav-level-2">
                                        <li
                                            v-for="category in categories"
                                            :key="category.id"
                                        >
                                            <a href="category.html" title="">{{
                                                category.category_name
                                            }}</a
                                            ><span class="arrow"></span>
                                            <ul class="nav-level-3">
                                                <li
                                                    v-for="subcategory in category.subcategories"
                                                    :key="subcategory.id"
                                                >
                                                    <a href="category.html">{{
                                                        subcategory.category_name
                                                    }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="mobilemenu-bottom">
                            <div class="mobilemenu-currency"></div>
                            <div class="mobilemenu-language"></div>
                            <div class="mobilemenu-settings"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Mobile Menu -->
            <div class="hdr-mobile show-mobile">
                <div class="hdr-content">
                    <div class="container">
                        <!-- Menu Toggle -->
                        <div class="menu-toggle">
                            <a href="#" class="mobilemenu-toggle"
                                ><i class="icon icon-menu"></i
                            ></a>
                        </div>
                        <!-- /Menu Toggle -->
                        <div class="logo-holder">
                            <a href="index-2.html" class="logo"
                                ><img
                                    src="images/logo.png"
                                    srcset="images/logo-retina.png 2x"
                                    alt=""
                            /></a>
                        </div>
                        <div class="hdr-mobile-right">
                            <div class="hdr-topline-right links-holder"></div>
                            <div class="minicart-holder"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hdr-desktop hide-mobile">
                <div class="hdr-topline">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto hdr-topline-left">
                                <!-- Header Language -->
                                <div class="dropdn dropdn_language">
                                    <div class="dropdn dropdn_caret">
                                        <a href="#" class="dropdn-link">ENG</a>
                                        <div class="dropdn-content">
                                            <div class="container">
                                                <ul>
                                                    <li class="active">
                                                        <a href="#"
                                                            ><img
                                                                src="images/flags/en.png"
                                                                alt=""
                                                            />English</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            ><img
                                                                src="images/flags/sp.png"
                                                                alt=""
                                                            />Spanish</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            ><img
                                                                src="images/flags/de.png"
                                                                alt=""
                                                            />German</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            ><img
                                                                src="images/flags/fr.png"
                                                                alt=""
                                                            />French</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Header Language -->
                                <!-- Header Currency -->
                                <div class="dropdn dropdn_currency">
                                    <div class="dropdn dropdn_caret">
                                        <a href="#" class="dropdn-link"
                                            >$ USD</a
                                        >
                                        <div class="dropdn-content">
                                            <div class="container">
                                                <ul>
                                                    <li class="active">
                                                        <a href="#"
                                                            ><span>$ USD</span
                                                            ><span
                                                                >United states
                                                                dollars</span
                                                            ></a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            ><span>€ EUR</span
                                                            ><span
                                                                >Euro</span
                                                            ></a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            ><span>£ GBP</span
                                                            ><span
                                                                >United kingdom
                                                                pounds</span
                                                            ></a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            ><span>$ CAD</span
                                                            ><span
                                                                >Canadian
                                                                dollars</span
                                                            ></a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Header Currency -->
                            </div>
                            <div class="col hdr-topline-center">
                                <div class="custom-text">
                                    <span>FREE</span> STANDARD DELIVERY ON
                                    ORDERS OVER $ 150
                                </div>
                                <div class="custom-text">
                                    <i class="icon icon-mobile"></i
                                    ><b>8 800 265 89 56</b>
                                </div>
                            </div>
                            <div
                                class="col-auto hdr-topline-right links-holder"
                            >
                                <!-- Header Search -->
                                <div
                                    class="dropdn dropdn_search hide-mobile @@classes"
                                >
                                    <a href="#" class="dropdn-link"
                                        ><i class="icon icon-search2"></i
                                        ><span>Search</span></a
                                    >
                                    <div class="dropdn-content">
                                        <div class="container">
                                            <form action="#" class="search">
                                                <button
                                                    type="submit"
                                                    class="search-button"
                                                >
                                                    <i class="icon-search2"></i>
                                                </button>
                                                <input
                                                    type="text"
                                                    class="search-input"
                                                    placeholder="search keyword"
                                                />
                                                <div
                                                    class="search-popular js-search-autofill"
                                                >
                                                    <span
                                                        class="search-popular-label"
                                                        >popular searches:</span
                                                    ><a href="#">Jeans</a>
                                                    <a href="#">Sunglazsses</a>
                                                    <a href="#">hand bags</a>
                                                    <a href="#">Discount</a>
                                                    <a href="#"
                                                        >St.Valentine’s gift</a
                                                    >
                                                    <a href="#">maxi dress</a>
                                                    <a href="#">Underwear</a
                                                    ><a href="#"
                                                        >new in clothing</a
                                                    >
                                                    <a href="#">men tops</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Header Search -->
                                <!-- Header Wishlist -->
                                <div class="dropdn dropdn_wishlist @@classes">
                                    <a
                                        href="account-wishlist.html"
                                        class="dropdn-link"
                                        ><i class="icon icon-heart-1"></i
                                        ><span>Wishlist</span></a
                                    >
                                </div>
                                <!-- /Header Wishlist -->
                                <!-- Header Account -->
                                <div class="dropdn dropdn_account @@classes">
                                    <a href="#" class="dropdn-link"
                                        ><i class="icon icon-person"></i
                                        ><span>My Account</span></a
                                    >
                                    <div class="dropdn-content">
                                        <div class="container">
                                            <div class="dropdn-close">
                                                CLOSE
                                            </div>
                                            <ul>
                                                <li>
                                                    <a
                                                        href="account-details.html"
                                                        ><i
                                                            class="icon icon-person-fill"
                                                        ></i
                                                        ><span
                                                            >My Account</span
                                                        ></a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="login.html"
                                                        ><i
                                                            class="icon icon-lock"
                                                        ></i
                                                        ><span>Log In</span></a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="account-create.html"
                                                        ><i
                                                            class="icon icon-person-fill-add"
                                                        ></i
                                                        ><span
                                                            >Register</span
                                                        ></a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="checkout.html"
                                                        ><i
                                                            class="icon icon-check-box"
                                                        ></i
                                                        ><span
                                                            >Checkout</span
                                                        ></a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Header Account -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hdr-content hide-mobile">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto logo-holder">
                                <a href="index-2.html" class="logo"
                                    ><img
                                        src="images/logo.png"
                                        srcset="images/logo-retina.png 2x"
                                        alt=""
                                /></a>
                            </div>
                            <!--navigation-->
                            <div
                                class="prev-menu-scroll icon-angle-left prev-menu-js"
                            ></div>
                            <div class="nav-holder">
                                <div class="hdr-nav">
                                    <!--mmenu-->
                                    <ul class="mmenu mmenu-js">
                                        <li class="mmenu-item--mega">
                                            <a href="category.html"
                                                >Categories</a
                                            >
                                            <div
                                                class="mmenu-submenu mmenu-submenu-with-sublevel"
                                            >
                                                <div
                                                    class="mmenu-submenu-inside"
                                                >
                                                    <div class="container">
                                                        <div
                                                            class="mmenu-cols column-5"
                                                        >
                                                            <div
                                                                class="mmenu-col"
                                                                v-for="category in categories"
                                                                :key="
                                                                    category.id
                                                                "
                                                            >
                                                                <h3
                                                                    class="submenu-title"
                                                                >
                                                                    <a
                                                                        @click="
                                                                            loadCategoryProducts(
                                                                                category.url
                                                                            )
                                                                        "
                                                                        >{{
                                                                            category.category_name
                                                                        }}</a
                                                                    >
                                                                </h3>
                                                                <ul
                                                                    class="submenu-list"
                                                                >
                                                                    <li
                                                                        v-for="subcategory in category.subcategories"
                                                                        :key="
                                                                            subcategory.id
                                                                        "
                                                                    >
                                                                        <a
                                                                            href="category.html"
                                                                            >{{
                                                                                subcategory.category_name
                                                                            }}</a
                                                                        >
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mmenu-bottom"
                                                        >
                                                            <div
                                                                class="custom-text"
                                                            >
                                                                <span
                                                                    >FREE</span
                                                                >
                                                                STANDARD
                                                                DELIVERY ON
                                                                ORDERS OVER $
                                                                150
                                                            </div>
                                                            <div
                                                                class="custom-text"
                                                            >
                                                                <span
                                                                    >100%</span
                                                                >
                                                                money back
                                                                guarantee
                                                            </div>
                                                            <div
                                                                class="custom-text"
                                                            >
                                                                <span
                                                                    >24/7</span
                                                                >
                                                                customer support
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!--/mmenu-->
                                </div>
                            </div>
                            <div
                                class="next-menu-scroll icon-angle-right next-menu-js"
                            ></div>
                            <!--//navigation-->
                            <div class="col-auto minicart-holder">
                                <div class="minicart minicart-js">
                                    <a href="#" class="minicart-link"
                                        ><i class="icon icon-handbag"></i>
                                        <span class="minicart-qty">3</span>
                                        <span class="minicart-title"
                                            >Shopping Cart</span
                                        >
                                        <span class="minicart-total"
                                            >$750.00</span
                                        ></a
                                    >
                                    <div class="minicart-drop">
                                        <div class="container">
                                            <div class="minicart-drop-close">
                                                CLOSE
                                            </div>
                                            <div class="minicart-drop-content">
                                                <h3>Recently added items:</h3>
                                                <div class="minicart-prd">
                                                    <div
                                                        class="minicart-prd-image"
                                                    >
                                                        <a href="#"
                                                            ><img
                                                                src="images/products/product-placeholder.png"
                                                                data-srcset="images/products/xsmall/product-05.jpg"
                                                                class="lazyload"
                                                                alt=""
                                                        /></a>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-name"
                                                    >
                                                        <h5>
                                                            <a href="#"
                                                                >canverse</a
                                                            >
                                                        </h5>
                                                        <h2>
                                                            <a href="#"
                                                                >Checkered
                                                                shirt</a
                                                            >
                                                        </h2>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-qty"
                                                    >
                                                        <span>qty:</span>
                                                        <b>1</b>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-price"
                                                    >
                                                        <span>price:</span>
                                                        <b>$ 75.00</b>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-action"
                                                    >
                                                        <a
                                                            href="#"
                                                            class="icon-heart js-label-wishlist"
                                                        ></a>
                                                        <a
                                                            href="product.html"
                                                            class="icon-pencil"
                                                        ></a>
                                                        <a
                                                            href="#"
                                                            class="icon-cross js-product-remove"
                                                        ></a>
                                                    </div>
                                                </div>
                                                <div class="minicart-prd">
                                                    <div
                                                        class="minicart-prd-image"
                                                    >
                                                        <a href="#"
                                                            ><img
                                                                src="images/products/product-placeholder.png"
                                                                data-srcset="images/products/xsmall/product-02.jpg"
                                                                class="lazyload"
                                                                alt=""
                                                        /></a>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-name"
                                                    >
                                                        <h5>
                                                            <a href="#"
                                                                >canverse</a
                                                            >
                                                        </h5>
                                                        <h2>
                                                            <a href="#"
                                                                >Long top with
                                                                print</a
                                                            >
                                                        </h2>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-qty"
                                                    >
                                                        <span>qty:</span>
                                                        <b>1</b>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-price"
                                                    >
                                                        <span>price:</span>
                                                        <b>$ 20.00</b>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-action"
                                                    >
                                                        <a
                                                            href="#"
                                                            class="icon-heart js-label-wishlist"
                                                        ></a>
                                                        <a
                                                            href="product.html"
                                                            class="icon-pencil"
                                                        ></a>
                                                        <a
                                                            href="#"
                                                            class="icon-cross js-product-remove"
                                                        ></a>
                                                    </div>
                                                </div>
                                                <div class="minicart-prd">
                                                    <div
                                                        class="minicart-prd-image"
                                                    >
                                                        <a href="#"
                                                            ><img
                                                                src="images/products/product-placeholder.png"
                                                                data-srcset="images/products/xsmall/product-14.jpg"
                                                                class="lazyload"
                                                                alt=""
                                                        /></a>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-name"
                                                    >
                                                        <h5>
                                                            <a href="#"
                                                                >saucany</a
                                                            >
                                                        </h5>
                                                        <h2>
                                                            <a href="#"
                                                                >Knitted
                                                                sweater</a
                                                            >
                                                        </h2>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-qty"
                                                    >
                                                        <span>qty:</span>
                                                        <b>1</b>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-price"
                                                    >
                                                        <span>price:</span>
                                                        <b>$ 199.00</b>
                                                    </div>
                                                    <div
                                                        class="minicart-prd-action"
                                                    >
                                                        <a
                                                            href="#"
                                                            class="icon-heart js-label-wishlist"
                                                        ></a>
                                                        <a
                                                            href="product.html"
                                                            class="icon-pencil"
                                                        ></a>
                                                        <a
                                                            href="#"
                                                            class="icon-cross js-product-remove"
                                                        ></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="minicart-drop-total"
                                                >
                                                    <div class="float-right">
                                                        <span
                                                            class="minicart-drop-summa"
                                                            ><span
                                                                >Cart
                                                                Subtotal:</span
                                                            >
                                                            <b
                                                                >$ 294.00</b
                                                            ></span
                                                        >
                                                        <div
                                                            class="minicart-drop-btns-wrap"
                                                        >
                                                            <a
                                                                href="checkout.html"
                                                                class="btn"
                                                                ><i
                                                                    class="icon-check-box"
                                                                ></i
                                                                ><span
                                                                    >checkout</span
                                                                ></a
                                                            >
                                                            <a
                                                                href="cart.html"
                                                                class="btn btn--alt"
                                                                ><i
                                                                    class="icon-handbag"
                                                                ></i
                                                                ><span
                                                                    >view
                                                                    cart</span
                                                                ></a
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="float-left">
                                                        <a
                                                            href="cart.html"
                                                            class="btn btn--alt"
                                                            ><i
                                                                class="icon-handbag"
                                                            ></i
                                                            ><span
                                                                >view cart</span
                                                            ></a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sticky-holder compensate-for-scrollbar">
                <div class="container">
                    <div class="row">
                        <a href="#" class="mobilemenu-toggle show-mobile"
                            ><i class="icon icon-menu"></i
                        ></a>
                        <div class="col-auto logo-holder-s">
                            <a href="index-2.html" class="logo"
                                ><img
                                    src="images/logo.png"
                                    srcset="images/logo-retina.png 2x"
                                    alt=""
                            /></a>
                        </div>
                        <!--navigation-->
                        <div
                            class="prev-menu-scroll icon-angle-left prev-menu-js"
                        ></div>
                        <div class="nav-holder-s"></div>
                        <div
                            class="next-menu-scroll icon-angle-right next-menu-js"
                        ></div>
                        <!--//navigation-->
                        <div class="col-auto minicart-holder-s"></div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    mounted() {
        this.$store.dispatch("getCategories");
    },
    computed: {
        categories() {
            return this.$store.getters.categories;
        }
    },

    methods: {
        loadCategoryProducts(url) {
            this.$store.dispatch("loadcategoryproducts", url);
        }
    }
};
</script>
