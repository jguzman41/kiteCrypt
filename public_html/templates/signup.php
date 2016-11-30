<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<div class="container">
	<div class="bg-image">
		<div class="container-fluid">
			<div id="title-row" class="row">
				<div class="col-xs-12">
					<div class="pad-down text-center">
						<div id="pulse" class="pulse">
							<h1 id="kiteCrypt-title" class="fade-in">KiteCrypt</h1>
						</div>
						<p id="slogan" class="fade-in-out">A secure chat site for our insecure world</p>
					</div>
				</div>
			</div>
			<div id="login-row" class="row">
				<div class="text-center">
					<form #loginForm="ngForm" name="signUpForm" id="signUpForm" class="form-horizontal" (ngSubmit)="signUp();"
							novalidate>
						<div class="form-group">
							<label for="user-name">Username</label>
							<div class="input-group col-xs-4 col-xs-offset-4">
								<input type="text" id="user-name" name="user-name" class="form-control input-sm chat-input"
										 placeholder="username" maxlength="20" required [(ngModel)]="signUp.username"
										 #username="ngModel"/>
							</div>
							<div [hidden]="username.valid || username.pristine" class="alert alert-danger col-xs-4 col-xs-offset-4" role="alert">
								<p *ngIf="username.errors?.required">Username required.</p>
								<p *ngIf="username.errors?.maxlength">Username is too long.</p>
							</div>

						</div>
						<div class="form-group">
							<label for="user-password">Password</label>
							<div class="input-group col-xs-4 col-xs-offset-4">
								<input type="password" id="user-password" name="user-password"
										 class="form-control input-sm chat-input"
										 placeholder="password" required [(ngModel)]="signUp.password" #password="ngModel"/>
							</div>
							<div [hidden]="password.valid || password.pristine" class="alert alert-danger col-xs-4 col-xs-offset-4" role="alert">
								<p *ngIf="password.errors?.required">Password required.</p>
							</div>

						</div>
						<div class="form-group">
							<label for="passwordConfirm">Password Confirmation</label>
							<input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control input-sm chat-input" [ngModel]="signUp.passwordConfirm"
									 required validateEqual="password" #passwordConfirm="ngModel"/>
							<div [hidden]="passwordConfirm.valid || (passwordConfirm.pristine && !f.submitted)">
								Password mismatch
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-lg btn-login" [disabled]="signUpForm.invalid"><i
								class="fa fa-user"></i> Login
						</button>
					</form>
				</div>
			</div>
			<main>

			</main>
			<footer>
			</footer>
		</div>
	</div>