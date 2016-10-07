import { Component, OnInit } from '@angular/core';
import { DataService } from './data.service';


@Component ( {
    selector : 'my-app',
    templateUrl : '/app/angular_view/app_view/app.component.view.html',
    providers : [ DataService ]

} )


export class AppComponent implements OnInit {



    private phones : string[];
    private voditel_send : string[];
    private id_client : string = "";
    private name_client : string = "";
    private phone_client : string = "";
    private client_description : string = "";

    private client;
    private o_phones : string;
    private o_name : string;
    private o_adress : string;
    private o_voditel : string;
    private o_adress_from : string;


    constructor ( private data : DataService) { }


    // Функция отслеживающая изменения в селекте
    // public changed ( event : Object ) : void {
    //     this.selected = event.value;
    //     this.id_client = this.selected;
    //     this.getHeroes ( +this.id_client );
    //     this.sbros();
    // }


    // метод сброса полей в форме Заказа
    sbros(){
        this.o_phones = '';
        this.o_name = '';
        this.o_adress = '';
        // this.o_voditel = '';
        this.o_adress_from = '';
    }

    addAdress ( adress ) {
        this.o_adress = adress;
    }

    getHeroes ( id : number ) : void {
        this.data
            .getHer ( id )
            // .then(heroes => this.client = heroes);
            .then ( res => {
                this.client = JSON.parse ( res._body ).client;
            } );
    }

    addInfo () {
        var phones = '';
        this.client.phones.forEach ( function ( phone ) {
            phones += " " + phone;
        } );
        this.o_phones = phones;
        this.o_name = this.client.name;
    }

    addVoditel(name, id){
        this.o_voditel = name;
    }


    ngOnInit () {
        var phones = JSON.parse ( $ ( '.phones' ).val () );
        this.phones = phones;
        this.data.setComplexList ( phones );

        var voditel_send = JSON.parse ( $ ( '.voditel_send' ).val () );
        this.voditel_send = voditel_send;
    }
}
