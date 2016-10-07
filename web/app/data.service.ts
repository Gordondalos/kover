import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/toPromise';


@Injectable ()
export class DataService {

    phon : any = [];
    heroesUrl : string = '';

    constructor ( private http : Http ) { }

    setComplexList ( phones : any ) {
        this.phon = phones;
    }


    getComplexList () : any {
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
