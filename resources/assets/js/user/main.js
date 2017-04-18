// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
//import AMap from 'vue-amap'
import App from './App'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import discover from './components/discover/discover.vue'
import map from './components/map/map.vue'
import personal from './components/personal/personal.vue'
import progress from './components/progress/progress.vue'
import track from './components/track/track.vue'
import projectDetail from './components/projectDetail/projectDetail.vue'
import projectList from './components/projectList/projectList.vue'
import hackerNews from './components/hackerNews/hackerNews.vue'

import BaiduMap from 'vue-baidu-map'

Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(BaiduMap,{
    ak: '46add4615d639b6ad017b5086b104310'
});
//Vue.use(AMap);
// AMap.initAMapApiLoader({
//     key: 'd754d51a8ab893194300fe318635d023',
//     plugin: ['AMap.Autocomplete', 'AMap.PlaceSearch', 'AMap.Scale', 'AMap.OverView', 'AMap.ToolBar', 'AMap.MapType', 'AMap.PolyEditor', 'AMap.CircleEditor']
// });

const routes = [
    {
        path: '/discover',
        component: discover
    },
    {
        path: '/map',
        component: map
    },
    {
        path: '/personal',
        component: personal
    },
    {
        path: '/progress',
        component: progress
    },
    {
        path: '/track',
        component: track
    },
    {
        path: '/projectDetail/:id',
        component: projectDetail
    },
    {
        path: '/projectList',
        component: projectList
    },
    {
        path: '/hackerNews',
        component: hackerNews
    }
]

const router = new VueRouter({
    routes
})

/* eslint-disable no-new */
new Vue({
    router,
    el: '#app',
    render: h => h(App)
}).$mount()