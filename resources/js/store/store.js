export const storeData = {
  state: {
    result: 0,
    checkLogin:false
  },
  mutations: {
      changeLogin(state,data){
        state.checkLogin = data
        console.log('state checkLogin',state.checkLogin)
        
      }
  },
  getters: {
  },
  actions: {
  },
  modules: {
  }
};