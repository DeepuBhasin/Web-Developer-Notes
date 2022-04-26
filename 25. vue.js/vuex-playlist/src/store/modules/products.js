
const state = {
    products : [
        {
            "id": 1,
            "title": "Todo One",
            "price": "1000.30"
          },
          {
            "id": 2,
            "title": "Todo Two",
            "price": "1011.30"
          },
          {
            "id": 3,
            "title": "Todo Three",
            "price": "10220.30"
          }
    ] 
    
};
const getters = {
    saleProducts : state => {
        let saleProducts = state.products.map(product =>{
            return {
                id : product.id,
                title : "**" +product.title+ "**",
                price : "**" +product.price+ "**",
            }
        });
        return saleProducts;
    }
};

const mutations = {
    reducePrice : (state) => {
        state.products.forEach((product)=>{
            product.price -=1;
        })
    }

};

const actions = {
    reducePrice : context => {
        setTimeout(function (){
            context.commit('reducePrice');
        },2000);
    }    

};

export default {
    state,
    getters,
    actions,
    mutations
}