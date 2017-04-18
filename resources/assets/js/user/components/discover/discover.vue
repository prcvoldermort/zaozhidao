<template>
    <div class="discover">
        <div class="swiper-container" ref="swiperContainer">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#">
                        <img alt="swiper picture 1" v-bind:src="swiperPic1">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img alt="swiper picture 2" v-bind:src="swiperPic2">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img alt="swiper picture 3" v-bind:src="swiperPic3">
                    </a>
                </div>
            </div>
        </div>
        <div class="new-reading-container">
            <div class="weui-panel weui-panel_access">
                <div class="weui-panel__hd">
                    最新解读
                </div>
                <div class="weui-panel__bd">
                    <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" v-bind:src="swiperPic1" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">标题一</h4>
                            <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                        </div>
                    </a>
                    <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" v-bind:src="swiperPic2" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">标题一</h4>
                            <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                        </div>
                    </a>
                </div>
                <div class="weui-panel__ft">
                    <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                        <div class="weui-cell__bd">查看更多</div>
                        <span class="weui-cell__ft"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="new-response-container">
            <div class="weui-panel weui-panel_access">
                <div class="weui-panel__hd">
                    最新回复
                </div>
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_test">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                    <div class="weui-media-box weui-media-box_test">
                        <h4 class="weui-media-box__title">标题二</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </div>
                <div class="weui-panel__ft">
                    <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                        <div class="weui-cell__bd">查看更多</div>
                        <span class="weui-cell__ft"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="my-focus-container">
            <div class="weui-panel">
                <div class="weui-panel__hd">
                    我的关注
                </div>
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_small-appmsg">
                        <div class="weui-cells">
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>XXX的项目</p>
                                </div>
                                <span class="weui-cell__ft"></span>
                            </a>
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>AAA的项目</p>
                                </div>
                                <span class="weui-cell__ft"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    import SwiperCSS from '../../../../../../node_modules/swiper/dist/css/swiper.min.css';
    import Swiper from 'swiper';
    import swiperPic1 from '../../../../images/source/swiper1.png';
    import swiperPic2 from '../../../../images/source/swiper2.png';
    import swiperPic3 from '../../../../images/source/swiper3.png';

    export default {
        mounted () {
            let mySwiper = new Swiper(this.$refs.swiperContainer, {

            })
        },
        data () {
          return {
              swiperPic1: swiperPic1,
              swiperPic2: swiperPic2,
              swiperPic3: swiperPic3
          }
        },
        methods: {

        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    @import "../../../../sass/rem";
    .discover {
        .swiper-container {
            img {
                height: px2rem(185);
            }
        }
        .new-reading-container {
            margin-bottom: px2rem(10);
        }
        .new-response-container {
            margin-bottom: px2rem(10);
        }
        .my-focus-container {
            margin-bottom: px2rem(10);
        }
    }
</style>