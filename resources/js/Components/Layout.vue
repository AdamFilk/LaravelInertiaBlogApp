<template>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <a-sidebar></a-sidebar>
   
    <main class="main-content position-relative border-radius-lg">
        <a-navigation></a-navigation>
        <div class="container-fluid py-4" style="min-height:85vh">
          <slot/>
          
      </div>
      <footer class="footer py-3">
            <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    Made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Aung Chan Oo</a>
                </div>
                </div>
                <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Adam Jaeger</a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </footer>
  </main>
</template>

<script>
import Nav from "@/Shared/Nav.vue";
import SidebarMenu from "@/Shared/SidebarMenu.vue";


export default {
    components:{
        'a-navigation':Nav,
        'a-sidebar':SidebarMenu
    },
    mounted(){
        
    },
    watch:{
        '$page.props.flash':{
            handler(){
                let flash = this.$page.props.flash
                console.log(flash);
                if (flash.message) {
                    this.$toast.primary(flash.message)
                }
                if (flash.success) {
                   this.$toast.success(flash.success)
                }
                if (flash.error) {
                   this.$toast.error(flash.error)
                }
            },
            deep:true
        }
    }
}
</script>

<style>

</style>