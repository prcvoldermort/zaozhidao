<template>
    <div class="jumbotron">
        <h1>太棒了！</h1>
        <p>{{project.project_name}}的信息已录入完成，你可能需要</p>
        <p>
            <button type="button" class="btn btn-success btn-lg">再创建一条</button>&nbsp;&nbsp;&nbsp;或者&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-default btn-lg">返回项目列表</button>
        </p>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                project: null
            }
        },
        created () {
            // 组件创建完后获取数据,
            // 此时data已经被observed了
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
                this.$http.get('/project/getOneDetail',{
                    params: {
                        id: this.$route.params.projectId
                    }
                }).then((response) => {
                    //success response
                    if (response.body.status === true) {
                        this.project = response.body.data;
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


</style>