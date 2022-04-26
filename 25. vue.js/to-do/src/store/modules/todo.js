import axios from "axios";

const state = {
    product : []
};
const getters = {
    allProducts : (state) => state.product 
};
const actions = {
    async getProducts({commit}){
        const response = await axios.get('http://localhost:3000/product');
        commit("setProduct",response.data);
    },
    async addProduct({commit},product){
        const response = await axios.post('http://localhost:3000/product',product);
        commit("newProduct",response.data);
    },
    async deleteProduct({commit},id){
        await axios.delete(`http://localhost:3000/product/${id}`);
        commit("removeProduct",id);
    }
};
const mutations = {
    setProduct : (state,product)=>(state.product = product),
    newProduct : (state,product)=>(state.product.unshift(product)),
    removeProduct : (state,id)=>(state.product.filter(product=>product.id !== id))
};

export default {
    state,
    getters,
    actions,
    mutations
}