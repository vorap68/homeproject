<template>
  <div v-if="product">
   <div>Name: {{ this.product.name }}</div>
   <div>Price: {{ this.product.price }}</div>
   <div>Count: {{ this.product.count }}</div>
   <div>Category_id: {{ this.product.category_id }}</div>
  </div>
</template>

<script>
export default{

name: "Show",

data(){
  return{
   product: null,
  }
},

mounted(){
  this.getProduct()
},

methods: {
 getProduct(){
  axios.get('/api/vue/product/'+this.$route.params.id).
  then(res=>{
    this.product = res.data.data;
    console.log(res.data.data);
  })
 }
}

}
</script>