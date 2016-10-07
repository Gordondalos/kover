import { Component, OnInit } from '@angular/core';
import { DataService } from './data.service';


@Component ( {
    selector : 'my-app',
    templateUrl : '/app/angular_view/app_view/app.component.view.html',
    providers : [ DataService ],


} )


export class AppComponent implements OnInit {

    private selected_phone : string = "";

    private phones : any;
    private voditel_send : any;
    private producer_send : any;
    private id_client : string = "";
    private name_client : string = "";
    private phone_client : string = "";
    private client_description : string = "";

    private add_new_adress_show: boolean = false;

    private new_adress : string;
    private new_adress_arr : string[] = [];

    private client;
    private o_phones : string;
    private o_name : string;
    private o_adress : string;
    private o_ovoditel_name : string;
    private o_ovoditel_id : string;
    private o_producer_send_id : string;
    private o_producer_send_title : string;
    private  o_adress_from: string = '';



    constructor ( private data : DataService ) { }



    add_new_adress_shows(){
        this.add_new_adress_show = true;
    }

    add_new_adress(){
        var new_adress = this.new_adress;
        if(new_adress.length > 0){
            this.new_adress_arr.push(new_adress);
            this.new_adress = '';
            this.add_new_adress_show = false;
            this.client.adreses.push((new_adress));

            // тут делае запись нвого адреса в базе;
        }
    }

    // метод сброса параметров заказа
    sbros(){
        this.o_phones = '';
        this.o_name = '';
        this.o_adress = '';
    }

    // метод установки адреса заказа
    addAdress ( adress ) {
        this.o_adress = adress;
    }

    // метод установки водителя в заказ
    addVoditel(name: string,id: string){
        this.o_ovoditel_name = name;
        this.o_ovoditel_id = id;
    }

    // Запрос аяксом нашего клиента из базы
    getHeroes ( id : number ) : void {
        this.data
            .getHer ( id )
            // .then(heroes => this.client = heroes);
            .then ( res => {
                this.client = JSON.parse ( res._body ).client;
            } );
    }

    // добавление и вывод телефонов в инфомацию о клиенте
    addInfo () {
        var phones = '';
        this.client.phones.forEach ( function ( phone ) {
            phones += " " + phone;
        } );

        this.o_phones = phones;
        this.o_name = this.client.name;

    }

    // инициализация данных, они парсятся из твига
    ngOnInit () {
        var phones = JSON.parse ( $ ( '.phones' ).val () );
        this.phones = phones;
        this.data.setComplexList_phone ( phones );

        var voditel_send = JSON.parse($('.voditel_send').val());
        this.voditel_send = voditel_send;
        this.data.setComplexList_voditel_send ( voditel_send );

        var producer_send = JSON.parse($('.producer_send').val());
        this.producer_send = producer_send;
        this.data.setComplexList_producer_send ( producer_send );
    }

    clear_info_client(){
        this.client = true;
        this.o_phones = "";
        this.o_name = "";
        this.o_adress = "";
        this.o_ovoditel_name = "";
        this.o_ovoditel_id = "";
    }



    onSelectOpened() {
        //console.log('Select dropdown opened.');
    }

    onSelectClosed() {
        //console.log('Select dropdown closed.');

    }

    // метод повешанный на изменения выбранного телефона
    onSelected_phone(item) {
        //console.log('Selected: ' + item.value + ', ' + item.label);
        var arr = item.value.split('.');
        var id_client = arr[1];
        this.getHeroes(id_client);
        this.selected_phone = arr[0];
    }

    onDeselected_phone(item) {

         console.log('Deselected: ' + item.value + ', ' + item.label);
        //this.clear_info_client();
    }

    //Установка производителя заказа
    onSelected_producer_send(item){
        this.producer_send_id = item.value;
        this.producer_send_title = item.label;

    }

}
