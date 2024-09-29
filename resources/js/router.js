import  Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    routes:[
        {
            path: '/spa/product',component: () =>  import ('./components/Product/Index'),
            name: 'product.index'
        },
        {
            path: '/spa/product/:id/edit',component: () =>  import ('./components/Product/Edit'),
            name: 'product.edit'
        },
        {
            path: '/spa/product/create',component: () =>  import ('./components/Product/Create'),
            name: 'product.create'
        },
        {
            path: '/spa/product/:id',component: () =>  import ('./components/Product/Show'),
            name: 'product.show'
        },
       
        
    ]
})








