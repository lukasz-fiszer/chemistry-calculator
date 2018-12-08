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
		<article class="container content about-description">
			<h2>About Chemistry Calculator and how does it work</h2>
			<section>
				<h3>Table of contents</h3>
				<p>
					<ul>
						<li><a href="#introduction">Introduction</a></li>
						<li><a href="#chemistry-background">Chemistry background</a></li>
						<li><a href="#algebraic-method">Algebraic method</a></li>
						<li><a href="#the-app">The app</a></li>
					</ul>
				</p>
			</section>
			<hr />
			<section id="introduction">
				<h3>Introduction</h3>
				<p>Chemistry Calculator is an app that balances chemical equations (finds stoichiometric coefficients) and calculates molar masses.<br />
				It does so by taking input, parsing it and building reaction matrix from the equation. It then brings the matrix to reduced row echelon form and interpretes the results. If found, coefficients are transformed to ordered list of coprime integers.</p>
			</section>
			<section id="chemistry-background">
				<h3>Chemistry background</h3>
				<p>When chemical reactions occur, substrates are transformed into products (both substrates and products are reagents) with possible presence of catalysts and required environmental circumstances (like high temperature for instance).<br />
				Every single type of reaction turns given substrates into given products. Each of chemical substances (reagents) involved has its own strict formula. Reagents are molecules made of appropriate atoms in appropriate amounts and their exact composition is described by their formula.<br />
				As chemical reactions do not alter atomic nuclei and due to law of mass conservation there must be the same number of atoms of each species on sides of reaction equation. That means there must be the same total number of atoms of each element on both sides of the equation and the total charge needs to be equal as well.<br />
				But not every reaction would satisfy the above if only one molecule of each reagent would be used. There may be cases where few molecules of some reagent are needed for a reaction to take place. The numbers of molecules are called stoichiometric coefficients and process of finding them to satisfy the law of mass conservation is called balancing a chemical equation.<br />
				If mathematically possible, by giving each molecule a coefficient describing how many instances of it are present in reaction both charge and atoms of each element presence can be balanced and so the reaction can be balanced.</p>
				<p>For example:<br />
				In the following reaction <code>Fe + Cl<sub>2</sub> = FeCl<sub>3</sub></code>, one molecule of <em>iron</em> synthesises with one molecule of <em>diatomic chlorine</em> to produce <em>iron(III) chloride</em>.<br />
				But the reaction is unbalanced: <code>1*Fe + 2*Cl <span class="has-text-danger">!=</span> 1*Fe + 3*Cl</code><br />
				Balancing the reaction equation gives: <code><b class="has-text-info">2</b> Fe + <b class="has-text-info">3</b> Cl<sub>2</sub> = <b class="has-text-info">2</b> FeCl<sub>3</sub></code><br />
				So number of species on each side is equal: <code><b class="has-text-info">2</b>*(1*Fe) + <b class="has-text-info">3</b>*(2*Cl) <span class="has-text-success">==</span> <b class="has-text-info">2</b>*(1*Fe + 3*Cl)</code></p>
			</section>
			<section id="algebraic-method">
				<h3>Algebraic method</h3>
				<p>There are many methods to balance chemical equations, but some of them are very specific and are useful only in fraction of all reactions. Pure algebraic method that can be used to balance <em>any</em> chemical equation comes from the above theory presented and its mathematical implications.<br />
				In brief, for any reaction there can be created a system of linear equations that can be used to solve for stoichimetric coefficients. Every molecule can have an unknown variable assigned (like <em>x<sub>1</sub>, x<sub>2</sub>, ...</em>) and every element involved and charge is responsible for one equation regarding the molecules variables.<br />
				For every species an equation can be made where every molecule variable is multiplied by the number of occurences of given species within the molecule. This forms system of linear equations that solved gives the balanced equation.<br />
				In case of underdetermined systems, free variables can be substituted by any number greater then 0 (for convenience of chemical reality). Then such variables need to be transformed to ordered list of coprime integers in order to get what is known as stoichiometric coefficients. Fractions could be used for molar amounts.<br />
				In case of inconsistent system (often overdetermined) there is no way to balance the reaction. This mathematical method implies for purely theorethical reasons that such reaction is impossible to occur. (Note: In fact every chemical reaction can be balanced and so the reaction matrix will never be inconsistent but it may yield all 0s as coefficients what means that the reaction does not occur, see next paragraph).<br />
				In case when after solving some coefficients are 0s that means the reaction can be balanced and occur but without these 'zero-ed' molecules taking part in the reaction.<br />
				In case when some coefficients are negative the reaction can take place but after swaping the substrates/products sides for the negative molecules. They simply need to be placed on the other side of reaction equation.<br />
				It is important to note that algebraic approach balances only the equation in theorethical way. If reaction cannot be balanced this implies that it will not occur in practice. But if it may be balanced then it can occur only in theory. Sometimes such reaction will not take place in practice for chemical reasons. Such method is very useful as it can immediately group molecules into substrates and products. In fact molecules do not need to be placed on different sides initially, they will eventually have negative coefficients assessed.</p>
			</section>
			<section id="the-app">
				<h3>The app</h3>
				<p>The app works by taking query input and parsing it. Input is being streamed with one character look-ahead, then tokenized with one token look-ahead and then parsed. Chemical equation is treated as context-free grammar and is parsed by LL(1) recursive descent parser with the following (shown slightly simplified) production rules.<br />
				Lexer rules (definitions as regular expressions):<br />
				<code>
					whitespace: /\w+/ (tokenized but ignored)<br />
					number: /\d+/<br />
					element: /[A-Z][a-z]*/<br />
					plus: /+/<br />
					minus: /-/<br />
					{{-- equals: /(=|=>|<=|<=>|->|<-|<->)/<br /> --}}
					equals: /(=>|=|<=|<=>|->|<-|<->)/<br />
					brackets: /[\(\){}\[\]]/ (brackets in pairs, escaped)<br />
				</code><br />
				Parser rules:<br />
				<code>
					Equation: Molecule (plus Molecule)* equals Molecule (plus Molecule)*<br />
					Molecule: Pair | Group | Pair Molecule | Group Molecule<br />
					Group: open_bracket Pair* close_bracket number? (any number of pairs enclosed within matching pair of brackets)<br />
					Pair: element number? | plus number?
				</code>
				After parsing, 'interpreter' code checks for type of the expression (molecule or whole reaction) and based on that it routes to different solver. The reaction equation solver extracts the reaction matrix and solves it for coefficients (as described above in <a href="#algebraic-method">algebraic method section</a>). If any error occurs in the process it is displayed (parse error for instance). On the frontend, reaction table is displayed where stoichiometric calculations regarding molar masses can be done.</p>
			</section>
		</article>
	</section>
@endsection