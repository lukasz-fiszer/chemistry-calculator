<section class="section">
	<div class="container">
		<div class="box has-text-centered">
			<h2>Balanced chemical equation:</h2>
			<h2><span class="has-opacity-half">1</span> KmNO<sub>4</sub> + <span class="has-text-info"><b>15</b></span> A = <span class="has-text-danger"><b>-1</b></span> KmA + <span class="has-text-danger"><b>0</b></span> OAMn</h2>
		</div>
		<div class="columns has-text-centered has-bottom-border">
			<div class="column"><b>Coefficient</b></div>
			<div class="column"><b>Molecule</b></div>
			<div class="column"><b>Molar mass</b></div>
			<div class="column"><b>Moles</b></div>
			<div class="column"><b>Grams</b></div>
		</div>
		<div class="columns has-text-centered">
			<div class="column has-opacity-half">1</div>
			<div class="column">KmNO<sub>4</sub></div>
			<div class="column">150</div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
		</div>
		<div class="columns has-text-centered has-bottom-border">
			<div class="column has-text-info"><b>15</b></div>
			<div class="column">A</div>
			<div class="column">20</div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
		</div>
		<div class="columns has-text-centered">
			<div class="column has-text-danger"><b>-1</b></div>
			<div class="column">KmA</div>
			<div class="column">44.25</div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
		</div>
		<div class="columns has-text-centered">
			<div class="column has-text-danger"><b>0</b></div>
			<div class="column">OAMn</div>
			<div class="column">44</div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
			<div class="column"><p class="control"><input type="text" name="moles" class="input"></p></div>
		</div>
	</div>
</section>

<div class="chemform">
	{{-- <molecule-table-entry :coefficient="10" molecule="name" :atomic-mass="24.4"></molecule-table-entry> --}}
	<molecule-table :sides="[[{name: 'abcd', atomicMass: 10, coefficient: 1}], [{name: 'abcd', atomicMass: 10, coefficient: 1}]]"></molecule-table>
</div>

{{-- @verbatim
<div class="a">
	<input type="text" name="name1" v-model="newName" @keyUp="addNameKey"><button @click="addName">Add name</button>
	<li v-for="name in names">{{ name }}</li>
	<p class="has-text-centered" :class="{'has-text-info' : textInfo}" @mouseover="toggleColor" @mouseOut="toggleColor">paragraph here</p>
	<c v-for="name in names"></c>
</div>
@endverbatim

@verbatim
<script type="text/javascript">
	let start = function(){
		Vue.component('c', {
			template: '<div><li v-for="a in list">{{ a }}</li></div>',
			data(){
				return {
					list: ['a', 'b']
				};
			}
		});
		let v = new Vue({
			el: '.a',
			data: {
				names: [],
				newName: '',
				textInfo: false
			},
			methods: {
				addName(){
					this.names.push(this.newName);
					this.newName = '';
				},
				addNameKey(event){
					console.log(event);
					if(event.keyCode != 13) return;
					this.names.push(this.newName);
					this.newName = '';
				},
				toggleColor(){
					this.textInfo ^= 1;
				}
			}
		});
	}
	setTimeout(start, 2000);
</script>
@endverbatim --}}