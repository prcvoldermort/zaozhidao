<template>
    <div class="weui-tab" style="position: static">
        <div class="weui-tab__panel">
            <router-view></router-view>
        </div>
        <div class="weui-tabbar">
            <router-link to="/discover" class="weui-tabbar__item weui-bar__item_on">
                <i class="fa fa-safari weui-tabbar__icon" aria-hidden="true"></i>
                <p class="weui-tabbar__label">发现</p>
            </router-link>
            <router-link to="/map" class="weui-tabbar__item">
                <i class="fa fa-map-o weui-tabbar__icon" aria-hidden="true"></i>
                <p class="weui-tabbar__label">地图</p>
            </router-link>
            <router-link to="/projectList" class="weui-tabbar__item">
                <i class="fa fa-rss weui-tabbar__icon" aria-hidden="true"></i>
                <p class="weui-tabbar__label">列表</p>
            </router-link>
            <router-link to="/personal" class="weui-tabbar__item">
                <i class="fa fa-user-o weui-tabbar__icon" aria-hidden="true"></i>
                <p class="weui-tabbar__label">我的</p>
            </router-link>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    import weui from 'weui';
    import fontawesome from '../../../../node_modules/font-awesome/css/font-awesome.min.css';

    export default {
        components: {

        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    .weui-tab {
        height: 100%;
        .weui-tabbar {
            position: absolute;
            bottom: 0;
        }
        .weui-tab__panel {
            position: absolute;
            width: 100%;
        }
    }
</style>