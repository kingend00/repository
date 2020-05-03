export const storeData = {
    state: {
        result: 0,
        checkLogin: false,
        showPostDetail: ''
    },
    mutations: {
        changeLogin(state, data) {
            state.checkLogin = data
            console.log('state checkLogin', state.checkLogin)
        },
        gotoPostDetail(state, data) {
            state.showPostDetail = data
            console.log('showPostDetail', state.showPostDetail)
        }
    },
    getters: {},
    actions: {},
    modules: {}
};