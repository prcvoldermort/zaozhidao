<template>
    <div class="track">
        <div class="logis-detail">
            <ul>
                <li>
                    <p class="logis-detail-date">昨天</p>
                    <div class="logis-detail-d logis-detail-first">
                        <div class="logis-detail-content">
                            <p class="logis-detail-content-time">23:56</p>
                            <p class="logis-detail-content-detail">快件已从 中山中心 发出</p>
                        </div>
                    </div>
                    <div class="logis-detail-d">
                        <div class="logis-detail-content">
                            <p class="logis-detail-content-time">23:37</p>
                            <p class="logis-detail-content-detail">快件已从 中山中心 发出</p>
                        </div>
                    </div>
                    <div class="logis-detail-d">
                        <div class="logis-detail-content">
                            <p class="logis-detail-content-time">23:37</p>
                            <p class="logis-detail-content-detail">快件已从 中山中心 发出</p>
                        </div>
                    </div>
                    <div class="logis-detail-d">
                        <div class="logis-detail-content">
                            <p class="logis-detail-content-time">23:37</p>
                            <p class="logis-detail-content-detail">快件已从 中山中心 发出</p>
                        </div>
                    </div>
                    <div class="logis-detail-d">
                        <div class="logis-detail-content">
                            <p class="logis-detail-content-time">23:37</p>
                            <p class="logis-detail-content-detail">快件已从 中山中心 发出</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {

            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    @import "../../../../sass/rem";

    .track {
        background-color: #EEEEEE;
        ul, ol, li {
            list-style: none;
        }
        .logis-detail {
            ul {
                .logis-detail-date {
                    width: px2rem(40);
                    padding: px2rem(10) 0 px2rem(10) px2rem(4);
                    text-align: right;
                    font-size: px2rem(14);
                }
                .logis-detail-d {
                    border-left: px2rem(2) solid #bdbdbd;
                    padding: px2rem(10) 0 px2rem(10) px2rem(35);
                    margin-left: px2rem(25);
                    position: relative;
                }
                .logis-detail-d:after {
                    content: '';
                    display: inline-block;
                    position: absolute;
                    left: px2rem(-6);
                    top: px2rem(30);
                    width: px2rem(6);
                    height: px2rem(6);
                    border-radius: px2rem(10);
                    background: #bdbdbd;
                    border: px2rem(2) solid #EEEEEE;
                }
                .logis-detail-content {
                    display: -webkit-box;
                    position: relative;
                    background: #dddddd;
                    padding: px2rem(5) px2rem(10);
                    border-radius: px2rem(2);
                    font-size: px2rem(14);
                    .logis-detail-content-time {
                        width: px2rem(50);
                        line-height: px2rem(25);
                    }
                    .logis-detail-content-detail {
                        -webkit-box-flex: 1;
                        line-height: px2rem(25);
                    }
                }
                .logis-detail-content:after {
                    content: '';
                    display: inline-block;
                    position: absolute;
                    left: px2rem(-10);
                    top: px2rem(18);
                    border-left: px2rem(10) solid #EEEEEE;
                    border-bottom: px2rem(10) solid #dddddd;
                }
                li:first-child {
                    color: #666666;
                    position: relative;
                    p.logis-detail-date {
                        color: #f40;
                    }
                    .logis-detail-first {
                        border-left: px2rem(2) solid #f40;
                        .logis-detail-content {
                            background: #f40;
                            color: #ffffff;
                        }
                        .logis-detail-content:after {
                            border-bottom-color: #f40;
                        }
                    }
                    .logis-detail-first:after {
                        background: #f40;
                        border: px2rem(2) solid #EEEEEE;
                    }
                }

            }
        }
    }
</style>