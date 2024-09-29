<template>
  <div>
    <div class="w-50">
    <div class="mb-3">
      <input type="text" class="form-control" id="name" placeholder="name" v-model="name" />
    </div>
    <div class="mb-3">
      <input type="number" class="form-control" id="price" placeholder="price" v-model="price" />
    </div>
        <div class="mb-3">
          <input type="number" class="form-control" id="count" placeholder="count" v-model="count" />
        </div>
          <div class="mb-3">
            <input type="number" class="form-control" id="category_id" placeholder="category_id" v-model="category_id"/>
          </div>
          <div class="mb-3">
            <input :disabled="!isDisabled" @click.prevent="addProducts" class="btn btn-success" value="Добавить" />
          </div>
      </div>
  </div>
</template>

<script>
 import axios from 'axios';
import router from '../../router';

export default{

name: "Create",

data() {
    return {
      name: null,
      price: null,
      count: null,
      category_id: null,
    };
  },

  methods:{
    addProducts(){
      axios.post('/api/vue/store', {
          name: this.name,
          count: this.count,
          price: this.price,
          category_id: this.category_id,
        }).then((res)=> {
          router.push({name:'product.index'});
        });
    },

  },
  computed:{
    isDisabled(){
      return   this.name && this.count &&  this.price && this.category_id;
    }
  }
  

}
</script>