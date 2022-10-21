<template>
      <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-3 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li v-for="(n,i) in navData.breadcrumb" :key="i"
            class="breadcrumb-item text-sm"
            >
              <i-link v-if="n.link !== null" :href="n.link" class="breadcrumb-link">{{n.name}}</i-link>
              <i-link v-else href="javascript:;" class="breadcrumb-link active">{{n.name}}</i-link>
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">
            {{navData.page_title}}
          </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <div class="nav-link text-white font-weight-bold px-0 postion-relative" id="profile_drop_down_box">
                <div @click="showProfileMenu=!showProfileMenu" style="cursor:pointer">
                  <img :src="`/images${auth.user.profile_photo}`" alt="" class="img-fluid profile-image">
                  <span class="d-sm-inline d-none">
                    <i class="fas fa-caret-down"></i>
                  </span>
                </div>
                <div class="profile_menu_dropdown" v-if="showProfileMenu">
                  <button class="btn btn-primary" @click="logout">Logout</button>
                </div>
              </div>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav" @click="showSidebarMenu">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
 components:{
  'i-link':Link
 },
 data(){
  return {
    currentUrl : this.$page.url.substr(1),
    showProfileMenu: false
  }
 },
 methods:{
    isUrl(...urls){
      if (urls[0] === '') {
        return this.currentUrl === ''
      }
      return urls.filter((url) => this.currentUrl.startsWith(url)).length
    },
    logout(){
      this.$inertia.delete('/logout');
    },
    showSidebarMenu(){
      if(document.body.classList.contains('g-sidenav-pinned')){
        document.body.classList.remove('g-sidenav-pinned');
      }else{
        document.body.classList.add('g-sidenav-pinned');
      }
    }
  },
  computed:{
    navData(){
      return this.$page.props.nav_data;
    },
    auth(){
      return this.$page.props.auth;
    }
  },
  mounted(){
    this.$nextTick(()=>{
        let self = this
        window.addEventListener('click', function(e){   
        if (document.getElementById('profile_drop_down_box').contains(e.target)){
          // Clicked in box
        } else{
          self.showProfileMenu = false;
          if (document.getElementById('iconNavbarSidenav').contains(e.target)){
          // Clicked in box
          }else{
            self.showSidebarMenu();
          }  
        }
      });
    })
  }
}
</script>

<style lang="scss" scoped>
.profile-image{
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: .25rem;
}
.breadcrumb-link{
  color: white;
  &.active{
    color: lightgray!important;;
  }
}
.nav-link{
  .profile_menu_dropdown{
    position:absolute;
    bottom: -1;
    min-width: 9rem;
    min-height: 100px;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    margin-top: .5rem;
    border-radius: .5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
}

</style>