import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/toPromise';


@Injectable ()
export class DataService {

    phon : any = [];
    voditel_send : any = [];
    producer_send : any = [];
    heroesUrl : string = '';

    constructor ( private http : Http ) { }

    setComplexList_phone ( data : any ) {
        this.phon = data;
    }

    setComplexList_voditel_send( data : any ) {
        this.voditel_send = data;
    }

    setComplexList_producer_send( data : any ) {
        this.producer_send = data;
    }


    getComplexList_phone () : any {
        return this.phon;
    }

    getComplexList_producer_send () : any {
        return this.producer_send;
    }

    getComplexList_voditel_send () : any {
        return this.voditel_send;
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
