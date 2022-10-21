<template>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between">
                <h6>Subcategory Edit</h6>
              </div>
              <form @submit.prevent="update">
                <div class="form-group">
                    <label class="form-control-label" for="basic-url">Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" v-model="form.name" placeholder="Name">
                    </div>
                    <div v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</div>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="basic-url">Category</label>
                    <div class="input-group">
                        <select class="form-control" v-model="form.category_id">
                          <option value="" hidden disabled>Select a category</option>
                          <option :value="category.id" v-for="category in categories" :key="category.id">
                            {{category.name}}
                          </option>
                        </select>
                    </div>
                    <div v-if="form.errors.category_id" class="text-danger">{{ form.errors.category_id }}</div>
                </div>
                <button class="btn btn-primary" type="submit" :class="{
                    'disabled':form.processing
                }">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
import Layout from "@/Components/Layout.vue";

export default {
  layout:Layout,
  props:{
    subcategory:Object,
    categories:Object
  },
  data(){
    return {
        form: this.$inertia.form({
            name:this.subcategory.name,
            category_id: this.subcategory.category_id ?? ''
        })
    }
  },
  methods:{
    update(){
        this.form.put(this.$route('admin.subcategory.update',this.subcategory.id));
    }
  },
  mounted(){
    
  }
}
</script>

<style>

</style>