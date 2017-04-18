<template>
    <div class="projectList">
        <div class="loading" v-if="loading">
            加载中, 请稍后...
        </div>
        <div class="error" v-if="error">
            woo, 出错了, 请重试
        </div>
        <div v-if="projects">
            <div class="weui-cells__title">全部环评项目</div>
            <div class="weui-cells">
                <router-link v-bind:to="'/projectDetail/'+project.project_id" v-for="project in projects" class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <img v-bind:src="smallLogo" alt="small logo" style="width: 20px;margin-right: 5px;display: block">
                    </div>
                    <div class="weui-cell__bd">
                        <p>{{project.project_title}}</p>
                    </div>
                    <div class="weui-cell__ft">
                        最新!
                    </div>
                </router-link>
                <infinite-loading :on-infinite="onInfinite" ref="infiniteLoading"></infinite-loading>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    import smallLogo from '../../../../images/source/Cute-Ball-Go-icon.png';
    import InfiniteLoading from 'vue-infinite-loading';

    export default {
        data () {
            return {
                smallLogo: smallLogo,
                projects: null,
                loading: false,
                error: null
            }
        },
        components: {
            InfiniteLoading
        },
        created () {
            // 组件创建完成后获取数据,
            // 此时data已经被observed
            this.fetchData();
        },
        watch: {
            // 如果路由有变化, 会再次fetchData
            '$route': 'fetchData'
        },
        mounted () {

        },
        methods: {
            fetchData () {
                this.error = this.projects = null;
                this.loading =true;
                // vue-resource 获取数据的逻辑
                this.$http.get('/project/getAll',{

                }).then((response) => {
                    this.loading = false;
                    //success response
                    if (response.body.status === true) {
                        this.projects = response.body.data;
                    }else {
                        this.error = "status === false";
                        alert("status === false");
                    }
                }, (response) => {
                    //failed response
                    this.error = "没有获取到php端的response";
                    alert("没有获取到php端的response");
                });
            },
            onInfinite () {
                setTimeout(() => {
                    const temp =[];
                    for (let i = this.projects.length + 1;i <= this.projects.length+5;i++) {
                        temp.push(i);
                    }
                    this.projects = this.projects.concat(temp);
                    this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
                },1000);
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">


</style>