<template>
      <div class="row">

        <div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between">
                <h6>Category List</h6>
                <i-link type="button" class="btn btn-primary" :href="$route('admin.category.create')">
                  <i class="fas fa-plus"></i> Add new category
                </i-link>
              </div>
              <table class="table text-center">
                  <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <!-- $adslider_count - ($adsliders->currentPage()-1) * $adsliders->perPage()) - $key (Desc) -->
                    <tr v-for="(category,i) in categories.data" :key="category.id">
                      <td>
                        <div class="table_content_wrapper">{{categories.total - (categories.current_page-1) * categories.per_page - i}}</div>
                      </td>
                      <td>
                        <div class="table_content_wrapper">{{category.name}}</div>
                      </td>
                      <td>
                        <div class="d-flex justify-content-center align-items-center gap05">
                          <i-link :href="$route('admin.category.edit',category.id)" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                          </i-link>
                          <button type="button" class="btn btn-danger" @click="destroy(category.id)">
                            <i class="fas fa-trash"></i> Delete
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
              </table>
              <nav aria-label="Page navigation" class="d-flex justify-content-center align-items-center" v-if="categories.total > categories.per_page">
                <ul class="pagination pagination-primary">
                  <li class="page-item">
                    <a class="page-link" :href="categories.prev_page_url" aria-label="Previous" v-if="categories.prev_page_url">
                      <i class="fa fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item" :class="{
                    'active': categories.current_page == i 
                  }" v-for="i in categories.last_page" :key="i">
                    <a class="page-link" :href="`${categories.path}?page=${i}`" :class="{
                    'text-white': categories.current_page == i 
                  }">{{i}}</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" :href="categories.next_page_url" aria-label="Next" v-if="categories.next_page_url">
                      <i class="fa fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
import Layout from "@/Components/Layout.vue";
import {Link} from "@inertiajs/inertia-vue3";

export default {
  layout:Layout,
  props:{
    categories:Object
  },
   components:{
  'i-link':Link
  },
  mounted(){
    console.log('categories',this.categories);
  },
  methods:{
    destroy(id){
      this.$inertia.delete('/admin/category/'+id);
    }
  }
}
</script>

<style>

</style>