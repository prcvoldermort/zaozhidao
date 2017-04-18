<template>
    <div class="map">
        <div id="bMap">

        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                map: null,
                initCoord: new BMap.Point(116.417854,39.921988),
                initZoom: 15,
                projects: [],
                windowOpts: {
                    width: 700,
                    height: 100,
                    title: "",
                    enableMessage: true
                }
            }
        },
        created () {
//            this.fetchData();
        },
//        watch: {
//            '$route': 'fetchData'
//        },
        mounted () {
            this.map = new BMap.Map("bMap");
            this.fetchData();
        },
        methods: {
            fetchData() {
                // vue-resource获取数据的逻辑
                // Ajax获取数据操作是一个异步的请求
                // 后面的方法要放在回调函数中处理
                this.$http.get('/project/getMapBackendData',{

                }).then((response) => {
                    if (response.body.status === true) {
                        this.projects = response.body.data;
                        this.map.centerAndZoom(this.initCoord,this.initZoom);
                        this.map.enableScrollWheelZoom();
                        for (var i=0;i<this.projects.length;i++) {
                            // 创建项目标注点
                            var marker = new BMap.Marker(new BMap.Point(this.projects[i].long,this.projects[i].lat));
                            var content = this.projects[i]['title'];
                            // 将标注添加到地图中
                            this.map.addOverlay(marker);
                            addClickHandler(content,marker,this);
                        }
                        function addClickHandler(content,marker,that) {
                            marker.addEventListener("click",function (e) {
                                openInfo(content,e,that);
                            });
                        }
                        function openInfo(content, e, that) {
                            var p = e.target;
                            var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
                            var infoWindow = new BMap.InfoWindow(content,that.windowOpts); // 创建信息窗口对象
                            that.map.openInfoWindow(infoWindow,point);
                        }
                    }else {
                        alert("status === false");
                    }
                },(response) => {
                    // failed response
                    alert("没有获取到php端的response");
                });
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
        #bMap {
            width: 100%;
            height: 700px;
        }
</style>