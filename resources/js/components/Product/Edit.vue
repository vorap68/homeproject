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
            <input @click.prevent="update" class="btn btn-success" value="Добавить" />
          </div>
      </div>
  </div>
</template>

<script>

import router from '../../router';
export default{

name: "Edit",

data(){
  return{
    name: null,
      price: null,
      count: null,
      category_id: null,
  }
},

mounted(){
  this.getProduct();
},

methods:{
  getProduct(){
    axios.get('/api/vue/product/'+this.$route.params.id).
    then(res=>{
      this.name = res.data.data.name ,
      this.price= res.data.data.price ,
      this.count =res.data.data.count ,
      this.category_id= res.data.data.category_id 
  })
},

  update(){
    axios.patch('/api/vue/update/'+this.$route.params.id,
    { name: this.name,
          count: this.count,
          price: this.price,
          category_id: this.category_id}).
          then(res=>{
            router.push({name:'product.show',params:{id:this.$route.params.id}})
          })
    }
  }
}


</script>