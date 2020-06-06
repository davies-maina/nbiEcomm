<template>
    <div
        class="modal fade viewproduct"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myLargeModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal--quickview" id="modalQuickView">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="prd-block" id="prdGalleryModal">
                            <div class="prd-block_info">
                                <div
                                    class="prd-block_info-row info-row-1 mb-md-1"
                                >
                                    <div class="info-row-col-1">
                                        <h1 class="prd-block_title">
                                            {{ viewproduct.product_name }}
                                        </h1>
                                    </div>
                                    <div class="info-row-col-2">
                                        <div class="product-sku">
                                            SKU: <span>#0005</span>
                                        </div>
                                        <div class="prd-block__labels">
                                            <span class="prd-label--sale"
                                                >SALE</span
                                            >
                                            <span class="prd-label--new"
                                                >NEW</span
                                            >
                                        </div>
                                        <div class="prd-block_link">
                                            <a
                                                href="#"
                                                class="icon-heart-1"
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="prd-block_info-row info-row-2">
                                    <form action="#">
                                        <div class="info-row-col-3">
                                            <div class="prd-block_price">
                                                <span
                                                    class="prd-block_price--actual"
                                                    >{{
                                                        viewproduct.product_price
                                                    }}</span
                                                >
                                                <span
                                                    class="prd-block_price--old"
                                                    >$210.00</span
                                                >
                                            </div>
                                        </div>
                                        <div class="info-row-col-4">
                                            <div class="prd-block_price">
                                                <span
                                                    class="prd-block_price--actual"
                                                    >$180.00</span
                                                >
                                                <span
                                                    class="prd-block_price--old"
                                                    >$210.00</span
                                                >
                                            </div>
                                            <div class="prd-block_qty">
                                                <span class="option-label"
                                                    >Qty:</span
                                                >
                                                <div
                                                    class="qty qty-changer qty-changer--lg"
                                                >
                                                    <fieldset>
                                                        <input
                                                            type="button"
                                                            value="-"
                                                            class="decrease"
                                                        />
                                                        <input
                                                            type="text"
                                                            class="qty-input"
                                                            value="2"
                                                            data-min="0"
                                                            data-max="10"
                                                        />
                                                        <input
                                                            type="button"
                                                            value="+"
                                                            class="increase"
                                                        />
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="prd-block_options">
                                                <div
                                                    class="form-group select-wrapper-sm"
                                                >
                                                    <select
                                                        class="form-control"
                                                        tabindex="0"
                                                    >
                                                        <option value=""
                                                            >36 / silver
                                                            $34.00</option
                                                        >
                                                        <option value=""
                                                            >38 / silver
                                                            $34.00</option
                                                        >
                                                        <option value=""
                                                            >36 / gold
                                                            $45.00</option
                                                        >
                                                        <option value=""
                                                            >38 / gold
                                                            $45.00</option
                                                        >
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="prd-block_actions">
                                                <div class="btn-wrap">
                                                    <button
                                                        class="btn btn--add-to-cart-sm"
                                                    >
                                                        <i
                                                            class="icon icon-handbag"
                                                        ></i
                                                        ><span
                                                            >Add to cart</span
                                                        >
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="prd-block_info js-prd-m-holder"></div>
                            <!-- Product Gallery -->
                            <div class="product-previews-wrapper">
                                <div
                                    class="product-quickview-carousel slick-arrows-aside-simple js-product-quickview-carousel"
                                >
                                    <div>
                                        <a
                                            href="images/products/large/product-01.jpg"
                                            data-fancybox="gallery"
                                            ><img
                                                src="images/products/product-01.jpg"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div>
                                        <a
                                            href="images/products/large/product-01-2.jpg"
                                            data-fancybox="gallery"
                                            ><img
                                                src="images/products/product-01-2.jpg"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div>
                                        <a
                                            href="images/products/large/product-01-3.jpg"
                                            data-fancybox="gallery"
                                            ><img
                                                src="images/products/product-01-3.jpg"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div>
                                        <a
                                            href="images/products/large/product-01-4.jpg"
                                            data-fancybox="gallery"
                                            ><img
                                                src="images/products/product-01-4.jpg"
                                                alt=""
                                        /></a>
                                    </div>
                                    <div>
                                        <a
                                            href="images/products/large/product-01-5.jpg"
                                            data-fancybox="gallery"
                                            ><img
                                                src="images/products/product-01-5.jpg"
                                                alt=""
                                        /></a>
                                    </div>
                                </div>
                                <div class="gdw-loader"></div>
                            </div>
                            <!-- /Product Gallery -->
                            <div class="mt-3 mt-md-4">
                                <h2>Description</h2>
                                <p>
                                    {{ viewproduct.product_description }}
                                </p>
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-borderless"
                                    >
                                        <tbody>
                                            <tr>
                                                <td>FABRIC</td>
                                                <td>Metallic faux leather</td>
                                            </tr>
                                            <tr>
                                                <td>STYLE</td>
                                                <td>
                                                    Goatskin lining, Strappy
                                                    silhouette, Chunky heel,
                                                    Buckle at ankle
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>MANUFACTURE</td>
                                                <td>Made in Italy</td>
                                            </tr>
                                            <tr>
                                                <td>MATERIAL</td>
                                                <td>
                                                    Rubber heel patch at leather
                                                    sole
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>WEIGHT</td>
                                                <td>
                                                    0.05, 0.06, 0.07ess cards
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>BOX</td>
                                                <td>
                                                    This item cannot be
                                                    gift-boxed
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        viewproduct() {
            return this.$store.getters.viewproduct;
        }
    }
};
</script>
