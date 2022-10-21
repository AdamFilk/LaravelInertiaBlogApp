<template>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between">
                <h6>Category Edit</h6>
              </div>
              <form @submit.prevent="update">
                <div class="form-group">
                    <label class="form-control-label" for="basic-url">Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" v-model="form.name" placeholder="Name">
                    </div>
                    <div v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</div>
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
    category:Object
  },
  data(){
    return {
        form: this.$inertia.form({
            name:this.category.name,
        })
    }
  },
  methods:{
    update(){
        this.form.put(this.$route('admin.category.update',this.category.id));
    }
  },
  mounted(){
    
  }
}
</script>

<style>

</style>