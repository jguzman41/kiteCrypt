import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {SignUp} from "../classes/signup";
import {Status} from "../classes/status";

@Injectable()
export class SignUpService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private signUpUrl = "api/signup/";

	signUp(signUp: SignUp) : Observable<Status> {
		return(this.http.post(this.signUpUrl, signUp)
			.map(this.extractMessage)
			.catch(this.handleError));
	}
}
