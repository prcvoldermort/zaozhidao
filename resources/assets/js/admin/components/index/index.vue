<template>
    <div class="index">
        <navbar></navbar>
        <div class="container-fluid">
            <div class="row">
                <functions-panel></functions-panel>
                <div class="col-md-9 col-md-offset-1">
                    这里是主题内容区域
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    import navbar from '../navbarComponent/navbarComponent.vue'
    import functionsPanel from '../functionsPanelComponent/functionsPanelComponent.vue'

    export default {
        data () {
            return {

            }
        },
        components: {
            navbar,
            functionsPanel
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">


</style>