<!DOCTYPE html>
<html lang="en">




	<head>




		<!-- Tells the browser that the page is written in UTF-8 unicode. This is for internationalization. -->
		<meta charset="UTF-8">
		<!-- This tag is for Internet Explorer, and it allows us to specify what version of IE to render page in. "IE=edge" tells IE to display our content in the highest mode available, which avoids "IE Compatibility Mode" bugs. -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- This is the responsive meta tag. This is used to scale and size our content relative to the "viewport" - which is essentially is the visible portion of screen itself. This tag also sets the inital zoom scale to 1:1. This <meta> tag is required when creating a responsive web site. -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- Bootstrap Latest compiled and minified CSS -->
		<!-- This loads our Bootstrap CSS file directly from maxcdn. -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
		<!-- This tag is optional. It loads the default Bootstrap theme directly from maxcdn. -->
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
		<!-- The two oss. scripts (below) will go away with Bootstrap 4, so the older versions of Internet Explorer will no longer be supported. -->
		<!-- This is an HTML Conditional Comment. These are conditional statements that are read and executed only by Internet Explorer versions 5 - 9, and are now officially deprecated. We use this block of code to serve up a couple fo specific JavaScript files just for users of older versions of IE. Here, we will load html5shiv.js and respond.js in IE 8 and below. Respond.js enables CSS media query support for IE 6-8. HTML5 shiv enables styling of HTML5 elements in IE8 and below. (IE8 and below does not allow unknown elements to be styled without JavaScript.) -->
		<!-- HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- This loads the minified jQuery JavaScript library from Google's CDN. jQuery required for many of Bootstrap's built-in functionality. -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
		<!-- This is Bootstrap's JavaScript file, which is required if you want to feature many of Bootstrap's built-in components such as modal windows, dropdown menus, and transitions. This file, which is being directly loaded from maxcdn, includes all the Bootstrap components. -->
		<!-- Latest compiled and minified Bootstrap JavaScript, all compiled plugins included -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




		<!-- Favicon Statements -->
		<link rel="apple-touch-icon" sizes="180x180" href="img/ecc-testing-apple-touch-icon.png">
		<link rel="icon" type="image/png" href="img/ecc-testing-favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="img/ecc-testing-favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="img/ecc-testing-manifest.json">
		<link rel="mask-icon" href="img/ecc-testing-safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="img/ecc-testing-favicon.ico">
		<meta name="msapplication-config" content="img/ecc-testing-browserconfig.xml">
		<meta name="theme-color" content="#ffffff">




		<!-- JavaScript Big Number Library (JSBN) -->
		<script type="text/javascript" src="../js/jsbn/jsbn-ecc.js"></script>
		<script type="text/javascript" src="../js/jsbn/jsbn-jsbn1.js"></script>
		<script type="text/javascript" src="../js/jsbn/jsbn-jsbn2.js"></script>
		<script type="text/javascript" src="../js/jsbn/jsbn-prng4.js"></script>
		<script type="text/javascript" src="../js/jsbn/jsbn-rng.js"></script>
		<script type="text/javascript" src="../js/jsbn/jsbn-sec.js"></script>

		<!-- Site-specific Scripts -->
		<script type="text/javascript" src="js/ecc-salt.js"></script>




		<link rel="stylesheet" href="css/ecc-test-styles.css" type="text/css" />




		<title>ECC Salt Testing</title>




	</head>




	<body onload="initializeEllipticCurveParameters()">




		<header>





		</header>




		<main>




			<!-- Elliptic Curve Parameters -->
			<div class="container">


				<div class="row">

					<div class="col-sm-12">

						<label id="elliptic-curve-parameters"></label>

						<h4>Elliptic Curve Parameters</h4>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label
								class="control-label
										 elliptic-curve-parameter-label
										"
							>
								a:
							</label>

						</div>

						<div class="col-sm-10">

							<textarea
								class="form-control
										 elliptic-curve-parameter
										"
								id="eccA"
								placeholder="a = the coefficient of the x term in: y ^ 2 = x ^ 3 + a * x + b"
								required="required"
								wrap="soft"
							></textarea>

						</div>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label
								class="control-label
										 elliptic-curve-parameter-label
										"
							>
								b:
							</label>

						</div>

						<div class="col-sm-10">

							<textarea
								class="form-control
										 elliptic-curve-parameter
										"
								id="eccB"
								placeholder="b = the value of the constant term in: y ^ 2 = x ^ 3 + a * x + b"
								required="required"
								wrap="soft"
							></textarea>

						</div>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label
								class="control-label
										 elliptic-curve-parameter-label
										"
							>
								p:
							</label>

						</div>

						<div class="col-sm-10">

							<textarea
								class="form-control
										 elliptic-curve-parameter
										"
								id="eccP"
								placeholder="p = the prime number bounding the field of elliptic curve points"
								required="required"
								wrap="soft"
							></textarea>

						</div>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label
								class="control-label
										 elliptic-curve-parameter-label
										"
							>
								n:
							</label>

						</div>

						<div class="col-sm-10">

							<textarea
								class="form-control
										 elliptic-curve-parameter
										"
								id="eccN"
								placeholder="n = a prime which is the order of the base point G (on the elliptic curve)"
								required="required"
								wrap="soft"
							></textarea>

						</div>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label
								class="control-label
										 elliptic-curve-parameter-label
										"
							>
								Gx:
							</label>

						</div>

						<div class="col-sm-10">

							<textarea
								class="form-control
										 elliptic-curve-parameter
										"
								id="eccGx"
								placeholder="Gx = The x of the (x,y)-point on the elliptic curve. For precomputed curves (for example, NIST elliptic curves), (x,y) should be furnished with the other curve parameters."
								required="required"
								wrap="soft"
							></textarea>

						</div>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label
								class="control-label
										 elliptic-curve-parameter-label
										"
							>
								Gy:
							</label>

						</div>

						<div class="col-sm-10">

							<textarea
								class="form-control
										 elliptic-curve-parameter
										"
								id="eccGy"
								placeholder="Gy = The y of the (x,y)-point on the elliptic curve. For precomputed curves (for example, NIST elliptic curves), (x,y) should be furnished with the other curve parameters."
								required="required"
								wrap="soft"
							></textarea>

						</div>

					</div>

				</div>


			</div>




			<!-- Sender and Receiver Parameters -->
			<div class="container">


				<div class="row">


					<div class="col-md-6">


						<div class="row">

							<div class="col-md-12">

								<label id="senders-parameters"></label>

								<h4>Sender: Captain Dylan</h4>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 senders-parameter-label
												"
									>
										Sender's Password:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 senders-parameter
													"
											id="sendersPassword"
											placeholder="Pick a password."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="s"
											onclick="generateSendersPassword()"
										>
											Generate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 senders-parameter-label
												"
									>
										Sender's Salt:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 senders-parameter
													"
											id="sendersSalt"
											placeholder="Put some salt on it."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="s"
											onclick="generateSendersSalt()"
										>
											Generate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 senders-parameter-label
												"
									>
										Sender's Private Multiplier:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 senders-parameter
													"
											id="sendersPrivateMultiplier"
											placeholder="Pick a number (a private one) to multiply the (Gx,Gy)-point (above) by."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="s"
											onclick="generateSendersPrivateMultiplier()"
										>
											Generate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 senders-parameter-label
												"
									>
										Sender's public key x:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 senders-parameter
													"
											id="sendersMultipliedX"
											placeholder="The sender's public key (k) is the product of the sender's private multiplier (s) and the base point (G) of the elliptic curve: k = s * G ."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
											                         btn
														 btn-default
											        "
											type="button"
											accesskey="u"
											onclick="calculateSendersMultipliedPoint()"
										>
											Calculate
										</span>


									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 senders-parameter-label
												"
									>
										Sender's public key y:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 senders-parameter
													"
											id="sendersMultipliedY"
											placeholder="The sender's public key (k) is the product of the sender's private multiplier (s) and the base point (G) of the elliptic curve: k = s * G ."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="u"
											onclick="calculateSendersMultipliedPoint()"
										>
											Calculate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 senders-parameter-label
												"
									>
										Common secret key x:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 senders-parameter
													"
											id="sendersCommonSecretKeyX"
											placeholder="The common secret key x"
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="c"
											onclick="calculateSendersCommonSecretKey()"
										>
											Calculate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 senders-parameter-label
												"
									>
										Common secret key y:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 senders-parameter
													"
											id="sendersCommonSecretKeyY"
											placeholder="The common secret key y"
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="c"
											onclick="calculateSendersCommonSecretKey()"
										>
											Calculate
										</span>

									</div>

								</div>

							</div>

						</div>


					</div>




					<div class="col-md-6">


						<div class="row">

							<div class="col-md-12">

								<label id="receivers-parameters"></label>

								<h4>Receiver: Comandante Rochelle (aka #1)</h4>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 receivers-parameter-label
												"
									>
										Receiver's Password:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 receivers-parameter
													"
											id="receiversPassword"
											placeholder="Pick a password."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="s"
											onclick="generateReceiversPassword()"
										>
											Generate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 receivers-parameter-label
												"
									>
										Receiver's Salt:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 receivers-parameter
													"
											id="receiversSalt"
											placeholder="Put some salt on it."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="s"
											onclick="generateReceiversSalt()"
										>
											Generate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 receivers-parameter-label
												"
									>
										Receiver's Private Multiplier:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 receivers-parameter
													"
											id="receiversPrivateMultiplier"
											placeholder="Pick a number (a private one) to multiply the (Gx,Gy)-point by."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="r"
											onclick="generateReceiversPrivateMultiplier()"
										>
											Generate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 receivers-parameter-label
												"
									>
										Receiver's public key x:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 receivers-parameter
													"
											id="receiversMultipliedX"
											placeholder="The receiver's public key (k) is the product of the receiver's private multiplier (r) and the base point (G) of the elliptic curve: k = r * G ."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="t"
											onclick="calculateReceiversMultipliedPoint()"
										>
											Calculate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 receivers-parameter-label
												"
									>
										Receiver's public key y:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 receivers-parameter
													"
											id="receiversMultipliedY"
											placeholder="The receiver's public key (k) is the product of the receiver's private multiplier (r) and the base point (G) of the elliptic curve: k = r * G ."
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="t"
											onclick="calculateReceiversMultipliedPoint()"
										>
											Calculate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 receivers-parameter-label
												"
									>
										Common secret key x:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 receivers-parameter
													"
											id="receiversCommonSecretKeyX"
											placeholder="The common secret key x"
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											onclick="calculateReceiversCommonSecretKey()"
										>
											Calculate
										</span>

									</div>

								</div>

							</div>

						</div>


						<div class="row">

							<div class="form-group">

								<div class="col-sm-2
												text-right
											  "
								>

									<label
										class="control-label
												 receivers-parameter-label
												"
									>
										Common secret key y:
									</label>

								</div>

								<div class="col-sm-10">

									<div class="input-group">

										<textarea
											class="form-control
													 receivers-parameter
													"
											id="receiversCommonSecretKeyY"
											placeholder="The common secret key y"
											required="required"
											wrap="soft"
										></textarea>

										<span
											class="input-group-addon
													 btn
													 btn-default
													"
											type="button"
											accesskey="c"
											onclick="calculateReceiversCommonSecretKey()"
										>
											Calculate
										</span>

									</div>

								</div>

							</div>

						</div>

					</div>


				</div>


			</div>




			<!-- Message -->
			<div class="container">


				<div class="row">

					<div class="col-sm-12">

						<label id="message"></label>

						<h4>Encrypting and Decrypting the Message</h4>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label class="control-label
											  message-parameter-label
											 "
							>
								Message:
							</label>

						</div>

						<div class="col-sm-10">

							<div class="input-group">

								<textarea
									class="form-control
											 message-parameter
											"
									id="messagePlainText"
									placeholder="Enter the plain text message, here."
									required="required"
									wrap="soft"
								></textarea>

								<span
									class="input-group-addon
											 btn
											 btn-default
											"
									type="button"
									accesskey="e"
									onclick="encryptMessage()"
								>
									Encrypt
								</span>

							</div>

						</div>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label class="control-label
											  message-parameter-label
											 "
							>
								Cipher text:
							</label>

						</div>

						<div class="col-sm-10">

							<div class="input-group">

								<textarea
									class="form-control
											 message-parameter
											"
									id="messageCipherText"
									placeholder="The cipher text will go here, after you press the Encrypt button (above)."
									required="required"
									wrap="soft"
								></textarea>

								<span
									class="input-group-addon
												 btn
												 btn-default
												"
									type="button"
									accesskey="d"
									onclick="decryptMessage()"
								>
									Decrypt
								</span>

							</div>

						</div>

					</div>

				</div>


				<div class="row">

					<div class="form-group">

						<div class="col-sm-2
										text-right
									  "
						>

							<label
								class="
										 control-label
										 message-parameter-label
										"
							>
								Decrypted message:
							</label>

						</div>

						<div class="col-sm-10">


								<textarea
									class="form-control
											 message-parameter
											"
									id="decryptedMessage"
									placeholder="The plain text of the decrypted message will go here, after you press the Decrypt button (above)."
									required="required"
									wrap="soft"
								></textarea>


						</div>

					</div>

				</div>


			</div>




		</main>




		<footer>


			<nav class="navbar navbar-default navbar-fixed-bottom">
				<div class="container-fluid">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle Button</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!--<a href="#" class="navbar-left"><img src="img/kite-crypt-navbar-logo.png" alt="Kite Crypt Logo" class="navbar-brand navbar-left"></a>-->
						<img src="img/kite-crypt-navbar-logo.png" alt="Kite Crypt Logo" class="navbar-brand navbar-left">
						<!--<a class="navbar-brand" href="#" >ECC Test</a>-->
						<span class="navbar-brand navbar-left">ECC Test</span>
					</div>


					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Elliptic Curves<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li id="curve1" value="secp128r1"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-128 Random 1</a></li>
									<li id="curve2" value="secp160r1"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-160 Random 1</a></li>
									<li id="curve3" value="secp192r1"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-192 Random 1</a></li>
									<li id="curve4" value="secp224r1"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-224 Random 1</a></li>
									<li id="curve5" value="secp256r1"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-256 Random 1</a></li>
									<li role="separator" class="divider"></li>
									<li id="curve6" value="secp160k1"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-160 Koblitz 1</a></li>
									<li id="curve7" value="secp192k1"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-192 Koblitz 1</a></li>
									<li role="separator" class="divider"></li>
									<li id="curve8" value="nistP384"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-384</a></li>
									<li id="curve9" value="nistP521"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">NIST P-521</a></li>
									<li role="separator" class="divider"></li>
									<li id="curve10" value="brainpool"><a href="#elliptic-curve-parameters" onclick="alert('Curve selection is not available at this time.')">Brainpool</a></li>

								</ul>
							</li>

							<li><a href="#elliptic-curve-parameters">Elliptic Curve Parameters</a></li>
							<li><a href="#senders-parameters">Sender</a></li>
							<li><a href="#receivers-parameters">Receiver</a></li>
							<li><a href="#message">Message</a></li>

						</ul>
					</div>
				</div>
			</nav>


		</footer>



	</body>

</html>