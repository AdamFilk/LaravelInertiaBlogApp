<template>
    <auth-nav/>
    <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <slot/>
      </div>
    </section>
  </main>
</template>

<script>
import AuthNav from "@/Shared/AuthNav.vue";
export default {
    components:{
        'auth-nav':AuthNav
    }
}
</script>

<style>

</style>