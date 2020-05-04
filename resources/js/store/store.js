export const storeData = {
    state: {
        result: 0,
        checkLogin: false,
        showPostDetail: '',
        reloadHomePageIndex:0
    },
    mutations: {
        changeLogin(state, data) {
            state.checkLogin = data
            console.log('state checkLogin', state.checkLogin)
        },
        gotoPostDetail(state, data) {
            state.showPostDetail = data
            console.log('showPostDetail', state.showPostDetail)
        },
        reloadHomePageIndex(state,data){
            state.reloadHomePageIndex += 1
            console.log('reloadHomePageIndex', state.reloadHomePageIndex)

        }
    },
    getters: {},
    actions: {},
    modules: {}
};