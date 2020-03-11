import Test from './components/Test'
import ExampleComponent from './components/ExampleComponent'
import HomePage from './components/HomePage.vue'
import Category from './components/Category.vue'
import CategoryDetails from './components/CategoryDetails.vue'

// import CategoryCreateView from './components/CategoryCreateView'

export const routes = [
	{ path: '/test', name: 'Test', component: Test },
	{ path: '/', name: 'HomePage', component: HomePage, children:[
		{
			path:'/category_group/:id', name:'category_group', component:Category,children:
			[
				{path:'/category/show_details/:category_details', name:'category_details', component:CategoryDetails}
			]
		}
	] },
	
];