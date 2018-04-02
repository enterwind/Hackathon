
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;

let AppLayout = require('./components/App.vue');

import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '4px'
})

import Index from './components/Index.vue';

import FaqIndex from './components/modules/faq/FaqIndex.vue';
import FaqCreate from './components/modules/faq/FaqCreate.vue';
import FaqEdit from './components/modules/faq/FaqEdit.vue';

import PeriodeIndex from './components/modules/periode/PeriodeIndex.vue';
import PersyaratanIndex from './components/modules/persyaratan/PersyaratanIndex.vue';
import PrizeIndex from './components/modules/prize/PrizeIndex.vue';
import ProcedureIndex from './components/modules/procedure/ProcedureIndex.vue';
import SponsorIndex from './components/modules/sponsor/SponsorIndex.vue';
import TutorialIndex from './components/modules/tutorial/TutorialIndex.vue';


Vue.use(VueRouter);

const router = new VueRouter({ 
	
	routes: [
		{ 
	    	path: '/', 
	    	component: Index,
	    	name: 'beranda'
	    },
	    
	    { path: '/faq', component: FaqIndex, name: 'faq'},
	    { path: '/faq/create', component: FaqCreate, name: 'createFaq'},
	    { path: '/faq/edit/:id', component: FaqEdit, name: 'editFaq'},

	    { 
	    	path: '/periode', 
	    	component: PeriodeIndex,
	    	name: 'periode'
	    },
	    { 
	    	path: '/persyaratan', 
	    	component: PersyaratanIndex,
	    	name: 'persyaratan'
	    },
	    { 
	    	path: '/prize', 
	    	component: PrizeIndex,
	    	name: 'prize'
	    },
	    { 
	    	path: '/procedure', 
	    	component: ProcedureIndex,
	    	name: 'procedure'
	    },
	    { 
	    	path: '/sponsor', 
	    	component: SponsorIndex,
	    	name: 'sponsor'
	    },
	    { 
	    	path: '/tutorial', 
	    	component: TutorialIndex,
	    	name: 'tutorial'
	    },
	],

	linkActiveClass: 'active'
})

const app = new Vue(Vue.util.extend({ router }, AppLayout)).$mount('#app');