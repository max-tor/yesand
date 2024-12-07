<?php 

/**
 * Yes& Form block
 *
 */
// you can remove the div.form-block if needed
// just renders that the block is enabled
?>
<section id="section-mint-form" class="bg-mint pt-10 pb-20">
	<div class="container">
		<div class="md:flex items-center md:gap-10 lg:gap-20 xl:gap-28">
			<div class="basis-1/2 xl:basis-2/5">
				<h2 class="heading-4 text-dark-green">
					<span class="prepend-3 block mb-1">Sign up for</span>
					<span>The Ampersand</span>
				</h2>

				<form class="mt-8" action="" method="POST">
					<div class="columns-2">
						<p class="form-group-1">
						    <label for="user_first_name" class="sr-only">First name</label>
							<input id="user_first_name" class="input-1" type="text" name="user[first_name]" autocomplete="given-name" placeholder="First Name" required>
						</p>
						<p class="form-group-1">
							<label for="user_last_name" class="sr-only">Last name</label>
							<input id="user_last_name" class="input-1" type="text" name="user[last_name]" autocomplete="family-name" placeholder="Last Name" required>
						</p>
					</div>

					<p class="form-group-1">
						<label for="user_email" class="sr-only">Last name</label>
						<input id="user_email" class="input-1" type="email" name="user[email]" autocomplete="email" placeholder="Email Address" required>
					</p>

					<input type="submit" class="para-6 text-red mt-4" value="Submit →">
				</form>
			</div>

			<div class="basis-1/2 xl:basis-3/5">
				<div class="prepend-5 text-dark-green">The Ampersand is a montly newsletter published by Yes&, designed to bring you our search for the "end" in everything.</div>
			</div>
		</div>
	</div>
</section>