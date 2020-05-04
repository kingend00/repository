const HomePageIndex = ()  => import (/* webpackChunkName: "js/components/HomePageIndex" */'./components/HomePageIndex.vue')
const NotFound = ()  => import (/* webpackChunkName: "js/components/NotFound" */'./components/NotFound.vue')
const HomePage = ()  => import (/* webpackChunkName: "js/components/HomePage" */'./components/HomePage.vue')
const Auth = ()  => import (/* webpackChunkName: "js/components/layouts/Auth" */'./components/layouts/Auth.vue')
const Login = ()  => import (/* webpackChunkName: "js/components/Login" */'./components/Login.vue')
const AdminLayout = ()  => import (/* webpackChunkName: "js/components/layouts/AdminLayout" */'./components/layouts/Admin.vue')
const AdminDashboard = ()  => import (/* webpackChunkName: "js/components/AdminDashboard" */'./components/Admin.vue')
const PostLayout = ()  => import (/* webpackChunkName: "js/components/layouts/PostLayout" */'./components/layouts/Posts.vue')
const Post = ()  => import (/* webpackChunkName: "js/components/Post" */'./components/Post.vue')
const AddPost = ()  => import (/* webpackChunkName: "js/components/post/AddPost" */'./components/Post/AddPost.vue')
const ListPost = ()  => import (/* webpackChunkName: "js/components/post/ListPost" */'./components/Post/ListPost.vue')

export const routes = [
    { path: '/test', name: 'test', component: HomePageIndex },
    {
        path: '/',
        name: 'home_page',
        component: HomePage,
        children: [{
            path: '',
            name: 'home_page_index',
            component: HomePageIndex
        }, {
            path: '/post_group/:id',
            name: 'post_group',
            component: Post
        }]
    },
    {
        path: "/auth",
        name: "auth",
        component: Auth,
        children: [
            { path: "login", name: "login", component: Login },

        ]
    },
    {
        path: "/admin",
        name: 'admin',
        component: AdminLayout,
        children: [
            { path: 'dashboard', name: 'dashboard', component: AdminDashboard },
            {
                path: 'post',
                name: 'post',
                component: PostLayout,
                children: [
                    { path: 'add', name: 'add_post', component: AddPost },
                    { path: 'list', name: 'list_post', component: ListPost }
                ]
            }
        ]
    },
    { path: '*', name: 'not_found', component: NotFound },

];