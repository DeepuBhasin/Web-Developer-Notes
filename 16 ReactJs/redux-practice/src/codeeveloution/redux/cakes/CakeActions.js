import { BUY_CAKE,INCREASE_CAKE } from "./CakeType"

export const buyCake = () => { 
    return {
        type : BUY_CAKE
    }
}

export const increaseCake = () => { 
    return {
        type : INCREASE_CAKE
    }
}