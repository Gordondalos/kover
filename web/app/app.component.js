"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var data_service_1 = require('./data.service');
var AppComponent = (function () {
    function AppComponent(data) {
        this.data = data;
        this.selected_phone = "";
        this.id_client = "";
        this.name_client = "";
        this.phone_client = "";
        this.client_description = "";
        this.add_new_adress_show = false;
        this.new_adress_arr = [];
        this.o_adress_from = '';
    }
    AppComponent.prototype.add_new_client = function () {
        if (this.client == undefined) {
            this.client = [];
            this.client.name = this.new_client_name;
            this.client.phones = [this.new_client_phone];
            this.client.adreses = [this.new_client_adress];
            this.client.description = this.new_client_description;
        }
    };
    AppComponent.prototype.add_new_adress_shows = function () {
        this.add_new_adress_show = true;
    };
    AppComponent.prototype.add_new_adress = function () {
        var new_adress = this.new_adress;
        if (new_adress.length > 0) {
            this.new_adress_arr.push(new_adress);
            this.new_adress = '';
            this.add_new_adress_show = false;
            this.client.adreses.push((new_adress));
        }
    };
    // метод сброса параметров заказа
    AppComponent.prototype.sbros = function () {
        this.o_phones = '';
        this.o_name = '';
        this.o_adress = '';
    };
    // метод установки адреса заказа
    AppComponent.prototype.addAdress = function (adress) {
        this.o_adress = adress;
    };
    // метод установки водителя в заказ
    AppComponent.prototype.addVoditel = function (name, id) {
        this.o_ovoditel_name = name;
        this.o_ovoditel_id = id;
    };
    // Запрос аяксом нашего клиента из базы
    AppComponent.prototype.getHeroes = function (id) {
        var _this = this;
        this.data
            .getHer(id)
            .then(function (res) {
            _this.client = JSON.parse(res._body).client;
        });
    };
    // добавление и вывод телефонов в инфомацию о клиенте
    AppComponent.prototype.addInfo = function () {
        var phones = '';
        this.client.phones.forEach(function (phone) {
            phones += " " + phone;
        });
        this.o_phones = phones;
        this.o_name = this.client.name;
    };
    // инициализация данных, они парсятся из твига
    AppComponent.prototype.ngOnInit = function () {
        var phones = JSON.parse($('.phones').val());
        this.phones = phones;
        this.data.setComplexList_phone(phones);
        var voditel_send = JSON.parse($('.voditel_send').val());
        this.voditel_send = voditel_send;
        this.data.setComplexList_voditel_send(voditel_send);
        var producer_send = JSON.parse($('.producer_send').val());
        this.producer_send = producer_send;
        this.data.setComplexList_producer_send(producer_send);
    };
    AppComponent.prototype.clear_info_client = function () {
        this.client = true;
        this.o_phones = "";
        this.o_name = "";
        this.o_adress = "";
        this.o_ovoditel_name = "";
        this.o_ovoditel_id = "";
    };
    AppComponent.prototype.onSelectOpened = function () {
        //console.log('Select dropdown opened.');
    };
    AppComponent.prototype.onSelectClosed = function () {
        //console.log('Select dropdown closed.');
    };
    // метод повешанный на изменения выбранного телефона
    AppComponent.prototype.onSelected_phone = function (item) {
        //console.log('Selected: ' + item.value + ', ' + item.label);
        var arr = item.value.split('.');
        var id_client = arr[1];
        this.getHeroes(id_client);
        this.selected_phone = arr[0];
    };
    AppComponent.prototype.onDeselected_phone = function (item) {
        console.log('Deselected: ' + item.value + ', ' + item.label);
        //this.clear_info_client();
    };
    //Установка производителя заказа
    AppComponent.prototype.onSelected_producer_send = function (item) {
        this.o_producer_send_id = item.value;
        this.o_producer_send_title = item.label;
    };
    AppComponent = __decorate([
        core_1.Component({
            selector: 'my-app',
            templateUrl: '/app/angular_view/app_view/app.component.view.html',
            providers: [data_service_1.DataService],
        }), 
        __metadata('design:paramtypes', [data_service_1.DataService])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map