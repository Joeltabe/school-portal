<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />

		<link
			href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
			rel="stylesheet"
		/>

		<!--<link rel="stylesheet" href="css/icon-font.css">-->

		<link href="css/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />


		<title>HTTC KUMBA</title>
        <style>
            #ppicture{
                height: 200px;
                width: 200px;
            }
            @media (max-width: 600px) {
                #ppicture {
                    height: 100px;
                    width: 100px;
                }
            }
            @media (max-width: 400px) {
                #ppicture {
                    height: 70px;
                    width: 70px;
                }
            }
        </style>
	</head>


	<body>
		<div class="navigation">
			<input type="checkbox" class="navigation__checkbox" id="navi-toggle" />

			<label for="navi-toggle" class="navigation__button">
				<span class="navigation__icon">&nbsp;</span>
			</label>

			<div class="navigation__background">&nbsp;</div>

			<nav class="navigation__nav">
				<ul class="navigation__list">
					<li class="navigation__item">
						<a href="?#httc" class="navigation__link"><span>01</span>About HTTC</a>
					</li>
					<li class="navigation__item">
						<a href="?#ccc" class="navigation__link"><span>02</span>Your benfits</a>
					</li>
					<li class="navigation__item">
						<a href="register.php" class="navigation__link"><span>03</span>fill form here</a>
					</li>
				</ul>
			</nav>
		</div>

		<header class="header" style="background: #55c57a;">
			<div class="header__logo-box">
				<img
					src="img/images-removebg-preview.png"
					alt="Logo"
					class="header__logo"
					id="ppicture"
				/>
			</div>

			<div class="header__text-box">
				<h1 class="heading-primary">
					<span class="heading-primary--main">HTTC KUMBA</span>
					<span class="heading-primary--sub">make your dreams come true</span>
				</h1>

				<a href="register.php" class="btn btn--white btn--animated"
					>fill form here</a
				>
			</div>
		</header>

		<main>
			<section class="section-about" id="httc">
				<div class="u-center-text u-margin-bottom-big">
					<h2 class="heading-secondary" id="partners">
						Exciting institute for amazing people
					</h2>
				</div>

				<div class="row">
					<div class="col-1-of-2">
						<h3 class="heading-tertiary u-margin-bottom-small">
							You're going to fall in love with httc kumba
						</h3>
						<p class="paragraph">
							The Higher Technical Teachers' Training College (HTTTC) in Kumba,
							Cameroon is a higher education institution that offers training in
							teaching and technical fields. It is one of the most prestigious
							institutions in Cameroon and is known for its high quality of
							education.
						</p>

						<h3 class="heading-tertiary u-margin-bottom-small">
							Explore opportunities like you never have before
						</h3>
						<p class="paragraph">
							The college offers a variety of undergraduate and graduate
							programs, as well as specialized training courses. Students from
							HTTC Kumba have gone on to successful careers in education,
							engineering, and other fields.
						</p>

						<a href="#" class="btn-text">Learn more &rarr;</a>
					</div>
					<div class="col-1-of-2">
						<div class="composition">
							<img
								srcset="img/download (4).jpeg 300w, img/download (4).jpeg 1000w"
								sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px"
								alt="Photo 1"
								class="composition__photo composition__photo--p1"
								src="img/download (4).jpeg"
							/>

							<img
								srcset="img/images (3).jpeg 300w, img/images (3).jpeg 1000w"
								sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px"
								alt="Photo 2"
								class="composition__photo composition__photo--p2"
								src="img/images (3).jpeg"
							/>

							<img
								srcset="img/images (2).jpeg 300w, img/images (2).jpeg 1000w"
								sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px"
								alt="Photo 3"
								class="composition__photo composition__photo--p3"
								src="img/images (2).jpeg"
							/>

							<!--
                            <img src="img/nat-1-large.jpg" alt="Photo 1" class="composition__photo composition__photo--p1">
                            <img src="img/nat-2-large.jpg" alt="Photo 2" class="composition__photo composition__photo--p2">
                            <img src="img/nat-3-large.jpg" alt="Photo 3" class="composition__photo composition__photo--p3">
                            -->
						</div>
					</div>
				</div>
			</section>

			<section class="section-features" id="ccc">
				<div class="u-center-text u-margin-bottom-big">
					<h2 class="heading-secondary" id="partners" style="color: white">
						Why choose us?
					</h2>
				</div>
				<div class="row">
					<div class="col-1-of-4">
						<div class="feature-box">
							<i class="feature-box__icon icon-basic-world"></i>
							<h3 class="heading-tertiary u-margin-bottom-small">Location</h3>
							<p class="feature-box__text">
								Located Cameroon, which is a beautiful
								city with a rich culture and history. It is home to a
								number of industries, meaning there are plenty of
								opportunities for employment after graduation.
							</p>
						</div>
					</div>

					<div class="col-1-of-4">
						<div class="feature-box">
							<i class="feature-box__icon icon-basic-compass"></i>
							<h3 class="heading-tertiary u-margin-bottom-small">
								Variety of programs
							</h3>
							<p class="feature-box__text">
								HTTC Kumba offers a wide range of undergraduate and graduate
								programs in teaching and technical fields. This means that you
								can choose a program that is tailored to your interests and
								career goals..
							</p>
						</div>
					</div>

					<div class="col-1-of-4">
						<div class="feature-box">
							<i class="feature-box__icon icon-basic-map"></i>
							<h3 class="heading-tertiary u-margin-bottom-small">
								Small Class Size
							</h3>
							<p class="feature-box__text">
								HTTC Kumba has a small student-to-faculty ratio, which means
								that you will receive a lot of individualized attention from
								your professors. This can help you to succeed in your studies
								and develop your skills.
							</p>
						</div>
					</div>

					<div class="col-1-of-4">
						<div class="feature-box">
							<i class="feature-box__icon icon-basic-heart"></i>
							<h3 class="heading-tertiary u-margin-bottom-small">
								Personalized attention and guidance:
							</h3>
							<p class="feature-box__text">
								HTTC Kumba's lecturers go beyond imparting knowledge and
								actively nurture their students' growth. They genuinely care
								about their students' well-being.
							</p>
						</div>
					</div>
				</div>
			</section>

			<!-- <section class="section-tours" id="section-tours">
				<div class="u-center-text u-margin-bottom-big">
					<h2 class="heading-secondary">Most popular tours</h2>
				</div>

				<div class="row">
					<div class="col-1-of-3">
						<div class="card">
							<div class="card__side card__side--front">
								<div class="card__picture card__picture--1">&nbsp;</div>
								<h4 class="card__heading">
									<span class="card__heading-span card__heading-span--1"
										>The Sea Explorer</span
									>
								</h4>
								<div class="card__details">
									<ul>
										<li>3 day tours</li>
										<li>Up to 30 people</li>
										<li>2 tour guides</li>
										<li>Sleep in cozy hotels</li>
										<li>Difficulty: easy</li>
									</ul>
								</div>
							</div>
							<div class="card__side card__side--back card__side--back-1">
								<div class="card__cta">
									<div class="card__price-box">
										<p class="card__price-only">Only</p>
										<p class="card__price-value">$297</p>
									</div>
									<a href="#popup" class="btn btn--white">Book now!</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-1-of-3">
						<div class="card">
							<div class="card__side card__side--front">
								<div class="card__picture card__picture--2">&nbsp;</div>
								<h4 class="card__heading">
									<span class="card__heading-span card__heading-span--2"
										>The Forest Hiker</span
									>
								</h4>
								<div class="card__details">
									<ul>
										<li>7 day tours</li>
										<li>Up to 40 people</li>
										<li>6 tour guides</li>
										<li>Sleep in provided tents</li>
										<li>Difficulty: medium</li>
									</ul>
								</div>
							</div>
							<div class="card__side card__side--back card__side--back-2">
								<div class="card__cta">
									<div class="card__price-box">
										<p class="card__price-only">Only</p>
										<p class="card__price-value">$497</p>
									</div>
									<a href="#popup" class="btn btn--white">Book now!</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-1-of-3">
						<div class="card">
							<div class="card__side card__side--front">
								<div class="card__picture card__picture--3">&nbsp;</div>
								<h4 class="card__heading">
									<span class="card__heading-span card__heading-span--3"
										>The Snow Adventurer</span
									>
								</h4>
								<div class="card__details">
									<ul>
										<li>5 day tours</li>
										<li>Up to 15 people</li>
										<li>3 tour guides</li>
										<li>Sleep in provided tents</li>
										<li>Difficulty: hard</li>
									</ul>
								</div>
							</div>
							<div class="card__side card__side--back card__side--back-3">
								<div class="card__cta">
									<div class="card__price-box">
										<p class="card__price-only">Only</p>
										<p class="card__price-value">$897</p>
									</div>
									<a href="#popup" class="btn btn--white">Book now!</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="u-center-text u-margin-top-huge">
					<a href="#" class="btn btn--green">Discover all tours</a>
				</div>
			</section>

			<section class="section-stories">
				<div class="bg-video">
					<video class="bg-video__content" autoplay muted loop>
						<source src="img/video.mp4" type="video/mp4" />
						<source src="img/video.webm" type="video/webm" />
						Your browser is not supported!
					</video>
				</div>

				<div class="u-center-text u-margin-bottom-big">
					<h2 class="heading-secondary">We make people genuinely happy</h2>
				</div>

				<div class="row">
					<div class="story">
						<figure class="story__shape">
							<img
								src="img/nat-8.jpg"
								alt="Person on a tour"
								class="story__img"
							/>
							<figcaption class="story__caption">Mary Smith</figcaption>
						</figure>
						<div class="story__text">
							<h3 class="heading-tertiary u-margin-bottom-small">
								I had the best week ever with my family
							</h3>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing elit.
								Aperiam, ipsum sapiente aspernatur libero repellat quis
								consequatur ducimus quam nisi exercitationem omnis earum qui.
								Aperiam, ipsum sapiente aspernatur libero repellat quis
								consequatur ducimus quam nisi exercitationem omnis earum qui.
							</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="story">
						<figure class="story__shape">
							<img
								src="img/nat-9.jpg"
								alt="Person on a tour"
								class="story__img"
							/>
							<figcaption class="story__caption">Jack Wilson</figcaption>
						</figure>
						<div class="story__text">
							<h3 class="heading-tertiary u-margin-bottom-small">
								WOW! My life is completely different now
							</h3>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing elit.
								Aperiam, ipsum sapiente aspernatur libero repellat quis
								consequatur ducimus quam nisi exercitationem omnis earum qui.
								Aperiam, ipsum sapiente aspernatur libero repellat quis
								consequatur ducimus quam nisi exercitationem omnis earum qui.
							</p>
						</div>
					</div>
				</div>

				<div class="u-center-text u-margin-top-huge">
					<a href="#" class="btn-text">Read all stories &rarr;</a>
				</div>
			</section>

			<section class="section-book">
				<div class="row">
					<div class="book">
						<div class="book__form">
							<form action="#" class="form">
								<div class="u-margin-bottom-medium">
									<h2 class="heading-secondary">Start booking now</h2>
								</div>

								<div class="form__group">
									<input
										type="text"
										class="form__input"
										placeholder="Full name"
										id="name"
										required
									/>
									<label for="name" class="form__label">Full name</label>
								</div>

								<div class="form__group">
									<input
										type="email"
										class="form__input"
										placeholder="Email address"
										id="email"
										required
									/>
									<label for="email" class="form__label">Email address</label>
								</div>

								<div class="form__group u-margin-bottom-medium">
									<div class="form__radio-group">
										<input
											type="radio"
											class="form__radio-input"
											id="small"
											name="size"
										/>
										<label for="small" class="form__radio-label">
											<span class="form__radio-button"></span>
											Small tour group
										</label>
									</div>

									<div class="form__radio-group">
										<input
											type="radio"
											class="form__radio-input"
											id="large"
											name="size"
										/>
										<label for="large" class="form__radio-label">
											<span class="form__radio-button"></span>
											Large tour group
										</label>
									</div>
								</div>

								<div class="form__group">
									<button class="btn btn--green">Next step &rarr;</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</main>

		<footer class="footer">
			<div class="footer__logo-box">
				<picture class="footer__logo">
					<source
						srcset="
							img/logo-green-small-1x.png 1x,
							img/logo-green-small-2x.png 2x
						"
						media="(max-width: 37.5em)"
					/>
					<img
						srcset="img/logo-green-1x.png 1x, img/logo-green-2x.png 2x"
						alt="Full logo"
						src="img/logo-green-2x.png"
					/>
				</picture>
			</div>
			<div class="row">
				<div class="col-1-of-2">
					<div class="footer__navigation">
						<ul class="footer__list">
							<li class="footer__item">
								<a href="#" class="footer__link">Company</a>
							</li>
							<li class="footer__item">
								<a href="#" class="footer__link">Contact us</a>
							</li>
							<li class="footer__item">
								<a href="#" class="footer__link">Carrers</a>
							</li>
							<li class="footer__item">
								<a href="#" class="footer__link">Privacy policy</a>
							</li>
							<li class="footer__item">
								<a href="#" class="footer__link">Terms</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-1-of-2">
					<p class="footer__copyright">
						Built by <a href="#" class="footer__link">Jonas Schmedtmann</a> for
						his online course
						<a href="#" class="footer__link">Advanced CSS and Sass</a>.
						Copyright &copy; by Jonas Schmedtmann. You are 100% allowed to use
						this webpage for both personal and commercial use, but NOT to claim
						it as your own design. A credit to the original author, Jonas
						Schmedtmann, is of course highly appreciated!
					</p>
				</div>
			</div>
		</footer>

		<div class="popup" id="popup">
			<div class="popup__content">
				<div class="popup__left">
					<img src="img/nat-8.jpg" alt="Tour photo" class="popup__img" />
					<img src="img/nat-9.jpg" alt="Tour photo" class="popup__img" />
				</div>
				<div class="popup__right">
					<a href="#section-tours" class="popup__close">&times;</a>
					<h2 class="heading-secondary u-margin-bottom-small">
						Start booking now
					</h2>
					<h3 class="heading-tertiary u-margin-bottom-small">
						Important &ndash; Please read these terms before booking
					</h3>
					<p class="popup__text">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed sed
						risus pretium quam. Aliquam sem et tortor consequat id. Volutpat
						odio facilisis mauris sit amet massa vitae. Mi bibendum neque
						egestas congue. Placerat orci nulla pellentesque dignissim enim sit.
						Vitae semper quis lectus nulla at volutpat diam ut venenatis.
						Malesuada pellentesque elit eget gravida cum sociis natoque
						penatibus et. Proin fermentum leo vel orci porta non pulvinar neque
						laoreet. Gravida neque convallis a cras semper. Molestie at
						elementum eu facilisis sed odio morbi quis. Faucibus vitae aliquet
						nec ullamcorper sit amet risus nullam eget. Nam libero justo laoreet
						sit. Amet massa vitae tortor condimentum lacinia quis vel eros
						donec. Sit amet facilisis magna etiam. Imperdiet sed euismod nisi
						porta.
					</p>
					<a href="#" class="btn btn--green">Book now</a>
				</div>
			</div>
		</div> -->

		<!--
        <section class="grid-test">
            <div class="row">
                <div class="col-1-of-2">
                    Col 1 of 2
                </div>
                <div class="col-1-of-2">
                    Col 1 of 2
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-3">
                    Col 1 of 3
                </div>
                <div class="col-2-of-3">
                    Col 2 of 3
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-2-of-4">
                    Col 2 of 4
                </div>
            </div>

            <div class="row">
                <div class="col-1-of-4">
                    Col 1 of 4
                </div>
                <div class="col-3-of-4">
                    Col 3 of 4
                </div>
            </div>
        </section>
        -->
	</body>
</html>
