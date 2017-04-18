<template>
    <div class="newProjectPage">
        <navbar-panel></navbar-panel>
        <div class="row">
            <function-panel></function-panel>
            <div class="col-md-9 col-md-offset-1">
                <new-project-panel></new-project-panel>
            </div>
        </div>
        <footer-panel></footer-panel>
    </div>
</template>

<script type="text/ecmascript-6">
    import navbarPanel from '../navbarComponent/navbarComponent.vue'
    import functionPanel from '../functionsPanelComponent/functionsPanelComponent.vue'
    import newProjectPanel from '../newProjectComponent/newProjectComponent.vue'
    import footerPanel from '../footerComponent/footerComponent.vue'
    export default {
        data () {
            return {

            }
        },
        components: {
            navbarPanel,
            functionPanel,
            newProjectPanel,
            footerPanel
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    .newProjectPage {

    }
</style>