<template>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-start">
                        <h4 class="font-weight-bolder">Sign In</h4>
                        <p class="mb-0">Enter your email and password to sign in</p>
                    </div>
                    <div class="card-body">
                        <form role="form" @submit.prevent="submit">
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" v-model="form.email">
                            <span class="text-danger d-block my-2" v-if="errors && errors.email">{{errors.email}}</span>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" v-model="form.password">
                            <span class="text-danger d-block my-2" v-if="errors && errors.password">{{errors.password}}</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe" v-model="form.remember">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                        Don't have an account?
                        <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                <div class="position-relative bg-gradient-dark h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" :style="{
                     'background-image':`url(${url}/imgs/banner.png)`,
                     'background-size': 'cover'
                    }"
                    >
                <span class="mask bg-gradient-dark opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Veni, vidi, vici"</h4>
                <p class="text-white position-relative">Absolute freedom is in absolute power.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SigininLayout from "@/Components/SigninLayout.vue"
import { reactive } from '@vue/reactivity'
import { Inertia } from '@inertiajs/inertia'
export default {
   layout: SigininLayout,
   props:['errors'],
   setup(){ 
    const form = reactive({
        email:null,
        password:null,
        remember:false
    });
    const url = window.location.origin;
    const submit = () => {
        Inertia.post('/login',form)
    }
    return {form,submit,url}
   }
}
</script>

<style>

</style>