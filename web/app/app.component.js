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
        this.selected_phone = ""; // Тлефон с которого звонили
        this.add_new_adress_show = false;
        this.new_adress_arr = [];
        this.o_adress_from = '';
        this.o_adress_from_id = '';
        this.id_client = "";
        this.name_client = "";
        this.phone_client = "";
        this.client_description = "";
        this.order = "";
        this.summa_dostavki = 150;
        this.summa_vosnagrajdeniya = 50;
        this.summa_itog = this.summa_dostavki + this.summa_vosnagrajdeniya;
    }
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
    //Метод добавления нового заказа
    AppComponent.prototype.addNewOrder = function () {
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
        var myPromis = this.data.setNewOrder(JSON.stringify(send_order_arr))
            .then(function (res) {
            var data = JSON.parse(res._body).res;
            console.log(data);
            if (data === '200') {
                window.location = "/order/";
            }
            else {
                alert('Ошибка при добавлении заказа');
            }
        });
    };
    AppComponent.prototype.getBoder = function (properties, val) {
        if (properties && properties.length > val) {
            return false;
        }
        else {
            return true;
        }
    };
    //Включаем кнопку если заполнены все атрибуты
    AppComponent.prototype.getAllDataforOrder = function () {
        if ((this.o_phones && this.o_phones.length > 6)
            && (this.o_name && this.o_name.length != 0)
            && (this.o_adress && this.o_adress.length > 2)
            && (this.o_ovoditel_name && this.o_ovoditel_name.length > 2)
            && (this.o_adress_from && this.o_adress_from.length > 2)
            && (this.order && this.order.length > 2)
            && (this.selected_phone && this.selected_phone.length > 6)) {
            return true;
        }
        else {
            return false;
        }
    };
    //Метод добавления нового клиента
    AppComponent.prototype.add_new_client = function () {
        var _this = this;
        if (this.new_client_name == undefined
            || this.new_client_phone == undefined
            || this.new_client_adress == undefined
            || this.new_client_name.length < 2
            || this.new_client_phone.length < 6
            || this.new_client_adress.length < 3) {
            alert('Заполните поля: Имя(от 2-x символов), Телефон(от 6), Адрес(от 3-х)');
            return;
        }
        this.client = [];
        this.client.name = this.new_client_name;
        this.client.phones = [this.new_client_phone];
        this.client.adreses = [this.new_client_adress];
        this.client.description = this.new_client_description;
        var res = this.data.setNewClient(this.client)
            .then(function (res) {
            var regKlient = JSON.parse(res._body).client;
            // Получим всю информацию о данном клиенте и установим ее
            _this.getHeroes(regKlient.id);
        });
    };
    // метод сброса заполненного клиента
    AppComponent.prototype.reset_new_client = function () {
        this.new_client_name = '';
        this.new_client_phone = '';
        this.new_client_adress = '';
        this.new_client_description = '';
    };
    //метод отображающий форму добавления нового адреса
    AppComponent.prototype.add_new_adress_shows = function () {
        this.add_new_adress_show = true;
    };
    //метод добавляющий новый адресс в базе
    AppComponent.prototype.add_new_adress = function () {
        var that = this;
        var new_adress = this.new_adress; // Поулчил новый адрес
        if (new_adress.length > 0) {
            this.new_adress_arr.push(new_adress); // Запушили его в новый массив
            this.add_new_adress_show = false; // Скрываем форму для записи абреса
            var result = that.data.setNewAdress(new_adress, that.client.id); // Запишем в базу инфо о адресе и адресс клиентам
            result.then(function (res) {
                var resp = res.json().resp;
                if (resp === '200') {
                    // alert('Успешно');
                    that.client.adreses.push((new_adress));
                    that.new_adress = ''; // Обнулили новый адрес чтобы его два раза не добавить
                }
                else {
                    alert('Неудача');
                    that.new_adress = ''; // Обнулили новый адрес чтобы его два раза не добавить
                }
            }, function (err) {
                console.log(err);
            });
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
    // метод очистки информации о клиенте
    AppComponent.prototype.clear_info_client = function () {
        this.client = true;
        this.o_phones = "";
        this.o_name = "";
        this.o_adress = "";
        this.o_ovoditel_name = "";
        this.o_ovoditel_id = "";
    };
    // метод на открытие селекта
    AppComponent.prototype.onSelectOpened = function () {
        //console.log('Select dropdown opened.');
    };
    //метод на закрытие селекта
    AppComponent.prototype.onSelectClosed = function () {
        //console.log('Select dropdown closed.');
    };
    // метод  на изменения выбранного телефона
    AppComponent.prototype.onSelected_phone = function (item) {
        //console.log('Selected: ' + item.value + ', ' + item.label);
        var arr = item.value.split('.');
        var id_client = arr[1];
        this.getHeroes(id_client);
        this.selected_phone = arr[0];
    };
    //метод потери нажимающий на крестик селекта
    AppComponent.prototype.onDeselected_phone = function (item) {
        console.log('Deselected: ' + item.value + ', ' + item.label);
        //this.clear_info_client();
    };
    //Установка производителя заказа
    AppComponent.prototype.onSelected_producer_send = function (item) {
        this.o_adress_from = item.label;
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