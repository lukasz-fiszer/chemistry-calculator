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
		<reaction-box v-if="isReactionType" :sides="sides"></reaction-box>
		<molecule-box v-if="isMoleculeType" :molecule="molecule"></molecule-box>
		<molecule-table v-if="hasMoleculeTable" :sides="moleculeTableSides"></molecule-table>
		{{-- <div v-if="error" class="box has-text-danger" style="display: none;"> --}}
		<div v-if="error" class="box has-text-danger">
			{{-- <template v-if="response.hasOwnProperty('message')"> --}}
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
	</div>
</section>