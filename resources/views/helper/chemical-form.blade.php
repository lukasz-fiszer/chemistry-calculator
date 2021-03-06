<section class="section">
	<div class="container">
		<form class="chemical-form" @submit.prevent="onSubmit">
			<h2 class="label is-medium"><label>Type in chemical equation, formula or element name</label></h2>
			<div class="field has-addons">
				<p class="control is-expanded" :class="{'is-loading': loading, 'is-loading-input': loading}">
					<input v-model="input" type="text" name="chemical-input" placeholder="H2O" class="input is-medium" autofocus>
				</p>
				<p class="control">
					<input type="submit" value="Submit" class="button is-primary is-medium">
				</p>
			</div>
		</form>
	</div>
</section>

<section class="section has-no-padding-top">
	<div class="container">
		<transition-group name="fade" tag="div">
			<reaction-box v-if="isReactionType" :sides="sides" key="0"></reaction-box>
			<molecule-box v-if="isMoleculeType" :molecule="molecule" key="1"></molecule-box>
			<molecule-table v-if="hasMoleculeTable" :sides="moleculeTableSides" key="2"></molecule-table>
			<div v-if="error" class="box has-text-danger" key="3">
				<template v-if="response.message">
					@{{ response.message }}
				</template>
				<template v-else-if="response.query">
					Input field is empty
				</template>
				<template v-else>
					Error occured
				</template>
			</div>
		</transition>
	</div>
</section>