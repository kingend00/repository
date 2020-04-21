import Test from './components/Test'
import NotFound from './components/NotFound'
import HomePage from './components/HomePage.vue'
import Auth from './components/layouts/Auth.vue'
import Login from './components/Login.vue'
import AdminLayout from './components/layouts/Admin.vue'
import AdminDashboard from './components/Admin.vue'
import PostLayout from './components/layouts/Posts.vue'
import Category from './components/Category.vue'
import AddPost from './components/Post/AddPost.vue'
import ListPost from './components/Post/ListPost.vue'
import CategoryDetails from './components/CategoryDetails.vue'

// import CategoryCreateView from './components/CategoryCreateView'

export const routes = [
	{ path: '/test', name: 'test', component: Test },
	{ path: '/', name: 'home_page', component: HomePage, children:[
		{
			path:'/category_group/:id', name:'category_group', component:Category,children:
			[
				{path:'/category/show_details/:category_details', name:'category_details', component:CategoryDetails}
			]
		}
	]},
	{path:"/auth",name:"auth",component:Auth,children:[
		{path:"login",name:"login",component:Login},
		
	]},
	{path:"/admin",name:'admin',component:AdminLayout,children:[
		{path:'dashboard',name:'dashboard',component:AdminDashboard},
		{path:'post',name:'post',component:PostLayout,children:[
			{path:'add',name:'add_post',component:AddPost},
			{path:'list',name:'list_post',component:ListPost}
		]}
	]},
	{ path: '*', name: 'not_found', component: NotFound },
	
];