<template>
    <div>
        <ol v-for="product in allProducts" :key="product.id">
            <li>
              {{product.id}} | {{product.title}} | {{product.price | currency}}
              <button @click="deleteProduct(product.id)">Delete </button>

            </li>
        </ol>

    </div>
</template>

<script>
import {mapGetters,mapActions} from 'vuex'; 
    export default {
        name : "TodoComponent",
        filters : {
            currency : function (value){
                return "$ " + parseFloat(value).toFixed(2); 
            }
        },
        computed : mapGetters(['allProducts']),
        methods : {
            ...mapActions(['getProducts',"deleteProduct"])
        },
        created(){
            this.getProducts();
        }
    }
</script>
