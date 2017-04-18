// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
//import AMap from 'vue-amap'
import App from './App'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VueHtml5Editor from 'vue-html5-editor'
import index from './components/index/index.vue'
import projectManagement from './components/projectManagement/projectManagement.vue'
import newProjectComponent from './components/newProjectComponent/newProjectComponent.vue'
import createProjectSuccess from './components/createProjectSuccess/createProjectSuccess.vue'
import articlePreview from './components/articlePreview/articlePreview.vue'
import mapAddPoint from './components/mapAddPoint/mapAddPoint.vue'
import baiduMapVueTest from './components/baiduMapVueTest/baiduMapVueTest.vue'
import baiduMapMultipleMarkerInfoWindow from './components/baiduMapMultipleMarkerInfoWindow/baiduMapMultipleMarkerInfoWindow.vue'
import baiduMapAddOverlay from './components/baiduMapAddOverlay/baiduMapAddOverlay.vue'
import baiduMapCurrentLocation from './components/baiduMapCurrentLocation/baiduMapCurrentLocation.vue'
import newProjectPage from './components/newProjectPage/newProjectPage.vue'
import footerComponent from './components/footerComponent/footerComponent.vue'

//import BaiduMap from 'vue-baidu-map'

Vue.use(VueRouter);
Vue.use(VueResource);
// Vue.use(BaiduMap,{
//     ak: '46add4615d639b6ad017b5086b104310'
// });

Vue.use(VueHtml5Editor,{
    name: "vue-html5-editor",
    showModuleName: true,
    icons: {
        text: "fa fa-pencil",
        color: "fa fa-paint-brush",
        font: "fa fa-font",
        align: "fa fa-align-justify",
        list: "fa fa-list",
        link: "fa fa-chain",
        unlink: "fa fa-chain-broken",
        tabulation: "fa fa-table",
        image: "fa fa-file-image-o",
        hr: "fa fa-minus",
        eraser: "fa fa-eraser",
        undo: "fa-undo fa",
        "full-screen": "fa fa-arrows-alt",
        info: "fa fa-info"
    },
    //配置图片模块
    image: {
        //后端图片上传的地址
        server: null,
        //请求时表单参数名
        fieldName: "image",
        //文件最大尺寸
        sizeLimit: 512*1024,
        //是否压缩
        compress: true,
        //压缩图片参数选项
        width: 1600,
        height: 1600,
        quality: 80,
        // handle response data, return image url
        uploadHandler(responseText){
            //default accept json data like  {ok:false,msg:"unexpected"} or {ok:true,data:"image url"}
            var json = JSON.parse(responseText);
            if (!json.ok){
                alert(json.msg);
            }else {
                return json.data;
            }
        }
    },
    // 语言，内建支持英文(en-us)和中文(zh-cn)
    language: "zh-cn",
    //自定义语言
    i18n: {
        //specify your language here
        "zh-cn": {
            "align": "对齐方式",
            "image": "图片",
            "list": "列表",
            "link": "链接",
            "unlink": "去除链接",
            "table": "表格",
            "font": "文字",
            "full screen": "全屏",
            "text": "排版",
            "eraser": "格式清除",
            "info": "关于",
            "color": "颜色",
            "please enter a url": "请输入地址",
            "create link": "创建链接",
            "bold": "加粗",
            "italic": "倾斜",
            "underline": "下划线",
            "strike through": "删除线",
            "subscript": "上标",
            "superscript": "下标",
            "heading": "标题",
            "font name": "字体",
            "font size": "文字大小",
            "left justify": "左对齐",
            "center justify": "居中",
            "right justify": "右对齐",
            "ordered list": "有序列表",
            "unordered list": "无序列表",
            "fore color": "前景色",
            "background color": "背景色",
            "row count": "行数",
            "column count": "列数",
            "save": "确定",
            "upload": "上传",
            "progress": "进度",
            "unknown": "未知",
            "please wait": "请稍等",
            "error": "错误",
            "abort": "中断",
            "reset": "重置"
        }
    },
    // 隐藏不想要显示出来的模块
    hiddenModules: [],
    // 自定义要显示的模块，并控制顺序
    visibleModules: [
        "text",
        "color",
        "font",
        "align",
        "list",
        "link",
        "unlink",
        "tabulation",
        "image",
        "hr",
        "eraser",
        "undo",
        "full-screen",
        "info",
    ],
    // 扩展模块，具体可以参考examples或查看源码
    modules: {
        //omit,reference to source code of build-in modules
    }
});
//Vue.use(AMap);
// AMap.initAMapApiLoader({
//     key: 'd754d51a8ab893194300fe318635d023',
//     plugin: ['AMap.Autocomplete', 'AMap.PlaceSearch', 'AMap.Scale', 'AMap.OverView', 'AMap.ToolBar', 'AMap.MapType', 'AMap.PolyEditor', 'AMap.CircleEditor']
// });

const routes = [
    // {
    //     path: '/discover',
    //     component: discover
    // },
    {
        path: '/index',
        component: index
    },
    {
        path: '/projectManagement',
        component: projectManagement
    },
    {
        path: '/newProject',
        component: newProjectComponent
    },
    {
        path: '/createProjectSuccess/:projectId',
        name: 'newprojectsuccess',
        component: createProjectSuccess
    },
    {
        path: '/articlePreview/:id',
        name: 'articlepreview',
        component: articlePreview
    },
    {
        path: '/mapAddPoint',
        component: mapAddPoint
    },
    {
        path: '/baiduMapVueTest',
        component: baiduMapVueTest
    },
    {
        path: '/baiduMapMultipleMarkerInfoWindow',
        component: baiduMapMultipleMarkerInfoWindow
    },
    {
        path: '/baiduMapAddOverlay',
        component: baiduMapAddOverlay
    },
    {
        path: '/baiduMapCurrentLocation',
        component: baiduMapCurrentLocation
    },
    {
        path: '/newProjectPage',
        component: newProjectPage
    },
    {
        path: '/footerComponent',
        component: footerComponent
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