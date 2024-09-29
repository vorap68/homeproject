<template>
  <div>
     <router-link :to="{name:'product.index'}">Index</router-link>
   <router-link :to="{name:'product.create'}">Create</router-link>
   
       <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "Index",
};
</script>