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
        // стартовые значения селекта
        this.startValue = "";
        this.selected = "";
        this.id_client = "";
        this.name_client = "";
        this.phone_client = "";
        this.client_description = "";
        // function for selection tempalte
        this.templateSelection = function (state) {
            if (!state.id) {
                return state.text;
            }
            return JQuery('<span><b>' + state.additional.winner + '.</b> ' + state.text + '</span>');
        };
    }
    // Функция отслеживающая изменения в селекте
    AppComponent.prototype.changed = function (e) {
        this.selected = e.value;
        this.id_client = this.selected;
        this.getHeroes(+this.id_client);
        this.sbros();
    };
    AppComponent.prototype.sbros = function () {
        this.o_phones = '';
        this.o_name = '';
        this.o_adress = '';
    };
    AppComponent.prototype.addAdress = function (adress) {
        this.o_adress = adress;
    };
    AppComponent.prototype.getHeroes = function (id) {
        var _this = this;
        this.data
            .getHer(id)
            .then(function (res) {
            _this.client = JSON.parse(res._body).client;
        });
    };
    AppComponent.prototype.addInfo = function () {
        var phones = '';
        this.client.phones.forEach(function (phone) {
            phones += " " + phone;
        });
        this.o_phones = phones;
        this.o_name = this.client.name;
    };
    AppComponent.prototype.ngOnInit = function () {
        var phones = JSON.parse($('.phones').val());
        this.phones = phones;
        this.data.setComplexList(phones);
    };
    AppComponent = __decorate([
        core_1.Component({
            selector: 'my-app',
            templateUrl: '/app/angular_view/app_view/app.component.view.html',
            providers: [data_service_1.DataService]
        }), 
        __metadata('design:paramtypes', [data_service_1.DataService])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map