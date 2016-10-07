import { Injectable } from '@angular/core';
import { Select2OptionData } from 'ng2-select2/ng2-select2';

import 'rxjs/add/operator/toPromise';
import { Http } from '@angular/http';

@Injectable ()
export class DataService {

    phon : any = [];
    heroesUrl : string = '';

    constructor ( private http : Http ) { }

    setComplexList ( phones : any ) {
        this.phon = phones;
    }


    getComplexList () : Select2OptionData[] {
        return this.phon;
    }

    // getUserInfo = (id: number): any => {
    //     return fetch(`/qweqwe/${id}`)
    //         .then((response) => response.json())
    // };

    getHer ( id : number ) : Promise<any> {
        this.heroesUrl = "/client/client/" + id + "/get";
        console.log ( this.heroesUrl );
        return this.http.get ( this.heroesUrl )
            .toPromise ();

    }



    private handleError ( error : any ) : Promise<any> {
        console.error ( 'Произошла ошибка', error ); // for demo purposes only
        return Promise.reject ( error.message || error );
    }


}
