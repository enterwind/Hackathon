<template>
	<div>
		<navbar></navbar>
		<menubar></menubar>
		<div class="page-content">
			<vue-progress-bar></vue-progress-bar>
			<transition name="fade">
				<router-view></router-view>
			</transition>
		</div>
		<statusbar></statusbar>
	</div>
</template>

<script>
	import Navbar from './layouts/Navbar.vue'
	import Menu from './layouts/Menu.vue'
	import StatusBar from './layouts/StatusBar.vue'

	export default {
		components: {
			'navbar': Navbar, 
			'menubar': Menu,
			'statusbar': StatusBar
		},
		mounted () {
			this.$Progress.finish()
		},
		created () {
			this.$Progress.start()
			this.$router.beforeEach((to, from, next) => {
				if (to.meta.progress !== undefined) {
					let meta = to.meta.progress
					this.$Progress.parseMeta(meta)
				}
				this.$Progress.start()
				next()
			})
			this.$router.afterEach((to, from) => {
				this.$Progress.finish()
			})
		}
	}
</script>