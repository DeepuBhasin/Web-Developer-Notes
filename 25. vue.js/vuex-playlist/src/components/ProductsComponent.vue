<template>
    <div>
        
        <ol v-for="prod in saleProducts" :key="prod.id">
                <li>{{prod.id}} | {{prod.title}} | {{prod.price}}</li>
        </ol>
         <span v-for="product in products" :key="product.id">
            <ol v-for="prod in product" :key="prod.id">
                <li>{{prod.id}} | {{prod.title}}</li>
            </ol>
        </span>
        <button @click="reducePrice()">Reduce</button>
    </div>
</template>

<script>
import {mapGetters,mapActions} from 'vuex'
export default {
   computed :{ 
        products(){
            return this.$store.state.products
        },
      ...mapGetters([
          'saleProducts'
      ])
    },
    methods : {
       ...mapActions([
           'reducePrice'
       ])
    }
}
</script>

<style lang="scss" scoped>

</style>