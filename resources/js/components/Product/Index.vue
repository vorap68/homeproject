<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">count</th>
          <th scope="col">price</th>
          <th scope="col">category_id</th>
          <th scope="col">edit</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
        <template v-for="(product, index) in products">
          <tr>
            <th scope="row">{{ index }}</th>
            <td> <router-link :to="{name:'product.show',params:{id:product.id}}">{{ product.name }}</router-link>
              </td>
            <td>{{ product.count }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.category_id }}</td>
            <td> <router-link :to="{name:'product.edit',params:{id:product.id}}">Edit</router-link>
             
            </td>
            <td>
              <a @click.prevent="deleteProduct(product.id)" href="#" class="btn btn-outline-danger">
              Delete</a>
            </td>
          </tr>
          
        </template>
      </tbody>
    </table>
  </div>
</template>

<script>

//mport router from '../../router';
export default{

name: "Index",

data(){
  return {
    products:null,
      name: null,
      price: null,
      count: null,
      category_id: null,

    };
},

mounted(){
this.getAllProducts();
},

methods: {
 getAllProducts(){
  axios.get('/api/vue/index')
  .then(res=>{
   this.products = res.data.data;
  })
 },
 
 deleteProduct(id){
      axios.delete('/api/vue/delete/'+id).
      then(res=>{
        this.getAllProducts();
       })
    }
}



}
</script>