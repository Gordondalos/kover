import { Component, OnInit } from '@angular/core';
import { DataService } from './data.service';


@Component ( {
    selector : 'my-app',
    templateUrl : '/app/angular_view/app_view/app.component.view.html',
    providers : [ DataService ],
} )


export class AppComponent implements OnInit {


    private new_client_name : string;
    private new_client_phone : string;
    private new_client_adress : string;
    private new_client_description : string;
    private selected_phone : string = ""; // Тлефон с которого звонили
    private phones : any;
    private voditel_send : any;
    private producer_send : any;
    private add_new_adress_show : boolean = false;
    private new_adress : string;
    private new_adress_arr : string[] = [];
    private client;
    private o_phones : string; //Телефоны клиента
    private o_name : string; // Имя клиента
    private o_adress : string; // Адрес доставки
    private o_ovoditel_name : string;
    private o_ovoditel_id : string;
    private o_producer_send_id : string;
    private o_producer_send_title : string;
    private o_adress_from : string = '';
    private o_adress_from_id : string = '';
    private id_client : string = "";
    private name_client : string = "";
    private phone_client : string = "";
    private client_description : string = "";
    private order : string = "";
    private summa_dostavki : number = 150;
    private summa_vosnagrajdeniya : number = 50;
    private send_array;

    private summa_itog = this.summa_dostavki + this.summa_vosnagrajdeniya;

    constructor ( private data : DataService ) { }


    // инициализация данных, они парсятся из твига
    ngOnInit () {
        var phones = JSON.parse ( $ ( '.phones' ).val () );
        this.phones = phones;
        this.data.setComplexList_phone ( phones );

        var voditel_send = JSON.parse ( $ ( '.voditel_send' ).val () );
        this.voditel_send = voditel_send;
        this.data.setComplexList_voditel_send ( voditel_send );

        var producer_send = JSON.parse ( $ ( '.producer_send' ).val () );
        this.producer_send = producer_send;
        this.data.setComplexList_producer_send ( producer_send );
    }

    //Метод добавления нового заказа
    addNewOrder () {
        var send_order_arr = {};
        send_order_arr['o_phones'] = this.o_phones;
        send_order_arr['o_name'] = this.o_name;
        send_order_arr['o_adress'] = this.o_adress;
        send_order_arr['o_ovoditel_name'] = this.o_ovoditel_name;
        send_order_arr['o_ovoditel_id'] = this.o_ovoditel_id;
        send_order_arr['o_adress_from'] = this.o_adress_from;
        send_order_arr['client'] = this.client;
        send_order_arr['order'] = this.order;
        send_order_arr['selected_phone'] = this.selected_phone;
        send_order_arr['summa_dostavki'] = this.summa_dostavki;
        send_order_arr['summa_vosnagrajdeniya'] = this.summa_vosnagrajdeniya;
        send_order_arr['summa_itog'] = this.summa_itog;

        let myPromis = this.data.setNewOrder(JSON.stringify(send_order_arr))
        .then ( res => {
            var data = JSON.parse ( res._body ).res;
            console.log( data);
            if(data === '200'){
                window.location = "/order/";
            }else{
                alert('Ошибка при добавлении заказа');
            }

        } );

    }

    getBoder ( properties, val ) {
        if ( properties && properties.length > val ) {
            return false;
        } else {
            return true;
        }
    }

    //Включаем кнопку если заполнены все атрибуты
    getAllDataforOrder () {
        if ( (this.o_phones && this.o_phones.length > 6)
            && (this.o_name && this.o_name.length != 0)
            && (this.o_adress && this.o_adress.length > 2)
            && (this.o_ovoditel_name && this.o_ovoditel_name.length > 2)
            && (this.o_adress_from && this.o_adress_from.length > 2)
            && (this.order && this.order.length > 2)
            && (this.selected_phone && this.selected_phone.length > 6)
        ) {
            return true;
        } else {
            return false;
        }
    }

    //Метод добавления нового клиента
    add_new_client () {
        if (
            this.new_client_name == undefined
            || this.new_client_phone == undefined
            || this.new_client_adress == undefined
            || this.new_client_name.length < 2
            || this.new_client_phone.length < 6
            || this.new_client_adress.length < 3
        ) {
            alert ( 'Заполните поля: Имя(от 2-x символов), Телефон(от 6), Адрес(от 3-х)' );
            return;
        }

        this.client = [];
        this.client.name = this.new_client_name;
        this.client.phones = [ this.new_client_phone ];
        this.client.adreses = [ this.new_client_adress ];
        this.client.description = this.new_client_description;

        let res = this.data.setNewClient ( this.client )
            .then ( res => {
                var regKlient = JSON.parse ( res._body ).client;
                // Получим всю информацию о данном клиенте и установим ее
                this.getHeroes ( regKlient.id );
            } );
    }

    // метод сброса заполненного клиента
    reset_new_client () {
        this.new_client_name = '';
        this.new_client_phone = '';
        this.new_client_adress = '';
        this.new_client_description = '';
    }

    //метод отображающий форму добавления нового адреса
    add_new_adress_shows () {
        this.add_new_adress_show = true;
    }

    //метод добавляющий новый адресс в базе
    add_new_adress () {
        let that = this;
        var new_adress = this.new_adress; // Поулчил новый адрес
        if ( new_adress.length > 0 ) { // Если он не пустой
            this.new_adress_arr.push ( new_adress ); // Запушили его в новый массив
            this.add_new_adress_show = false; // Скрываем форму для записи абреса
            var result = that.data.setNewAdress ( new_adress, that.client.id ); // Запишем в базу инфо о адресе и адресс клиентам
            result.then (
                function ( res ) {
                    let resp = res.json ().resp;
                    if ( resp === '200' ) {
                        // alert('Успешно');
                        that.client.adreses.push ( (new_adress) );
                        that.new_adress = ''; // Обнулили новый адрес чтобы его два раза не добавить
                    } else {
                        alert ( 'Неудача' );
                        that.new_adress = ''; // Обнулили новый адрес чтобы его два раза не добавить
                    }
                },
                function ( err ) {
                    console.log ( err );
                }
            );
        }
    }

    // метод сброса параметров заказа
    sbros () {
        this.o_phones = '';
        this.o_name = '';
        this.o_adress = '';
    }

    // метод установки адреса заказа
    addAdress ( adress ) {
        this.o_adress = adress;
    }

    // метод установки водителя в заказ
    addVoditel ( name : string, id : string ) {
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

    // метод очистки информации о клиенте
    clear_info_client () {
        this.client = true;
        this.o_phones = "";
        this.o_name = "";
        this.o_adress = "";
        this.o_ovoditel_name = "";
        this.o_ovoditel_id = "";
    }

    // метод на открытие селекта
    onSelectOpened () {
        //console.log('Select dropdown opened.');
    }

    //метод на закрытие селекта
    onSelectClosed () {
        //console.log('Select dropdown closed.');
    }

    // метод  на изменения выбранного телефона
    onSelected_phone ( item ) {
        //console.log('Selected: ' + item.value + ', ' + item.label);
        var arr = item.value.split ( '.' );
        var id_client = arr[ 1 ];
        this.getHeroes ( id_client );
        this.selected_phone = arr[ 0 ];
    }

    //метод потери нажимающий на крестик селекта
    onDeselected_phone ( item ) {
        console.log ( 'Deselected: ' + item.value + ', ' + item.label );
        //this.clear_info_client();
    }

    //Установка производителя заказа
    onSelected_producer_send ( item ) {
        this.o_adress_from = item.label;
    }
}
