<template>
	<div class="container">
		<h4 class="h4">Billed Terms</h4>
		<button @click="fetchBilledTerms()">Load</button>
		<ul class="list-group">
			<li class="list-inline-item">Term 1/2020</li>
		</ul>
	</div>
</template>
<script>
export default{
	mounted()
	{
		fetchBilledTerms();
	},

	methods:{
		fetchBilledTerms(){
					axios.get('/PupilDiscoverBillings/2')
					.then(
						response=>{
							console.log(response)
						}
						);
		}
		
		
	}
}
</script>