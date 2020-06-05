<template>
    <div>
        <div class="holder fullboxed bgcolor mt-0 py-2 py-sm-3">
            <div class="container">
                <div class="row bnr-grid">
                    <div
                        class="col-md-4 "
                        v-for="section in sectionsAll"
                        :key="section.id"
                    >
                        <a href="#" class="bnr-wrap">
                            <div
                                class="bnr bnr1 bnr--style-1 bnr--right bnr--middle bnr-hover-scale"
                                data-fontratio="5.55"
                            >
                                <img
                                    src=""
                                    :data-src="
                                        'http://nairobae/images/admin_images/section_images/' +
                                            section.section_image
                                    "
                                    alt="Banner"
                                    class="lazyload"
                                />
                                <span class="bnr-caption"
                                    ><span class="bnr-text-wrap"
                                        ><span class="bnr-text1"
                                            >new arrivals</span
                                        >
                                        <span class="bnr-text2">{{
                                            section.name
                                        }}</span>
                                        <span class="btn-decor bnr-btn"
                                            >shop now<span
                                                class="btn-line"
                                            ></span></span></span
                                ></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["sections"],
    created() {
        /* console.log(this.sectionsAll); */
    },

    computed: {
        sectionsAll() {
            return this.sections;
        }
    }
};
</script>
