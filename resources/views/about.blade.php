@extends('layout')

@section('title')
	How does it work - @parent
@endsection

@section('head_elements')
	<link rel="canonical" href="{{ route('about') }}">
	<meta name="description" content="How to balance chemical equations, how does Chemistry Calculator work and use algebraic method">
@endsection

@section('content')
	<section class="section">
		<article class="container content">
			<h2>About Chemistry Calculator and how does it work</h2>
			<section>
				<h3>Table of contents</h3>
				<p>
					<ul>
						<li><a href="#introduction">Introduction</a></li>
						<li><a href="#chemistry-background">Chemistry background</a></li>
						<li><a href="#algebraic-method">Algebraic method</a></li>
					</ul>
				</p>
			</section>
			<hr />
			<section id="introduction">
				<h3>Introduction</h3>
				<p>
					Chemistry Calculator is an app that balances chemical equations (finds stoichiometric coefficients) and calculates molar masses.
					It does so by taking input, parsing it and building reaction matrix from the equation. It then brings the matrix to reduced row echelon form and interpretes the results. If found, coefficients are transformed to ordered list of coprime integers.
				</p>
			</section>
			<section id="chemistry-background">
				<h3>Chemistry background</h3>
				<p>
					When chemical reaction occur, substrates are transformed into products (both substrates and products are reagents) with possible presence of catalysts and required environmental circumstances (like high temperature for instance).
					Every single type of reaction turns given substrates into given products. Each of chemical substances (reagents) involved has its own strict formula. Reagents are molecules made of appropriate atoms in appropriate amounts and their exact composition is described by their formula.
					As chemical reactions do not alter atomic nuclei and due to law of mass conservation there must be the same number of atoms of each species on sides of reaction equation. That means there must be the same total number of atoms of each element on both sides of the equation and the total charge needs to be equal as well.
					But not every reaction would satisfy the above if only one molecule of each reagent would be used. There may be cases where few molecules of some reagent are needed for a reaction to take place. The numbers of molecules are called stoichiometric coefficients and process of finding them to satisfy the law of mass conservation is called balancing a chemical equation.
				</p>
			</section>
			<section id="algebraic-method">
				<h3>Algebraic method</h3>
				<p>
					
				</p>
			</section>
		</article>
	</section>
@endsection