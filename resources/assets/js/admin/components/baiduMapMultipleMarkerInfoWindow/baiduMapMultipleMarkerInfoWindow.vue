<template>
    <div>
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
                data_info: [
                    [116.417854,39.921988,"地址：北京市东城区王府井大街88号乐天银泰百货八层"],
                    [116.406605,39.921585,"地址：北京市东城区东华门大街"],
                    [116.412222,39.912345,"地址：北京市东城区正义路甲5号"]
                ],
                windowOpts: {
                    width: 250,
                    height: 80,
                    title: "信息窗口",
                    enableMessage: true
                },
                theClickedMarker: null,
                theContent: null,
                removeMarker: new BMap.ContextMenu()
            }
        },
        mounted () {
            this.map = new BMap.Map("bMap");
            this.initMap();
            this.createRightClickDelete();
        },
        methods: {
            initMap () {
                this.map.centerAndZoom(this.initCoord,this.initZoom);
                var data_info = [[116.417854,39.921988,"地址：北京市东城区王府井大街88号乐天银泰百货八层"],
                    [116.406605,39.921585,"地址：北京市东城区东华门大街"],
                    [116.412222,39.912345,"地址：北京市东城区正义路甲5号"]
                ];
                var opts = {
                    width : 250,     // 信息窗口宽度
                    height: 80,     // 信息窗口高度
                    title : "信息窗口" , // 信息窗口标题
                    enableMessage:true//设置允许信息窗发送短息
                };
                for(var i=0;i<data_info.length;i++){
                    var marker = new BMap.Marker(new BMap.Point(data_info[i][0],data_info[i][1]));  // 创建标注
                    var content = data_info[i][2];
                    this.map.addOverlay(marker);               // 将标注添加到地图中
                    addClickHandler(content,marker,this);
                }
                function addClickHandler(content,marker,that){
                    marker.addEventListener("click",function(e){
                        openInfo(content,e,that)}
                    );
                }
                function openInfo(content,e,that){
                    var p = e.target;
                    var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
                    var infoWindow = new BMap.InfoWindow(content,opts);  // 创建信息窗口对象
                    that.map.openInfoWindow(infoWindow,point); //开启信息窗口
                }
            },
            createRightClickDelete () {
                var that = this;
                var removeMarker = function(e,ee,marker){
                    that.map.removeOverlay(marker);
                }
                //创建右键菜单
                var markerMenu=new BMap.ContextMenu();
                markerMenu.addItem(new BMap.MenuItem('删除',removeMarker.bind(marker)));

                var marker = new BMap.Marker(this.initCoord);
                this.map.addOverlay(marker);
                marker.addContextMenu(markerMenu);
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