const initialState = [
    {
        id : 0,
        name : 'Deepinder',
        number : '9915099247',
        email : 'deepinder999@gmail.com'
    },
    {
        id : 1,
        name : 'Deepu',
        number : '9915099227',
        email : 'deepu999@gmail.com'
    }
];

const contactReducer = (state = initialState, action) =>{
    switch(action.type){
        case "ADD_CONTACT":
            return [...state,action.payload];
        case "UPDATE_CONTACT":
            return state.map(contact => contact.id === action.payload.id ? action.payload : contact );
        case "DELETE_CONTACT" :
            return state.filter(data => data.id !== action.payload) ;
            default :
        return state;
    }
}

export default contactReducer;